/**mypage**/

/*レビュー投稿欄の表示・非表示*/
const reviews = Array.from(document.getElementsByClassName("review"));
reviews.forEach(function(target) {
  target.addEventListener("click", function () {
    target.nextElementSibling.classList.toggle("display_block");
  } )
})


/*予約削除のコンファーム*/
const rese_del_forms = Array.from(document.getElementsByClassName("rese_del_form"));
rese_del_forms.forEach(function(target) {
  target.addEventListener("submit", function(e) {
    if (window.confirm("ご予約を削除してよろしいですか？")) {
      window.alert("ご予約を削除しました。")
    } else {
      e.preventDefault();
    }
  })
})

/*予約変更エリアの表示・非表示*/
const changes = Array.from(document.getElementsByClassName("change"));
changes.forEach(function(target) {
  target.addEventListener("click", function () {
    /*エリア全体の表示・非表示*/
    target.nextElementSibling.classList.toggle("display_block");
    /*ボタン表示内容の変更*/
    target.firstChild.classList.toggle("display_block");
    target.firstChild.classList.toggle("display_none");
    target.lastChild.classList.toggle("display_block");
  } )
})

/**shop_detail mypage**/
/*明日以降の日付のみ入力可*/
var tomorrow = new Date();
tomorrow.setDate(tomorrow.getDate() + 1);
var yyyy = tomorrow.getFullYear();
var mm = ("0" + (tomorrow.getMonth() + 1)).slice(-2);
var dd = ("0" + tomorrow.getDate()).slice(-2);
document.getElementById("date").min = yyyy + '-' + mm + '-' + dd;