function eminem_details()
{
    var desc = document.getElementById("eminem_new_content");
    var photo = document.getElementById("eminem_photo")
    if(desc != null && photo != null)
    {
        desc.remove();
        photo.remove();
    }
    else
    {
        var root = document.getElementById("eminem");

        var new_div = document.createElement("div");
        root.appendChild(new_div);

        var new_img = document.createElement("IMG");
        new_img.setAttribute("src", "static/images/profiles/eminem-profile.jpg")
        new_img.setAttribute("alt", "eminem - zdjęcie");
        new_img.className = "artist_photo";
        new_img.id = "eminem_photo";
        new_div.appendChild(new_img)

        var new_content = document.createElement("p");
        new_content.className = "artist_description";
        new_content.id = "eminem_new_content"
        new_content.innerHTML = "Marshall Bruce „Eminem” Mathers III (ur. 17 października 1972 w St. Joseph), lepiej znany pod pseudonimem Eminem oraz jego alter ego Slim Shady – amerykański                                 raper, producent oraz aktor. Członek amerykańskiej grupy hiphopowej D12 oraz część duetu hiphopowego z Detroit – Bad Meets Evil, który tworzy wraz z Royce da                                 5’9”. Piętnastokrotny zdobywca Nagrody Grammy oraz laureat Oscara. Żródło wikipedia";
        new_div.appendChild(new_content);
    }


}
function logic_details()
{
    var desc = document.getElementById("logic_new_content");
    var photo = document.getElementById("logic_photo")
    if(desc != null)
    {
        desc.remove();
        photo.remove();
    }
    else
    {
        var root = document.getElementById("logic");

        var new_div = document.createElement("div");
        root.appendChild(new_div);

        var new_img = document.createElement("IMG");
        new_img.setAttribute("src", "static/images/profiles/logic-profile.jpg")
        new_img.setAttribute("alt", "logic - zdjęcie");
        new_img.className = "artist_photo";
        new_img.id = "logic_photo";
        new_div.appendChild(new_img)

        var new_content = document.createElement("p");
        new_content.className = "artist_description";
        new_content.id = "logic_new_content"
        new_content.innerHTML = "Logic, właściwie Sir Robert Bryson Hall II (ur. 22 stycznia 1990 r. w Rockville) – amerykański raper, producent muzyczny i autor tekstów oraz piosenkarz.                                     Żródło wikipedia";
        new_div.appendChild(new_content);
    }

}

function nf_details()
{
    var desc = document.getElementById("nf_new_content");
    var photo = document.getElementById("nf_photo")
    if(desc != null)
    {
        desc.remove();
        photo.remove();
    }
    else
    {
        var root = document.getElementById("nf");

        var new_div = document.createElement("div");
        root.appendChild(new_div);

        var new_img = document.createElement("IMG");
        new_img.setAttribute("src", "static/images/profiles/nf-profile.jpg")
        new_img.setAttribute("alt", "nf - zdjęcie");
        new_img.className = "artist_photo";
        new_img.id = "nf_photo";
        new_div.appendChild(new_img)

        var new_content = document.createElement("p");
        new_content.className = "artist_description";
        new_content.id = "nf_new_content"
        new_content.innerHTML = "NF, właściwie Nathan John Feuerstein (ur. 30 marca 1991 w Gladwin) – amerykański raper tworzący zarówno mainstreamowy, jak i chrześcijański hip-hop.                                          Wydany w 2017 r. album artysty, Perception, dotarł na pierwsze miejsce listy przebojów Billboard 200, wyprzedzając raperów takich jak Lil Pump, Kendrick, czy                                 Jay-Z. Do tej pory ukazały się cztery albumy studyjne NF: Mansion w 2015 roku, Therapy Session w 2016 roku, Perception, wydany 6 października 2017 roku                                       i The Search wydany w lipcu 2019 roku. Żródło wikipedia";
        new_div.appendChild(new_content);
    }

}

