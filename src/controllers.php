<?php

require_once 'business.php';

class Gallery_manager
{
    private $file;

    private $mime_type;
    private $finfo;

    private $file_name;
    private $file_size;

    private $upload_dir;
    private $tmp_path;
    private $target_path;

    private $photo_title;
    private $photo_author;
    private $photo_option;
    private $water_mark;


    private function redirect()
    {
        return 'redirect:formularz';
    }

    private function correct_file()
    {
        $this->file = $_FILES['photo'];
        if (empty($this->file['name']))
        {
            $_SESSION['err_image'] = true;
            return 'not_correct';
        }
        return 'correct';
    }
    private function correct_title()
    {
        if(empty($_POST['title']))
        {
            $_SESSION['err_image_title'] = true;
            return 'not_correct';
        }
        $this->photo_title = $_POST['title'];
        return 'correct';
    }
    private function correct_author()
    {
        if(empty($_POST['author']))
        {
            $_SESSION['err_image_author'] = true;
            return 'not_correct';
        }
        $this->photo_author = $_POST['author'];
        return 'correct';
    }
    private function correct_photo_option()
    {
        if(!isset($_SESSION['user_id']))
        {
            $this->photo_option = "publiczne";
            return 'correct';
        }
        else if(empty($_POST['photo_option']))
        {
            $_SESSION['err_photo_option'] = true;
            return 'not_correct';
        }

        $this->photo_option = $_POST['photo_option'];
        return 'correct';
    }
    private function correct_water_mark()
    {
        if(empty($_POST['water_mark']))
        {
            $_SESSION['err_water_mark'] = true;
            return 'not_correct';
        }
        $this->water_mark = $_POST['water_mark'];
        return 'correct';
    }
    private function correct_extension()
    {
        $this->file_size = $this->file['size'];
        $this->finfo = finfo_open(FILEINFO_MIME_TYPE);
        $this->tmp_path = $this->file['tmp_name'];
        $this->mime_type = finfo_file($this->finfo, $this->tmp_path);

        if (!($this->mime_type === 'image/jpeg' || $this->mime_type === 'image/png'))
        {
            if(!($this->file_size < 1048576))
                $_SESSION['err_image_size'] = true;

            $_SESSION['err_image_extension'] = true;
            return 'not_correct';
        }
        return 'correct';
    }
    private function correct_size()
    {
        $this->file_size = $this->file['size'];
        if(!($this->file_size < 1048576))
        {
            $_SESSION['err_image_size'] = true;
            return 'not_correct';
        }
        return 'correct';
    }


    private function update_photo_name()
    {
        $business = new Gallery_manager_business();

        $this->file_name = basename($this->file['name']);
        $_SESSION['photos_number'] = $business->count_photos();
        $business->change_photo_name($this->file_name,  $_SESSION['photos_number']);
    }
    private function update_path()
    {
        $this->upload_dir = 'images_server/';
        $this->target_path = $this->upload_dir . $this->file_name;
    }

    private function add_photo()
    {
        $business = new Gallery_manager_business();

        if(!($business->save_photo($this->tmp_path, $this->target_path)))
        {
            $_SESSION['sending_not_succeeded'] = true;
            return 'not_correct';
        }
        return 'correct';
    }
    private function add_water_mark()
    {
        $business = new Gallery_manager_business();

        if(!($business->save_water_mark($this->upload_dir, $this->file_name, $this->mime_type, $_POST['water_mark'])))
        {
            $_SESSION['sending_not_succeeded'] = true;
            return 'not_correct';
        }
        return 'correct';
    }
    private function add_thumbnail()
    {
        $business = new Gallery_manager_business();

        if(!($business->save_thumbnail($this->upload_dir, $this->file_name, $this->mime_type)))
        {
            $_SESSION['sending_not_succeeded'] = true;
            return 'not_correct';
        }
        return 'correct';
    }
    private function add_to_data_base()
    {
        $id = $_SESSION['photos_number'];
        $user_id = -1; // It means this photo belongs to user without an account
        if(isset($_SESSION['user_id']))
            $user_id = $_SESSION['user_id'];

        $photo = [
            '_id' => $id,
            'title' => $this->photo_title,
            'author' => $this->photo_author,
            'size' => $this->file_size,
            'extension' => $this->mime_type,
            'water_mark' => $this->water_mark,
            'photo_option' => $this->photo_option,
            'user_id' => $user_id
        ];

        $business = new Data_base();
        $business->save_photo(NULL, $photo);

        return 'correct';
    }

    private function get_login(&$model)
    {
        if(isset($_SESSION['user_id']))
        {
            $db = new Data_base();
            $login = $db->get_account_by_id($_SESSION['user_id'])['login'];
            $model['login'] = $login;
        }
    }

    private function results()
    {
        $_SESSION['sending_succeeded'] = true;
        return $this->redirect();
    }

