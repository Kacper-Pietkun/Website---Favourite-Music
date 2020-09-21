<?php

require '../../vendor/autoload.php';
use MongoDB\BSON\ObjectID;

class Data_base
{
    private function get_db()
    {
        $mongo = new MongoDB\Client(
            "mongodb://localhost:27017/wai",
            [
                'username' => 'wai_web',
                'password' => 'w@i_w3b',
            ]);

        $db = $mongo->wai;
        return $db;
    }

    function save_photo($id, $photo)
    {
        $db = $this->get_db();

        if ($id == NULL)
        {
            $db->photos->insertOne($photo);
        }
        else
        {
            $db->photos->replaceOne(['_id' => new ObjectID($id)], $photo);
        }

        return true;
    }
    function save_account($id, $account)
    {
        $db = $this->get_db();

        if ($id == NULL)
        {
            $db->accounts->insertOne($account);
        }
        else
        {
            $db->accounts->replaceOne(['_id' => new ObjectID($id)], $account);
        }

        return true;
    }

    function get_photo_by_id($id)
    {
        $db = $this->get_db();

        $query = ['_id' => $id];
        return $db->photos->findOne($query);
    }


    function get_account_by_login($login)
    {
        $db = $this->get_db();

        $query = ['login' => $login];
        return $db->accounts->findOne($query);
    }
    function get_account_by_id($id)
    {
        $db = $this->get_db();

        $query = ['_id' => $id];
        return $db->accounts->findOne($query);
    }
    function get_accounts()
    {
        $db = $this->get_db();
        return $db->accounts->find();
    }

    /*function delete_all()
    {
        $db = $this->get_db();

        for($i = 0; $i < 50; $i++)
        {
            $query = ['_id' => $i];
            $db->photos->deleteOne($query);
            $db->accounts->deleteOne($query);
        }
    }*/
}

class Gallery_manager_business
{
    function count_photos()
    {
        $path = "images_server/";
        $number = 0;
        $files = glob($path . "*");
        if ($files){
            $number = count($files);
        }
        return $number/3;
    }
    function change_photo_name(&$file_name, $photo_number)
    {
        $pieces = explode(".", $file_name);
        $file_name = "photo_" . $photo_number . '.' . $pieces[1];
    }

    function save_photo($tmp_path, $target_path)
    {
        if(move_uploaded_file($tmp_path, $target_path))
        {
            return true;
        }
        return false;
    }
    function save_water_mark($path, $org_img_name, $extension, $water_mark_text)
    {
        $org_img_path = $path . $org_img_name;
        $pieces = explode(".", $org_img_path);
        $new_img_path = $pieces[0] . "_water_mark." . $pieces[1];

        $new_image = NULL;
        if($extension === "image/jpeg")
            $new_image = imagecreatefromjpeg($org_img_path);
        else if($extension === "image/png")
            $new_image = imagecreatefrompng($org_img_path);

        $text_color = imagecolorallocate($new_image, 153,204,255);
        imagettftext($new_image, imagesx($new_image)/40, 0, imagesx($new_image)-imagesx($new_image),
            imagesy($new_image), $text_color,
            "static/fonts/LibreBaskerville-Regular.ttf" , $water_mark_text);

        if($extension === "image/jpeg")
            return imagejpeg($new_image, $new_img_path);
        else if($extension === "image/png")
            return imagepng($new_image, $new_img_path);

        return false;
    }
    function save_thumbnail($path, $org_img_name, $extension)
    {
        $org_img_path = $path . $org_img_name;
        $pieces = explode(".", $org_img_path);
        $new_img_path = $pieces[0] . "_thumbnail." . $pieces[1];

        $old_img = NULL;
        $new_image = imagecreatetruecolor(200, 125);

        if($extension === "image/jpeg")
            $old_img = imagecreatefromjpeg($org_img_path);
        else if($extension === "image/png")
            $old_img = imagecreatefrompng($org_img_path);

        imagecopyresized($new_image, $old_img, 0, 0, 0, 0, 200, 125, imagesx($old_img), imagesy($old_img));

        if($extension === "image/jpeg")
            return imagejpeg($new_image, $new_img_path);
        else if($extension === "image/png")
            return   imagepng($new_image, $new_img_path);

        return false;
    }
}

