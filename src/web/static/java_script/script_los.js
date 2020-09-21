function start()
{
    document.getElementById("JS_info").remove();
}

function wylosuj()
{
    var piosenki = ["Queen - Bohemian Rhapsody",
                    "Eminem - Not afraid",
                    "Logic - Fflexicution",
                    "NF - Time",
                    "Slipknot - Nero Forte",
                    "AC/DC - Highway to Hell",
                    "G-Eazy & Halsey - Him & I",
                    "Machine Gun Kelly, Camila Cabello - Bad Things",
                    "Linkin Park - Numb",
                    "Diddy - I'll be Missing You",
                    "Eminem - Killshot",
                    "U2 - With or without You",
                    "Tech N9ne - Sriracha",
                    "Logic - Contra",
                    "Xzibit - My Name",
                    "N.W.A. - Straight Outta Compton"]


    var numer = Math.floor(Math.random() * 16);
    var text = document.getElementById("song");
    text.innerHTML = piosenki[numer];
}