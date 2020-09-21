function slipknot_details()
{
    var desc = document.getElementById("slipknot_new_content");
    var photo = document.getElementById("slipknot_photo")
    if(desc != null && photo != null)
    {
        desc.remove();
        photo.remove();
    }
    else
    {
        var root = document.getElementById("slipknot");

        var new_div = document.createElement("div");
        root.appendChild(new_div);

        var new_img = document.createElement("IMG");
        new_img.setAttribute("src", "static/images/profiles/slipknot-profile.jpg")
        new_img.setAttribute("alt", "Slipknot - zdjęcie");
        new_img.className = "artist_photo";
        new_img.id = "slipknot_photo";
        new_div.appendChild(new_img)

        var new_content = document.createElement("p");
        new_content.className = "artist_description";
        new_content.id = "slipknot_new_content"
        new_content.innerHTML = "amerykańska grupa wykonująca muzykę z pogranicza heavy, nu i metalu alternatywnego Cechą charakterystyczną grupy jest fakt występowania jej członków w zasłaniających twarze maskach. Przez szereg lat aż do 2010 roku zespół tworzył niezmiennie dziewięcioosobowy skład.";
        new_div.appendChild(new_content);
    }


}
function hollywood_undead_details()
{
    var desc = document.getElementById("hollywood_undead_new_content");
    var photo = document.getElementById("hollywood_undead_photo")
    if(desc != null)
    {
        desc.remove();
        photo.remove();
    }
    else
    {
        var root = document.getElementById("hollywood_undead");

        var new_div = document.createElement("div");
        root.appendChild(new_div);

        var new_img = document.createElement("IMG");
        new_img.setAttribute("src", "static/images/profiles/hollywood-profile.jpg")
        new_img.setAttribute("alt", "Hollywood Undead - zdjęcie");
        new_img.className = "artist_photo";
        new_img.id = "hollywood_undead_photo";
        new_div.appendChild(new_img)

        var new_content = document.createElement("p");
        new_content.className = "artist_description";
        new_content.id = "hollywood_undead_new_content"
        new_content.innerHTML = "W pierwszym składzie zespołu znaleźli się: J-Dog, Deuce, Johnny 3 Tears, Charlie Scene, Funny Man, Da Kurlzz oraz Shady Jeff. Hollywood Undead inspirowali się takimi zespołami jak: Linkin Park, Limp Bizkit, Wu-Tang Clan, Beastie Boys, Nine Inch Nails czy też Eminemem. Pierwsze piosenki zespół opublikował na portalu MySpace. W 2007 roku powstał album Hollywood Undead. Zespół nie zgodził się na wydanie płyty ze względu na ocenzurowanie zawartości albumu przez MySpace.";
        new_div.appendChild(new_content);
    }

}
