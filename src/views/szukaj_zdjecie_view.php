<!DOCTYPE html>

<html lang = "pl">

<head>
	<meta charset = "UTF-8"/>
	<meta http-equiv="refresh" content="30">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title> Moja Muza </title>
	
	<link rel = "stylesheet" href = "static/css/style_glowna.css" type="text/css" />

    <script>
        function show_response(str)
        {
            if (str.length == 0)
            {
                document.getElementById("results").innerHTML = "";
                return;
            }
            else
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function()
                {
                    if (this.readyState == 4 && this.status == 200)
                    {
                        document.getElementById("results").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "szukaj?title_to_search=" + str, true);
                xmlhttp.send();
            }
        }

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
                <div class = "content_title">
                    <h2> Znajdź zdjęcie! </h2>
                </div>
            </header>
            <br/>

            <input type="text" id="search" onkeyup="show_response(this.value)" placeholder="Wpisz tytuł zdjęcia">
            <div id="results"></div>

        </article>

	</main>

	<footer>

		<div id="foot">

			<p> Dzięki, że zajrzałeś na moją stronkę! &copy; 2019 Wszelkie prawa zastrzeżone. </p>

		</div>

	</footer>

</body>

</html>