class Gallery_loader_business
{
    // ***************************************
    // Normal gallery
    function load_photos()
    {
        $loaded_array = [];
        $db = new Data_base();

        $skip_photos = $_SESSION['gallery_page'] * 6;
        $already_skipped = 0;
        $id=0;
        for($i = 0; $i < $_SESSION['photos_number']; $i++)
        {
            $photo = $db->get_photo_by_id($i);

            // If this is private then check if author is logged in
            // If not don't show this photo
            // We skip all of this photos, we don't cout them anywhere (it is like they didn't exist)
            if($photo['photo_option'] === "prywatne" && !isset($_SESSION['user_id']))
                continue;
            else if($photo['photo_option'] === "prywatne" && isset($_SESSION['user_id']) && $photo['user_id'] !== $_SESSION['user_id'])
                continue;

            if($id >= 6)
                break;

            if($already_skipped >= $skip_photos)
            {
                $loaded_array[$id]['title'] = $photo['title'];
                $loaded_array[$id]['author'] = $photo['author'];
                $loaded_array[$id]['_id'] = $photo['_id'];
                $loaded_array[$id]['photo_option'] = $photo['photo_option'];
                $loaded_array[$id]['user_id'] = $photo['user_id'];

                $path_thumbnail = "images_server/photo_" . $i . "_thumbnail.jpg";
                $path_water_mark = "images_server/photo_" . $i . "_water_mark.jpg";
                $loaded_array[$id]['path_thumbnail'] = $path_thumbnail;
                $loaded_array[$id]['path_water_mark'] = $path_water_mark;

                if(!file_exists($path_thumbnail))
                {
                    $path_thumbnail = "images_server/photo_" . $i . "_thumbnail.png";
                    $path_water_mark = "images_server/photo_" . $i . "_water_mark.png";
                    $loaded_array[$id]['path_thumbnail'] = $path_thumbnail;
                    $loaded_array[$id]['path_water_mark'] = $path_water_mark;
                }

                if(!file_exists($path_thumbnail))
                {
                    unset($loaded_array[$id]);
                    return $loaded_array;
                }

                $id++;
            }
            else
                $already_skipped++;

        }

        return $loaded_array;
    }

    function page_up()
    {
        if($_SESSION['photos_number'] > ($_SESSION['gallery_page']+1) * 6)
        {
            $_SESSION['gallery_page']++;
        }
    }
    function page_down()
    {
        if($_SESSION['gallery_page'] > 0)
        {
            $_SESSION['gallery_page']--;
        }
    }
    // ***************************************
// TODO NUMBER OF REMEMBERED PHOTOS $_SESSION

    // ***************************************
    // Remembered gallery

    function load_photos_remembered()
    {
        $loaded_array = [];
        $db = new Data_base();

        $skip_photos = $_SESSION['gallery_remembered_page'] * 6;
        $already_skipped = 0;
        for($i = 0; $i < $_SESSION['photos_number']; $i++)
        {

            if(isset($_SESSION['id' . $i]))
            {
                if($already_skipped-$skip_photos >= 6)
                    break;
                if($already_skipped >= $skip_photos)
                {
                    $photo = $db->get_photo_by_id($i);
                    $loaded_array[$already_skipped-$skip_photos]['title'] = $photo['title'];
                    $loaded_array[$already_skipped-$skip_photos]['author'] = $photo['author'];
                    $loaded_array[$already_skipped-$skip_photos]['_id'] = $photo['_id'];
                    $loaded_array[$already_skipped-$skip_photos]['photo_option'] = $photo['photo_option'];
                    $loaded_array[$already_skipped-$skip_photos]['user_id'] = $photo['user_id'];

                    $path_thumbnail = "images_server/photo_" . $i . "_thumbnail.jpg";
                    $path_water_mark = "images_server/photo_" . $i . "_water_mark.jpg";
                    $loaded_array[$already_skipped-$skip_photos]['path_thumbnail'] = $path_thumbnail;
                    $loaded_array[$already_skipped-$skip_photos]['path_water_mark'] = $path_water_mark;

                    if(!file_exists($path_thumbnail))
                    {
                        $path_thumbnail = "images_server/photo_" . $i . "_thumbnail.png";
                        $path_water_mark = "images_server/photo_" . $i . "_water_mark.png";
                        $loaded_array[$already_skipped-$skip_photos]['path_thumbnail'] = $path_thumbnail;
                        $loaded_array[$already_skipped-$skip_photos]['path_water_mark'] = $path_water_mark;
                    }

                    if(!file_exists($path_thumbnail))
                    {
                        unset($loaded_array[$already_skipped-$skip_photos]);
                        return $loaded_array;
                    }
                }
                $already_skipped++;
            }


        }
        return $loaded_array;
    }

    function page_up_remembered()
    {
        if($_SESSION['photos_remembered_number'] > ($_SESSION['gallery_remembered_page']+1) * 6)
        {
            $_SESSION['gallery_remembered_page']++;
        }
    }
    function page_down_remembered()
    {
        if($_SESSION['gallery_remembered_page'] > 0)
        {
            $_SESSION['gallery_remembered_page']--;
        }
    }
    // ***************************************


