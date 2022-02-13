/**mypage**/
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

/*予約変更のコンファーム*/
const rese_change_forms = Array.from(document.getElementsByClassName("rese_change_form"));
rese_change_forms.forEach(function(target) {
  target.addEventListener("submit", function(e) {
    if (window.confirm("ご予約を変更してよろしいですか？")) {
      window.alert("ご予約を変更しました。")
    } else {
      e.preventDefault();
    }
  })
})

/*予約変更エリアの表示・非表示*/
const changes = Array.from(document.getElementsByClassName("change"));
changes.forEach(function(change) {
  change.addEventListener("click", function () {
    change.nextElementSibling.classList.toggle("display_block");
    change.firstChild.classList.toggle("display_block");
    change.lastChild.classList.toggle("display_block");
  })
})

/**shop_detail mypage**/
/*明日以降の日付のみ入力可*/
var tomorrow = new Date();
tomorrow.setDate(tomorrow.getDate() + 1);
var yyyy = tomorrow.getFullYear();
var mm = ("0" + (tomorrow.getMonth() + 1)).slice(-2);
var dd = ("0" + tomorrow.getDate()).slice(-2);
document.getElementById("date").min = yyyy + '-' + mm + '-' + dd;