    public function intercept_photo(&$model)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if($this->correct_file() === 'not_correct')
                return $this->redirect();
            if($this->correct_title() === 'not_correct')
                return $this->redirect();
            if($this->correct_author() === 'not_correct')
                return $this->redirect();
            if($this->correct_photo_option() === 'not_correct')
                return $this->redirect();
            if($this->correct_water_mark() === 'not_correct')
                return $this->redirect();
            if($this->correct_extension() === 'not_correct')
                return $this->redirect();
            if($this->correct_size() === 'not_correct')
                return $this->redirect();

            $this->update_photo_name();
            $this->update_path();

            if($this->add_photo() === 'not_correct')
                return $this->redirect();
            if($this->add_water_mark() === 'not_correct')
                return $this->redirect();
            if($this->add_thumbnail() === 'not_correct')
                return $this->redirect();
            if($this->add_to_data_base() === 'not_correct')
                return $this->redirect();

            return $this->results();
        }
        else
        {
            $this->get_login($model);
            return 'formularz_view';
        }

    }
}
class Gallery_loader
{
    function __construct()
    {
        if(!isset($_SESSION['gallery_page']))
            $_SESSION['gallery_page'] = 0;

        if(!isset($_SESSION['gallery_remembered_page']))
            $_SESSION['gallery_remembered_page'] = 0;
    }

    public function load_gallery()
    {
        if(!isset($_SESSION['photos_number']))
            $_SESSION['photos_number'] = 0;

        if($_SESSION['photos_number'] === 0)
        {
            $empty_array = [];
            return $empty_array;
        }

        $business = new Gallery_loader_business();
        return $business->load_photos();;
    }

    public function load_gallery_remembered()
    {
        if(!isset($_SESSION['photos_remembered_number']))
            $_SESSION['photos_remembered_number'] = 0;

        if($_SESSION['photos_remembered_number'] === 0)
        {
            $empty_array = [];
            return $empty_array;
        }

        $business = new Gallery_loader_business();
        return $business->load_photos_remembered();;
    }

    public function intercept_demand(&$model)
    {
        $business = new Gallery_manager_business();
        $_SESSION['photos_number'] = $business->count_photos();

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $business = new Gallery_loader_business();
            if(isset($_POST['next_page']))
            {
                $business->page_up();
                return 'redirect:/';
            }
            else if(isset($_POST['previous_page']))
            {
                $business->page_down();
                return 'redirect:/';
            }
            else if(isset($_POST['next_page_remembered']))
            {
                $business->page_up_remembered();
                return 'redirect:twoja_galeria';
            }
            else if(isset($_POST['previous_page_remembered']))
            {
                $business->page_down_remembered();
                return 'redirect:twoja_galeria';
            }
        }
        else
        {
            $model['photos'] = $this->load_gallery();

            //If there is not photos in the model['photos'] then we change gallery page
            // We do it because there was a bug that it shown 'Brak Zdjęć' even it there were private photos of some other users
            // So it shouldn't let user to change the page
            if(count($model['photos']) === 0 && $_SESSION['gallery_page'] > 0)
            {
                $_SESSION['gallery_page']--;
                return 'redirect:/';
            }

            return 'index_view';
        }
    }
}
class Registration
{
    private $email;
    private $login;
    private $password;
    private $repeated_password;
    private $hashed_password;

    private function correct_input()
    {
        if(empty($_POST['email']) || empty($_POST['login']) || empty($_POST['password']) || empty($_POST['password_repeat']))
        {
            $_SESSION['bad_input'] = true;
            return 'not_correct';
        }
        $this->email = $_POST['email'];
        $this->login = $_POST['login'];
        $this->password = $_POST['password'];
        $this->repeated_password = $_POST['password_repeat'];

        return 'correct';
    }
    private function correct_password()
    {
        $business = new Registration_business();
        if($business->compare_passwords($this->password, $this->repeated_password) === 'not_correct')
        {
            $_SESSION['bad_repeated_password'] = true;
            return 'not_correct';
        }
        return 'correct';
    }
    private function check_login()
    {
        $business = new Registration_business();
        if($business->correct_login($this->login) === 'not_correct')
        {
            $_SESSION['repeated_login'] = true;
            return 'not_correct';
        }

        return 'correct';
    }
    private function password_hash()
    {
        $business = new Registration_business();
        $this->hashed_password = $business->hashing($this->password);
    }
    private function add_to_data_base()
    {
        $business = new Accounts_manager_business();
        // Plus one because it is: number of accounts + this new account
        $id = $business->count_accounts() + 1;
        $account = [
            '_id' => $id,
            'email' => $this->email,
            'login' => $this->login,
            'hashed_password' => $this->hashed_password
        ];

        $business = new Data_base();
        $business->save_account(NULL, $account);

        return 'correct';
    }

    private function results()
    {
        $_SESSION['correct_registration'] = true;
        return 'redirect:rejestracja';
    }

    function intercept_demand()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if($this->correct_input() === "not_correct")
                return 'redirect:rejestracja';
            if($this->correct_password() === "not_correct")
                return 'redirect:rejestracja';
            if($this->check_login() === "not_correct")
                return 'redirect:rejestracja';

            $this->password_hash();

            if($this->add_to_data_base() === 'not_correct')
                return $this->redirect();

