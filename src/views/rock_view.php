<!DOCTYPE html>

<html lang = "pl">

<head>
	<meta charset = "UTF-8"/>
	<meta http-equiv="refresh" content="30">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title> Moja Muza </title>
	
	<link rel = "stylesheet" href = "static/css/style_kategoria_muzyki.css" />
	<script src = "static/java_script/script_rock.js"></script>
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
					<h2> ROCK </h2>
				</div>
			</header>

			<article>
				<header id = "linkin_park">
					<h2 class = "artist" onClick = "linkin_park_details()"> Linkin Park </h2>
				</header>
				<div style = "clear: both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/lp-meteora.jpg" alt = "Linkin Park - Meteora">
					<figcaption class = "description"> Meteora </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 25 marca 2002r. <br/>
					- Drógi album studyjny <br/>
					- Single: "Numb", "Faint", "Breaking the Habit" <br/>
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('linkin_park1','Meteora')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/lp-ht.jpg" alt = "Linkin Park - Hybrid Theory">
					<figcaption class = "description"> Hybrid Theory </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 24 października 2000r. <br/>
					- Debiutancki album studyjny <br/>
					- Single: "One Step Closer", "Crawling", "Papercut" <br/>
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('linkin_park2','Hybrid Theory')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/lp-oml.jpeg" alt = "Linkin Park - One More Light">
					<figcaption class = "description"> One More Light </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 19 maja 2017r. <br/>
					- Siódmy album studyjny <br/>
					- Single: "Heavy", "Talking to Myself", "One More Light" <br/>
					- Gościnnie występują: Pusha T, Stormzy, Kiiara
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('linkin_park3','One More Light')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

			</article>

			<article>
				<header id = "queen">
					<h2 class = "artist" onClick = "queen_details()"> Queen </h2>
				</header>
				<div style = "clear: both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/queen-anato.jpg" alt = "Queen - A Night at the Opera">
					<figcaption class = "description"> A Night at the Opera </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 21 listopada 1975r. <br/>
					- Czwarty album studyjny <br/>
					- Single: "Bohemian Rhapsody", "You’re My Best Friend" <br/>
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('Queen1','A Night at the Opera')"> Dodaj do ulubionych </button>
				<div style = "clear:both;"></div>

				<figure class = "album_figure">
					<img class = "music_cover" src = "static/images/covers/queen-tw.jpg" alt = "Queen - The Works">
					<figcaption class = "description"> The Works </figcaption>
				</figure>
				<div class = "comment">
					- Wydany 27 lutego 1984r. <br/>
					- Jedenasty album studyjny <br/>
					- Single: "Radio Ga Ga", "I Want to Break Free", "It's a Hard Life" <br/>
				</div>
				<button class = "button_add" type = "button" onClick = "add_local_storage('Queen2','The Works')"> Dodaj do ulubionych </button>
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