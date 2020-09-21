<!DOCTYPE html>

<html lang = "pl">

<head>
	<meta charset = "UTF-8"/>
	<meta http-equiv="refresh" content="30">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title> Moja Muza </title>
	
	<link rel = "stylesheet" href = "static/css/style_formularz.css" type="text/css" />

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
                <div id = "content_title">
                    <h2> Rejestracja </h2>
                </div>
            </header>

            <form action="rejestracja" method="post">

                <span> Emal: </span>
                <input type="text" name="email"><br/>

                <span> Login: </span>
                <input type="text" name="login"><br/>

                <span> Hasło: </span>
                <input type="password" name="password"><br/>

                <span> Powtórz hasło: </span>
                <input type="password" name="password_repeat"><br/>


                <input type="submit" value="Wyślij">
                <input type="reset" value="Wyczyść">
            </form>

            <?php
                if(isset($_SESSION['correct_registration']))
                {
                    echo '<p style="color: green; margin-left: 5%;"> Utworzono konto </p>';
                    unset($_SESSION['correct_registration']);
                }
                if(isset($_SESSION['bad_input']))
                {
                    echo '<p style="color: red; margin-left: 5%;"> Nie Uzupełniono całego formularza! </p>';
                    unset($_SESSION['bad_input']);
                }
                if(isset($_SESSION['bad_repeated_password']))
                {
                    echo '<p style="color: red; margin-left: 5%;"> Hasła się nie zgadzają </p>';
                    unset($_SESSION['bad_repeated_password']);
                }
                if(isset($_SESSION['repeated_login']))
                {
                    echo '<p style="color: red; margin-left: 5%;"> Podany login jest już zajęty </p>';
                    unset($_SESSION['repeated_login']);
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