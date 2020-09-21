<!DOCTYPE html>

<html lang = "pl">

<head>
	<meta charset = "UTF-8"/>
	<meta http-equiv="refresh" content="30">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title> Moja Muza </title>
	
	<link rel = "stylesheet" href = "static/css/style_kategoria_muzyki.css" />
	<script src = "static/java_script/script_metal.js"></script>
	<script src = "static/java_script/storage.js"></script>

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
					<h2> METAL </h2>
				</div>
			</header>

			<article>
				<header id = "slipknot">
					<h2 class = "artist" onClick = "slipknot_details()"> Slipknot </h2>
				</header>
				<div style = "clear: both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/Slipknot-wanyk.png" alt = "Slipknot - We Are Not Your Kind">
					<figcaption class = "description"> We Are Not Your Kind </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 9 września 2019r. <br/>
					- Szósty album studyjny <br/>
					- Single: "Unsainted", "Solway Firth", "Birth of the Cruel" <br/>
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('Slipknot1','We Are Not Your Kind')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/slipknot-ahig.jpg" alt = "Slipknot - All Hope Is Gone">
					<figcaption class = "description"> All Hope Is Gone </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 20 września 2008r. <br/>
					- Czwarty album studyjny <br/>
					- Single: "All Hope Is Gone", "Psychosocial", "Sulfure" <br/>
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('Slipknot2','All Hope Is Gone')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>


			</article>

			<article>
				<header id = "hollywood_undead">
					<h2 class = "artist" onClick = "hollywood_undead_details()"> Hollywood Undead </h2>
				</header>
				<div style = "clear: both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/hu-five.jpg" alt = "Hollywood Undead - Five">
					<figcaption class = "description"> Five </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 27 października 2017r.. <br/>
					- Piąty album studyjny <br/>
					- Single: "California Dreaming", "Whatever It Takes", "Renegade" <br/>
					- Gościnnie występują: B-Real
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('hollywood_undead1','Five')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/hu-ss.jpg" alt = "Hollywood Undead - Swan Songs">
					<figcaption class = "description"> Swan Songs </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 2 września 2008r. <br/>
					- Pierwszy album <br/>
					- Single: "Undead", "Young", "Everywhere I Go" <br/>
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('hollywood_undead2','Swan Songs')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

			</article>



		</article>

	</main>

	<footer>

		<div id="foot">

			<p> Dzięki, że zajrzałeś na moją stronkę! &copy; 2019 Wszelkie prawa zastrzeżone. </p>

		</div>

	</footer>

</body>

</html>