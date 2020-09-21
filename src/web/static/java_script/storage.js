var root = null;
var div = null;
var new_element = null;
var new_button = null;
var helper = null;

var contrast = 0;

function add_local_storage(autor, album)
{
    if(window.localStorage)
    {
        localStorage.setItem(autor, album);
    }

}

function create_content(opis, klucz)
{
    div = document.createElement("div");
    root.appendChild(div);

    new_element = document.createElement("p");
    new_element.innerHTML = opis;
    new_element.className = "fav_album";

    new_button = document.createElement("button");
    new_button.className = "fav_album_button";
    new_button.innerHTML = "usuń";
    new_button.addEventListener("click", function () {
        localStorage.removeItem(klucz);
        location.reload();
    });


    helper = document.createElement("div");
    helper.style = "clear:both;";

    div.appendChild(new_element);
    div.appendChild(new_button);
    div.appendChild(helper);

}

function get_albums()
{
    var blocker = document.getElementById("blocker");
    if(blocker != null)
        blocker.remove();

    root = document.getElementById("root");

    if(localStorage.getItem("Eminem1") != null)
        create_content("Eminem - Kamikaze", "Eminem1");

    if(localStorage.getItem("Eminem2") != null)
        create_content("Eminem - Recovery", "Eminem2");

    if(localStorage.getItem("Eminem3") != null)
        create_content("Eminem - The Eminem Show", "Eminem3");

    if(localStorage.getItem("Logic1") != null)
        create_content("Logic - Confessions of a dangerous mind", "Logic1");

    if(localStorage.getItem("Logic2") != null)
        create_content("Logic - Bobby Tarantino", "Logic2");

    if(localStorage.getItem("NF1") != null)
        create_content("NF - The Search", "NF1");

    if(localStorage.getItem("NF2") != null)
        create_content("NF - Perception", "NF2");

    if(localStorage.getItem("Slipknot1") != null)
        create_content("Slipknot - We Are Not Your Kind", "Slipknot1");

    if(localStorage.getItem("Slipknot2") != null)
        create_content("Slipknot - All Hope Is Gone", "Slipknot2");

    if(localStorage.getItem("hollywood_undead1") != null)
        create_content("Hollywood Undead - Five", "hollywood_undead1");

    if(localStorage.getItem("hollywood_undead2") != null)
        create_content("Hollywood Undead - Swan Songs", "hollywood_undead2");

    if(localStorage.getItem("linkin_park1") != null)
        create_content("Linkin Park - Meteora", "linkin_park1");

    if(localStorage.getItem("linkin_park2") != null)
        create_content("Linkin Park - Hybrid Theory", "linkin_park2");

    if(localStorage.getItem("linkin_park3") != null)
        create_content("Linkin Park - One More Light", "linkin_park3");

    if(localStorage.getItem("Queen1") != null)
        create_content("Queen - A Night at the Opera", "Queen1");

    if(localStorage.getItem("Queen2") != null)
        create_content("Queen - The Works", "Queen2")
}


function load_page_css()
{
    if(window.sessionStorage)
    {
        if(sessionStorage.getItem("contrast") == null)
            sessionStorage.setItem("contrast", "0");

        var contrast_button = document.getElementById("contrast_button");
        var logo_txt = document.getElementById("logo_txt");
        var content = document.getElementById("content");
        var body = document.getElementsByTagName("body")[0];
        var foot = document.getElementById("foot");
        var contrast_a = document.getElementsByTagName("a");

        if(sessionStorage.getItem("contrast") === "0")
        {
            contrast_button.innerHTML = "Włącz tryb wysokiego kontrastu";

            logo_txt.style.backgroundColor = "#242222";
            logo_txt.style.color = "#ff934d";

            content.style.color = "#ffc996";

            body.style.backgroundColor = "#242222";

            foot.style.color = "#000000";
            foot.style.backgroundColor = "#ff8636";

            contrast_button.style.color = "bisque";

            for(i=0; i<9; i++)
                contrast_a[i].style.color = "#ffffff";


        }
        else
        {
            contrast_button.innerHTML = "Wyłącz tryb wysokiego kontrastu";

            logo_txt.style.color = "#ff9100";
            logo_txt.style.backgroundColor = " #0051ff";

            content.style.color = "#ff9100";

            body.style.backgroundColor = "#0051ff";

            foot.style.color = "#0051ff";
            foot.style.backgroundColor = "#ff8636";

            contrast_button.style.color = "#0051ff";

            for(var i=0; i<9; i++)
                contrast_a[i].style.color = "#0051ff";

        }
    }

}

function session_storage_button()
{
    if(window.sessionStorage)
    {
        if(sessionStorage.getItem("contrast") === "0")
            sessionStorage.setItem("contrast", "1");
        else
            sessionStorage.setItem("contrast", "0");

        load_page_css();
    }

}