    // ***************************************
    // Remembered gallery

    function load_photos_search()
    {
        $loaded_array = [];
        $db = new Data_base();

        $id = 0;
        $pattern_search = $_GET['title_to_search'];
        for($i = 0; $i < $_SESSION['photos_number']; $i++)
        {
            $photo = $db->get_photo_by_id($i);

            // If this is private then check if author is logged in
            // If not don't show this photo
            // We skip all of this photos, we don't cout them anywhere (it is like they didn't exist)
            if($photo['photo_option'] === "prywatne" && !isset($_SESSION['user_id']))
                continue;
            else if($photo['photo_option'] === "prywatne" && isset($_SESSION['user_id']) && $photo['user_id'] !== $_SESSION['user_id'])
                continue;

            $skip = true;
            if(!(strpos(strtolower($photo['title']), strtolower($pattern_search)) === false))
                $skip = false;

            if($skip === true)
                continue;

            $loaded_array[$id]['title'] = $photo['title'];
            $loaded_array[$id]['author'] = $photo['author'];
            $loaded_array[$id]['_id'] = $photo['_id'];
            $loaded_array[$id]['photo_option'] = $photo['photo_option'];
            $loaded_array[$id]['user_id'] = $photo['user_id'];

            $path_thumbnail = "images_server/photo_" . $i . "_thumbnail.jpg";
            $path_water_mark = "images_server/photo_" . $i . "_water_mark.jpg";
            $loaded_array[$id]['path_thumbnail'] = $path_thumbnail;
            $loaded_array[$id]['path_water_mark'] = $path_water_mark;

            if(!file_exists($path_thumbnail))
            {
                $path_thumbnail = "images_server/photo_" . $i . "_thumbnail.png";
                $path_water_mark = "images_server/photo_" . $i . "_water_mark.png";
                $loaded_array[$id]['path_thumbnail'] = $path_thumbnail;
                $loaded_array[$id]['path_water_mark'] = $path_water_mark;
            }

            if(!file_exists($path_thumbnail))
            {
                unset($loaded_array[$id]);
                return $loaded_array;
            }
            $id++;
        }
        return $loaded_array;
    }

    // ***************************************

}

class Registration_business
{
    function correct_login($login)
    {
        $db = new Data_base();
        $accounts = $db->get_accounts();

        foreach ($accounts as $account)
        {
            if($account['login'] === $login)
                return 'not_correct';
        }
        return 'correct';
    }
    function compare_passwords($first, $second)
    {
        if($first !== $second)
            return 'not_correct';
        return 'correct';
    }
    function hashing($password)
    {
        // Algorytm bcrypt bazujący na szyfrze Blowfish
        return password_hash($password, PASSWORD_DEFAULT);
    }
}

class Login_business
{
    function try_to_login($login, $password)
    {
        if($this->check_login($login) === 'not_correct')
            return 'not_correct';
        if($this->check_password($login, $password) === 'not_correct')
            return 'not_correct';

        $this->login($login);
        return 'correct';
    }

    private function check_login($login)
    {
        $db = new Data_base();
        $account = $db->get_account_by_login($login);
        if(count($account) === 0)
            return 'not_correct';

        return 'correct';
    }
    private function check_password($login, $password)
    {
        $db = new Data_base();
        $account = $db->get_account_by_login($login);
        if(!password_verify($password, $account['hashed_password']))
            return 'not_correct';

        return 'correct';
    }

    private function login($login)
    {
        $db = new Data_base();
        $account = $db->get_account_by_login($login);
        session_regenerate_id();
        $_SESSION['user_id'] = $account['_id'];
    }
}

class Accounts_manager_business
{
    function count_accounts()
    {
        $db = new Data_base();
        $accounts = $db->get_accounts();

        $i = 0;
        foreach ($accounts as $account)
            $i++;

        return $i;
    }
}

class Yours_gallery_business
{
    function save_photos($photos_to_remember)
    {
        if(!isset($_SESSION['photos_remembered_number']))
            $_SESSION['photos_remembered_number'] = 0;

        foreach($photos_to_remember as $element)
        {
            // 'id' and element because element is number for instance 1
            // and if there was only one character then session wouldn't save
            $_SESSION['id' . $element] = true;
            $_SESSION['photos_remembered_number']++;
        }
    }
    function delete_photos($photos_to_delete)
    {
        if(!isset($_SESSION['photos_remembered_number']))
            $_SESSION['photos_remembered_number'] = 0;

        foreach($photos_to_delete as $element)
        {
            // 'id' and element because element is number for instance 1
            // and if there was only one character then session wouldn't save
            unset($_SESSION['id' . $element]);
            $_SESSION['photos_remembered_number']--;
        }
    }
}