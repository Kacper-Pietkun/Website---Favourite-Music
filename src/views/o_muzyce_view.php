<!DOCTYPE html>

<html lang = "pl">

<head>
	<meta charset = "UTF-8"/>
	<meta http-equiv="refresh" content="30">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title> Moja Muza </title>
	
	<link rel = "stylesheet" href = "static/css/style_o_muzyce.css" />

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script src = "static/java_script/storage.js"></script>

	<script>
		$(document).ready( function() {
			$( "#content" ).tabs();
		} );
	</script>

</head>

<body onload = load_page_css()>

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
					<h2> Trochę historii </h2>
				</div>
			</header>

			<div id = "contrast">
				<button id = "contrast_button" type="button" onClick = session_storage_button()>Włącz tryb wysokiego kontrastu</button>
			</div>

			<div id = "content">
				<ul id = "sub_menu">
					<li> <a href = "#zakladka_1"> Rap </a> </li>
					<li> <a href = "#zakladka_2"> Rock </a> </li>
					<li> <a href = "#zakladka_3"> Metal </a> </li>
				</ul>
				<div style = "clear: both;"></div>
				<div id="zakladka_1">
					<h3> Troszkę o Rapie</h3>
					<p>
						Rap często zamiennie z wyrażeniem hip-hop określany jest jako odrębny gatunek muzyczny powstały we wczesnych latach 70. XX wieku w Stanach Zjednoczonych Ameryki wśród 						czarnoskórych mieszkańców. Chociaż rap powszechnie uważany jest za muzykę, to wielu naukowców wskazuje na jego bliskie pokrewieństwo z poezją. Pod koniec lat 70. XX 						wieku rap stał się odrębnym nurtem w muzyce rockowej. Hip-hop powstał w 1970 w Nowym Jorku w kulturze afroamerykańskiej młodzieży zamieszkałej w Bronksie. Zaczął 	 						stawać się popularny na tzw. „block parties” – improwizowanych spotkaniach muzyczno-tanecznych odbywających się na zewnątrz stały się wtedy popularne jako alternatywa 						dla niebezpiecznych dyskotek. Na imprezach ulicznych w dzielnicach („block parties”) DJ puszczał na gramofonie kilkusekundowe frazy rytmiczne z nagrań płytowych 	  						znanych piosenek, zapętlał je i łączył w dłuższe ciągi muzyczne przy użyciu drugiej kopii tego samego longplaya. Zapętlał dany fragment, przez co tworzył zupełnie nową 						kompozycję. Pierwsze wykonania muzyki hip-hop wykorzystywały techniki łączenia próbek dźwięku oraz rytm mechanicznej perkusji wzięty z pierwszych syntezatorów, które 						stały się wtedy powszechne. DJ łączył podczas wykonania technikę miksowania breaków oraz rapowany styl wokalny toasting, popularny wcześniej na Karaibach (Jamajka).</p>
					<br/><br/>
				</div>

				<div id="zakladka_2">
					<h3> Troszkę o Rocku</h3>
					<p>

						Źródła różnie podają datę powstania pierwszego rockowego nagrania. Niezależnie od tego, lata 50. XX wieku były dekadą, która wyniosła na szczyt muzykę rockandrollową. 						Kwestia dyskryminacji rasowej była widoczna w Stanach Zjednoczonych dużo wcześniej, a muzyka rock’n’rollowa przeciwstawiała się temu podziałowi. Rock notował coraz 						większy wzrost popularności z dnia na dzień. Dostrzegalny był znaczący wpływ na całym świecie. Słowa piosenek rockandrollowych były dużo bardziej sugestywne 	  	 						społecznie, niż miało to miejsce w innych gatunkach. Muzyka motywowała nastolatków do buntowania się przeciwko niektórym tradycyjnym zwyczajom. Był to bezpośredni 							sprzeciw wobec wspólnego punktu widzenia rodziców, że dzieci powinny „być widziane i nie być słyszane”. Ta rockandrollowa postawa uraziła niektórych rodziców i 	   						spowodowała, że postrzegali tę muzykę jako coś groźnego. Kultura Hollywood wykorzystała tę lukę między pokoleniami i uchwyciła ideę muzyki rockandrollowej. 	   							Interesowała nastolatków, jednocześnie szokując rodziców.

						Rockabilly był popularnym stylem rockandrollowym podczas lat 50. Miał swoje korzenie w country, bluesie i swingu. Muzyka country zawsze była blisko związana z bluesem, 						szczególnie w latach 50. Od kiedy rockabilly pojawił się jako osobny styl muzyczny przyciągnął wielu fanów country. Na początku termin „rockabilly” był postrzegany 						jako uwłaczający, naruszający prawo. Jednakże zaczął zyskiwać szacunek podczas lat 50. Ten oryginalny gatunek przyciągał szerokie grono fanów, nie tylko młodych ludzi. 						Rockabilly miało później wpływ na wykonawców rockowych lat 60.

						Jednym z najbardziej znanych przedstawicieli rockabilly był Elvis Presley, znany jako Król Rock’N’Rolla. Połączył ambitną gitarę z basem i wyniósł ten rytm do rangi 						dominującego nurtu. Pożądany był również styl śpiewu Elvisa. Kiedy utwór „That’s All Right Mama” został wypuszczony na rynek przez wytwórnię Sun Studios w lipcu 1954 						roku i stacje radiowe w pobliżu Memphis zaczęły grać piosenkę, błyskawicznie została ona lokalnym hitem. Już w grudniu tego roku była grana w całym kraju. Elvis zaczął 						wtedy zgłębiać wiele innych gatunków muzycznych poza rockabilly i został najbardziej popularnym artystą swojego czasu. Również wczesne nagrania Jerry’ego Lee Lewisa, 						Johnny’ego Casha czy Roya Orbisona określane są jako rockabilly.</p> <br/><br/>
				</div>

				<div id="zakladka_3">
					<h3> Troszkę o Metalu</h3>
					<p>
						Pierwszą grupą grającą muzykę heavy metal w jej rozwiniętym już kształcie, był Judas Priest. W swej symbolice odnosił się raczej do Black Sabbath niż Led Zeppelin czy 						Deep Purple, rozciągając jej granice do ekstremum. Podstawowymi cechami tej muzyki była ostra i dudniąca praca sekcji rytmicznej, dominacja mocno przesterowanej, ostro 						grającej gitary elektrycznej (u niektórych grup duetu gitar elektrycznych, u Iron Maiden nawet tria). Największą różnorodność można zaobserwować w rodzaju śpiewu. 							Wokaliści zaadaptowali wiele różnych stylów – od gardłowego, bardzo szorstkiego śpiewu (Bona Scotta i Briana Johnsona z AC/DC), przez growl, aż do śpiewu czystym 	 						falsetem (Mercyful Fate, Stratovarius). Do najbardziej znanych grup heavymetalowych tego okresu należały Iron Maiden, AC/DC, Kiss, Judas Priest, Motörhead, Saxon, Blue 						Öyster Cult, czy Nazareth.
						Początek lat 80. XX wieku był okresem wzmożonej popularności, a jednocześnie wyraźnych jego przemian. Muzyka heavymetalowa, będąca ciągle alternatywnym gatunkiem 	 						rocka, zaczyna dominować w radiu i rodzącej się wtedy telewizji muzycznej. Miało to olbrzymi wpływ na zarówno wizualną stronę muzyki, jak i samo jej brzmienie. 	   						Początkowo muzyka była ostra i agresywna, w pierwszej połowie dekady osiągnęła surowość znacznie większą niż w poprzedniej dekadzie za sprawą takich zespołów jak Iron 						Maiden, Saxon, Tank, Raven, Holocaust, Tygers Of Pan Tang czy Battleaxe, jednak w połowie lat 80. nastąpiło stopniowe łagodzenie jej brzmienia. Popularność zyskują 						takie grupy, jak Europe, Def Leppard, Van Halen, Scorpions, oraz te zbliżające heavy metal niemal do popowego standardu, jak Bon Jovi, Poison. Do muzyki wprowadzono 						chórki, instrumenty klawiszowe, a do scenicznej praktyki choreografię, fantazyjne stroje i makijaż. Styl ten w literaturze angielskiej zwany hair metal lub big hair 						metal, ze względu na wielkie tapirowane fryzury noszone przez muzyków, zapewne doprowadziłby do ostatecznego wtopienia się gatunku w główny nurt rocka, gdyby nie 	 						pojawienie się grup, należących do nurtów thrash i death metal, co miało miejsce w tym samym czasie. Formacje te spotęgowały surowość heavy metalu, wprowadzając wpływy 						muzyki punk. Za tymi zespołami poszedł cały legion innych grup rockowych, czyniąc heavy metal, coraz częściej nazywany po prostu metalem, jednym z najpopularniejszych 						i najbardziej żywotnych kierunków we współczesnym rocku. Z czasem też wykształciła się mnogość podgatunków i stylów metalowych, często łączonych z innymi gatunkami 						muzycznymi (nu metal, hard core, industrial metal).</p> <br/><br/>
				</div>

			</div>
		</article>

	</main>

	<footer>

		<div id="foot">

			<p> Dzięki, że zajrzałeś na moją stronkę! &copy; 2019 Wszelkie prawa zastrzeżone. </p>

		</div>

	</footer>

</body>

</html>