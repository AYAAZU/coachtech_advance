
/*入力値を下段に反映*/
var date = document.getElementById("date");
var copydate = document.getElementById("copydate");
date.addEventListener("change", function() {
copydate.innerHTML= date.value;
  })

var time = document.getElementById("time");
var copytime = document.getElementById("copytime");
time.addEventListener("change", function() {
copytime.innerHTML= time.value;
})
  
var number = document.getElementById("number");
var copynumber = document.getElementById("copynumber");
number.addEventListener("change", function() {
copynumber.innerHTML= number.value;
})
  
/**shop_detail, mypage 共通**/
/*明日以降の日付のみ入力可*/
var tomorrow = new Date();
tomorrow.setDate(tomorrow.getDate() + 1);
var yyyy = tomorrow.getFullYear();
var mm = ("0" + (tomorrow.getMonth() + 1)).slice(-2);
var dd = ("0" + tomorrow.getDate()).slice(-2);
document.getElementById("date").min = yyyy + '-' + mm + '-' + dd;