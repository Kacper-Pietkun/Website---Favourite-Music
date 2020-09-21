<!DOCTYPE html>

<html lang = "pl">

<head>
    <meta charset = "UTF-8"/>
    <meta http-equiv="refresh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title> Moja Muza </title>

    <link rel = "stylesheet" href = "static/css/style_formularz.css" />
</head>

<body>

<header>

    <div id = "logo_txt">
        <h1> Moja Muza </h1>
    </div>

    <nav>
        <ul id = "menu">
            <li> <a href = "/"> Strona Główna </a> </li>
            <li> <a href = "/formularz"> formularz </a> </li>
            <li class = "dropdown">
                <a href = "/kategorie"> Kategorie </a>
                <div class="dropdown-content">
                    <p class = "dropdown_element"> <a href = "/rap">Rap</a> </p>
                    <p class = "dropdown_element"> <a href = "/rock">Rock</a> </p>
                    <p class = "dropdown_element"> <a href = "/metal"> Metal</a> </p>
                </div>
            </li>
            <li> <a href = "/los"> Szczęśliwy Los </a> </li>
            <li> <a href = "/kolekcja"> Twoja kolekcja </a> </li>
            <li> <a href = "/o_muzyce"> O Muzyce </a> </li>
        </ul>
    </nav>

    <div style = "clear: both;"></div>

</header>

<main>
    <article>
        <header>
            <h4> Zauważyłeś jakąś super okładkę płyty? Podziel się z nami! </h4>
        </header>

        <form action="formularz" method="post" enctype="multipart/form-data">
            <span> Wybierz plik: </span>
            <input type = "file" name = "photo"><br/>

            <span> Wpisz tytuł: </span>
            <input type="text" name="title"><br/>

            <span> Wpisz swój nick: </span>
            <?php

            if(isset($_SESSION['user_id']))
            {
                $login = $model['login'];
                echo <<< END
                <input type="text" name="author" value=$login><br/>
                Wybierz opcję zdjęcia: <br/>
                <input type="radio" name="photo_option" value="publiczne" checked> Publiczne <br/>
                <input type="radio" name="photo_option" value="prywatne"> Prywatne <br/>
                
END;
            }
            else
            {
                echo '<input type="text" name="author"><br/>';
            }
            ?>

            <span> Wpisz znak wodny: </span>
            <textarea name="water_mark" rows="1"></textarea>

            <input type="submit" value="Wyślij">
            <input type="reset" value="Wyczyść">
        </form>
        <?php
        if(isset($_SESSION['sending_succeeded']))
        {
            echo '<p style="color: green; margin-left: 5%;"> Przesłanie pliku powiodło się</p>';
            unset($_SESSION['sending_succeeded']);
        }
        if(isset($_SESSION['sending_not_succeeded']))
        {
            echo '<p style="color: red; margin-left: 5%;"> Przesłanie pliku nie powiodło się</p>';
            unset($_SESSION['sending_not_succeeded']);
        }
        if(isset($_SESSION['err_image_size']))
        {
            echo '<p style="color: red; margin-left: 5%;"> Zły rozmiar pliku </p>';
            unset($_SESSION['err_image_size']);
        }
        if(isset($_SESSION['err_image_extension']))
        {
            echo '<p style="color: red; margin-left: 5%;" >Złe rozszerzenie pliku </p>';
            unset($_SESSION['err_image_extension']);
        }
        if(isset($_SESSION['err_image']))
        {
            echo '<p style="color: red; margin-left: 5%;" >Nie wybrano pliku </p>';
            unset($_SESSION['err_image']);
        }
        if(isset($_SESSION['err_water_mark']))
        {
            echo '<p style="color: red; margin-left: 5%;" >Nie wpisano znaku wodnego </p>';
            unset($_SESSION['err_water_mark']);
        }
        if(isset($_SESSION['err_image_title']))
        {
            echo '<p style="color: red; margin-left: 5%;" >Nie wpisano tytułu </p>';
            unset($_SESSION['err_image_title']);
        }
        if(isset($_SESSION['err_image_author']))
        {
            echo '<p style="color: red; margin-left: 5%;" >Nie wpisano autora </p>';
            unset($_SESSION['err_image_author']);
        }
        if(isset($_SESSION['err_photo_option']))
        {
            echo '<p style="color: red; margin-left: 5%;" >Nie wybrano opcji zdjęcia </p>';
            unset($_SESSION['err_photo_option']);
        }
        ?>
    </article>

</main>

<footer>

    <div id="foot">

        <p> Dzięki, że zajrzałeś na moją stronkę! &copy; 2019 Wszelkie prawa zastrzeżone. </p>

    </div>

</footer>

</body>

</html>