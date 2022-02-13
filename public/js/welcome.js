/*検索バー*/
const shops_all = document.getElementsByClassName("shop_card");
var area_keyword = document.getElementById("area_keyword");
var genre_keyword = document.getElementById("genre_keyword");
var name_keyword = document.getElementById("name_keyword");

const fucn_serch = function() {
    var area_designated = document.getElementById("area_keyword").value;
    var genre_designated = document.getElementById("genre_keyword").value;
    var name_designated = document.getElementById("name_keyword").value;

    Array.from(shops_all).forEach(function(item, index) {
        item.style.display = 'block';
    })
    var shops_area_designated = document.getElementsByClassName("for_serch_area");
    for (let i = 0; i < shops_all.length; i++) {

        if (area_designated === 'All area') {
            shops_all[i].style.display = 'block';
        } else if (area_designated != shops_area_designated[i].innerHTML) {
            shops_all[i].style.display = 'none';
        }
    }

    var shops_genre_designated = document.getElementsByClassName("for_serch_genre");

    for (let i = 0; i < shops_all.length; i++) {
        if (genre_designated === 'All genre') {

        } else if (genre_designated != shops_genre_designated[i].innerHTML) {
            shops_all[i].style.display = 'none';
        }
    }

    const shop_name = document.getElementsByClassName("for_serch_name");
    const shop_kana = document.getElementsByClassName("for_serch_kana");
    if (name_designated != "") {
        for (let i = 0; i < shops_all.length; i++) {
            console.log(name_designated);
            if (shop_name[i].innerHTML.indexOf(name_designated) === -1 && shop_kana[i].innerHTML.indexOf(name_designated)) {
                shops_all[i].style.display = 'none';
            }
        }
    }
}

area_keyword.addEventListener("change", fucn_serch);
genre_keyword.addEventListener("change", fucn_serch);
name_keyword.addEventListener("input", fucn_serch);

