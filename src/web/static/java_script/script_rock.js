function linkin_park_details()
{
    var desc = document.getElementById("linkin_park_new_content");
    var photo = document.getElementById("linkin_park_photo")
    if(desc != null && photo != null)
    {
        desc.remove();
        photo.remove();
    }
    else
    {
        var root = document.getElementById("linkin_park");

        var new_div = document.createElement("div");
        root.appendChild(new_div);

        var new_img = document.createElement("IMG");
        new_img.setAttribute("src", "static/images/profiles/lp-profile.jpg")
        new_img.setAttribute("alt", "Linkin Park - zdjęcie");
        new_img.className = "artist_photo";
        new_img.id = "linkin_park_photo";
        new_div.appendChild(new_img)

        var new_content = document.createElement("p");
        new_content.className = "artist_description";
        new_content.id = "linkin_park_new_content"
        new_content.innerHTML = "Pierwotnie Linkin Park nosił nazwę Xero. Mniej więcej w czasie, gdy Chester Bennington odszedł od Grey Daze (obecnie Waterface) i dołączył do LP, odszedł ze składu Mark Wakefield (wokalista), nazwę zespołu chciano zmienić na Hybrid Theory. Idea tej nazwy polegała na zaznaczeniu tego, że Kalifornijczycy grają muzykę nietypową – hybrydę metalu, elektroniki, rapu, itd.";
        new_div.appendChild(new_content);
    }


}
function queen_details()
{
    var desc = document.getElementById("queen_new_content");
    var photo = document.getElementById("queen_photo")
    if(desc != null)
    {
        desc.remove();
        photo.remove();
    }
    else
    {
        var root = document.getElementById("queen");

        var new_div = document.createElement("div");
        root.appendChild(new_div);

        var new_img = document.createElement("IMG");
        new_img.setAttribute("src", "static/images/profiles/queen-profile.jpg")
        new_img.setAttribute("alt", "Queen - zdjęcie");
        new_img.className = "artist_photo";
        new_img.id = "queen_photo";
        new_div.appendChild(new_img)

        var new_content = document.createElement("p");
        new_content.className = "artist_description";
        new_content.id = "queen_new_content"
        new_content.innerHTML = "brytyjski zespół rockowy utworzony w 1970 w Londynie przez Briana Maya, Rogera Taylora i Freddiego Mercury’ego. Basista John Deacon dołączył do grupy rok później.Muzyka Queen odznacza się różnorodnością brzmienia, sprawiającą, że zespół trudno jest przypisać do konkretnego stylu. Większość utworów nosi cechy rocka i jego odmian (hard rock, rock progresywny) oraz, w pewnym stopniu, muzyki pop. Charakterystyczną cechą zespołu są też wielowarstwowe aranżacje, harmonie wokalne oraz aktywny udział publiczności podczas koncertów.";
        new_div.appendChild(new_content);
    }

}