<!DOCTYPE html>

<html lang = "pl">

<head>
	<meta charset = "UTF-8"/>
	<meta http-equiv="refresh" content="30">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title> Moja Muza </title>
	
	<link rel = "stylesheet" href = "static/css/style_kategoria_muzyki.css" />
	<script src = "static/java_script/script_rap.js"></script>
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
					<h2> RAP </h2>
				</div>
			</header>

			<article>
				<header id = "eminem">
					<h2 class = "artist" onClick = "eminem_details()"> Eminem </h2>
				</header>
				<div style = "clear: both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/eminem-kamikaze.jpg" alt = "Eminem - Kamikaze">
					<figcaption class = "description"> Kamikaze </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 31 września 2018r. <br/>
					- Dziesiąty album studyjny <br/>
					- Single: "Fall", "Venom", "Lucky You" <br/>
					- Gościnnie występują: Joyner Lucas, Royce Da 5'9", Jessie Reyez
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('Eminem1','Kamikaze')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/eminem-recovery.jpg" alt = "Eminem - Recovery">
					<figcaption class = "description"> Recovery </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 18 września 2010r. <br/>
					- Siódmy album studyjny <br/>
					- Single: "Not Afraid", "Love the way you Lie", "No Love" <br/>
					- Gościnnie występują: Kobe Honeycutt, P!nk, Lil Wayne, Rihanna
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('Eminem2','Recovery')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/eminem-the-eminem-show.jpg" alt = "Eminem - The eminem show">
					<figcaption class = "description"> The eminem show </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 4 czerwca 2002r. <br/>
					- Czwarty album studyjny <br/>
					- Single: "Without me", "Cleanin' out my closet", "Superman" <br/>
					- Gościnnie występują: Obie Trice, Dina Rae, D12, Dr. Dre, Nate Dogg
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('Eminem3','The Eminem Show')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

			</article>

			<article>
				<header id = "logic">
					<h2 class = "artist" onClick = "logic_details()"> Logic </h2>
				</header>
				<div style = "clear: both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/logic-coadm.jpg" alt = "Logic - Confessions of a dangerous mind">
					<figcaption class = "description"> Confessions of a dangerous mind </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 10 maja 2019r. <br/>
					- Piąty album studyjny <br/>
					- Single: "Keanu Reeves", "Confessions of a Dangerous Mind", "Homicide" <br/>
					- Gościnnie występują: Eminem, Wiz Khalifa, Will Smith, G-Eazy
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('Logic1','Confessions of a dangerous mind')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/logic-bobby-tarantino.jpg" alt = "Logic - Bobby Tarantino">
					<figcaption class = "description"> Bobby Tarantino </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 1 stycznia 2016r. <br/>
					- Szósty mixtape <br/>
					- Single: "Flexicution", "Wrist " <br/>
					- Gościnnie występują: Pusha T
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('Logic2','Bobby Tarantino')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

			</article>


			<article>
				<header id = "nf">
					<h2 class = "artist" onClick = "nf_details()"> NF </h2>
				</header>
				<div style = "clear: both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/nf-the-search.jpg" alt = "NF - The search">
					<figcaption class = "description"> The search </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 26 lipca 2019r. <br/>
					- Czwarty album studyjny <br/>
					- Single: "Why", "The Search", "When I Grow Up", "Time" <br/>
					- Gościnnie występują: Sasha Sloan
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('NF1','The Search')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/nf-perception.jpg" alt = "NF - Perception">
					<figcaption class = "description"> Perception </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 6 października 2017r. <br/>
					- Trzeci album studyjny <br/>
					- Single: "Outro", "Green Lights", "Let You Down", "Lie", "If You Want Love" <br/>
					- Gościnnie występują: Ruelle
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('NF2','Perception')"> Dodaj do ulubionych </button>
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