            return $this->results();
        }
        else
        {
            return 'rejestracja_view';
        }
    }
}
class Login
{
    private $login;
    private $password;

    private function correct_input()
    {
        if(empty($_POST['login']) || empty($_POST['password']))
        {
            $_SESSION['bad_input'] = true;
            return 'not_correct';
        }
        $this->login = $_POST['login'];
        $this->password = $_POST['password'];

        return 'correct';
    }

    private function results()
    {
        $_SESSION['successful_login'] = true;
        return 'redirect:/';
    }
    private function find_account()
    {
        $business = new Login_business();
        if($business->try_to_login($this->login, $this->password) === 'not_correct')
        {
            $_SESSION['not_found'] = true;
            return 'not_correct';
        }
        return 'correct';
    }

    function intercept_demand()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if($this->correct_input() === "not_correct")
                return 'redirect:logowanie';
            if($this->find_account() === "not_correct")
                return 'redirect:logowanie';

            return $this->results();
        }
        else
        {
            return 'logowanie_view';
        }
    }
}
class Logout
{
    function intercept_demand()
    {
        if(isset($_SESSION['user_id']))
            session_destroy();

        return 'redirect:/';
    }
}
class Yours_gallery
{
    private $checked_photos = [];

    private function check_input()
    {
        if(empty($_POST['checked']))
            return 'empty';

        $this->checked_photos = $_POST['checked'];
        return 'not_empty';
    }

    private function save_photos_to_session()
    {
        $business = new Yours_gallery_business();
        $business->save_photos($this->checked_photos);
    }

    private function delete_photos_from_session()
    {
        $business = new Yours_gallery_business();
        $business->delete_photos($this->checked_photos);
    }

    function intercept_demand(&$model)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if(isset($_POST['remember']))
            {
                if($this->check_input() === 'empty')
                    return 'redirect:/';
                $this->save_photos_to_session();
                return 'redirect:/';
            }
            else if(isset($_POST['delete']))
            {
                if($this->check_input() === 'empty')
                    return 'redirect:twoja_galeria';
                $this->delete_photos_from_session();
                return 'redirect:twoja_galeria';
            }

            return 'redirect:/';
        }
        else
        {
            $business = new Gallery_loader();
            $model['photos'] = $business->load_gallery_remembered();
            if(count($model['photos']) === 0 && $_SESSION['gallery_remembered_page'] > 0)
            {
                $_SESSION['gallery_remembered_page']--;
                return 'redirect:twoja_galeria';
            }
            return 'twoja_galeria_view';
        }

    }
}
class Photo_search
{
    function show_photos()
    {
        $business = new Gallery_loader_business();
        $model['results'] = $business->load_photos_search();

        foreach($model['results'] as $element)
        {
            $path_thumbnail = $element['path_thumbnail'];
            $path_water_mark = $element['path_water_mark'];
            $title = $element['title'];
            $author = $element['author'];
            $photo_option = $element['photo_option'];
            $id = $element['_id'];

            echo <<< END
                        <span class='galeria'>
                            <a href = $path_water_mark>
                                <img src = $path_thumbnail>
                            </a>
                            <p class="galeria_text"> $author </p>
                            <p class="galeria_text"> $title </p>
                            
END;
            if($photo_option === 'prywatne')
                echo '<p class="galeria_text_private">' . $photo_option . '</p>';

            if(isset($_SESSION['id' . $id]))
                echo '<input type="checkbox" checked="true" name="checked[]" value=' . $id . '>';
            else
                echo '<input type="checkbox" name="checked[]" value=' . $id . '>';

            echo '</span>';
        }
    }

    function intercept_demand()
    {
        if(!isset($_GET['title_to_search']))
            return 'szukaj_zdjecie_view';

        $this->show_photos();

        return 'dont_render';
    }
}

class Main_controll
{
    function photo_form(&$model)
    {
        $photo = new Gallery_manager();
        return $photo->intercept_photo($model);
    }
    function index(&$model)
    {
        $gallery_loader = new Gallery_loader();
        return $gallery_loader->intercept_demand($model);
    }
    function registration(&$model)
    {
        $register = new Registration();
        return $register->intercept_demand();
    }
    function login(&$model)
    {
        $login = new Login();
        return $login->intercept_demand($model);
    }
    function logout(&$model)
    {
        $logout = new Logout();
        return $logout->intercept_demand();
    }
    function yours_gallery(&$model)
    {
        $remember = new Yours_gallery();
        return $remember->intercept_demand($model);
    }
    function photo_search(&$model)
    {
        $search = new Photo_search();
        return $search->intercept_demand();
    }
    function categories(&$model)
    {
        return 'kategorie_view';
    }
    function rap(&$model)
    {
        return 'rap_view';
    }
    function rock(&$model)
    {
        return 'rock_view';
    }
    function metal(&$model)
    {
        return 'metal_view';
    }
    function lottery(&$model)
    {
        return 'los_view';
    }
    function collection(&$model)
    {
        return 'kolekcja_view';
    }
    function about_music(&$model)
    {
        return 'o_muzyce_view';
    }
}

