<!DOCTYPE html>

<html lang = "pl">

<head>
	<meta charset = "UTF-8"/>
	<meta http-equiv="refresh" content="30">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title> Moja Muza </title>
	
	<link rel = "stylesheet" href = "static/css/style_glowna.css" type="text/css" />

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
                    <h2> Galeria twoich ulubionych okładek albumów </h2>
                </div>
            </header>
            <br/>

            <form action="/twoja_galeria" method="post">
            <?php
                if(count($model['photos']) === 0)
                {
                    echo '<p style="color: #ff8636;"> BRAK ZDJĘĆ </p>';
                }
                else
                {
                    foreach($model['photos'] as $element)
                    {
                        $path_thumbnail = $element['path_thumbnail'];
                        $path_water_mark = $element['path_water_mark'];
                        $title = $element['title'];
                        $author = $element['author'];
                        $photo_option = $element['photo_option'];
                        $id = $element['_id'];

                        echo<<<END
                        <span class='galeria'>
                            <a href = $path_water_mark>
                                <img src = $path_thumbnail>
                            </a>
                            <p class="galeria_text"> $author </p>
                            <p class="galeria_text"> $title </p>
                            
                        
END;
                        if($photo_option === 'prywatne')
                            echo '<p class="galeria_text_private">' . $photo_option . '</p>';
                        echo '<input type="checkbox" name="checked[]" value=' . $id . '>';
                        echo '</span>';
                    }
                    echo '<p style="color: #ff8636;"> strona: ' . ($_SESSION["gallery_remembered_page"]+1) . '</p>';

                }
            ?>
                <input type="submit" name="delete" value="Usuń zaznaczone z zapamiętanych">
            </form>

            <form action="/" method="post">
                <input type="submit" name="previous_page_remembered" value="Poprzednia strona">
                <input type="submit" name="next_page_remembered" value="Następna strona">
            </form>

        </article>

	</main>

	<footer>

		<div id="foot">

			<p> Dzięki, że zajrzałeś na moją stronkę! &copy; 2019 Wszelkie prawa zastrzeżone. </p>

		</div>

	</footer>

</body>

</html>