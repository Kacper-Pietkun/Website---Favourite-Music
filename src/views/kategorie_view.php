<!DOCTYPE html>

<html lang = "pl">

<head>
	<meta charset = "UTF-8"/>
	<meta http-equiv="refresh" content="30">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title> Moja Muza </title>
	
	<link rel = "stylesheet" href = "static/css/style_kategorie.css" />

	<script src = "static/java_script/script_kategorie.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>

		$(document).ready(function()
		{
			$("#rap").hover(function()
					{
						change_text($(this).attr("id"));
					},
					function()
					{
						change_text("Kategoria");
					});

			$("#rock").hover(function()
					{
						change_text($(this).attr("id"));
					},
					function()
					{
						change_text("Kategoria");
					});

			$("#metal").hover(function()
					{
						change_text($(this).attr("id"));
					},
					function()
					{
						change_text("Kategoria");
					});
		});

	</script>

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
					<h2> Wybierz kategorię </h2>
				</div>
			</header>

			<a href = "rap">
				<div class = "music_category" id = "rap" > RAP </div>
			</a>

			<a href = "rock">
				<div class = "music_category" id = "rock"> ROCK </div>
			</a>

			<a href = "metal">
				<div class = "music_category" id = "metal" > METAL </div>
			</a>
			<div id = "category_txt"> Kategoria </div>

		</article>

	</main>

	<footer>

		<div id="foot">

			<p> Dzięki, że zajrzałeś na moją stronkę! &copy; 2019 Wszelkie prawa zastrzeżone. </p>

		</div>

	</footer>

</body>

</html>