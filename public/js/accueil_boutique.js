function contResponsive() {
    var element = document.getElementById("articles1");
    var element2 = document.getElementById("articles2");
    var element3 = document.getElementById("articles3");
    var element4 = document.getElementById("articles4");


    element.classList.remove("row");
    element.classList.remove("justify-content-between");
    element2.classList.remove("col-3");
    element3.classList.remove("col-3");
    element3.classList.remove("offset-1");
    element4.classList.remove("col-3");
    element4.classList.remove("offset-1");




}
function contResponsive1() {
    var element = document.getElementById("articles1");
    var element2 = document.getElementById("articles2");
    var element3 = document.getElementById("articles3");
    var element4 = document.getElementById("articles4");

    element.classList.add("row");
    element.classList.add("justify-content-between");
    element2.classList.add("col-3");
    element3.classList.add("col-3");
    element3.classList.add("offset-1");
    element4.classList.add("col-3");
    element4.classList.add("offset-1");



}
function aloneResp(){
    var element5 = document.getElementById("Alone");
    element5.classList.remove("col-4");
}
function aloneResp1(){
    var element5 = document.getElementById("Alone");
    element5.classList.add("col-4");
}
function boutique_resp1() {
    var i;
    var element = document.getElementsByClassName('bout_resp');
    for (i = 0; i< element.length; i++){
        element[i].classList.remove("row");
        element[i].classList.remove("justify-content-between");

    }


}
function boutique_resp_1() {
    var i;
    var element = document.getElementsByClassName('bout_resp');
    for (i = 0; i< element.length; i++){
        element[i].classList.add("row");
        element[i].classList.add("justify-content-between");
    }

}
function boutique_resp2(){
    var i;
    var element = document.getElementsByClassName('bout_resp1');
    for (i = 0; i <element.length; i++){
        element[i].classList.remove("col-2");
        element[i].classList.remove("mr-1");

    }

}
function boutique_resp_2(){
    var i;
    var element = document.getElementsByClassName('bout_resp1');
    for (i = 0; i <element.length; i++){
        element[i].classList.add("col-2");
        element[i].classList.add("mr-1");
    }

}
var win = window.innerWidth;

if (win < 1255){
    contResponsive();
    boutique_resp1();
    boutique_resp2();
}
if(win > 1255){
    contResponsive1();
    boutique_resp_1();
    boutique_resp_2();
}
if (win < 1055){
    aloneResp();
}
if (win > 1055){
    aloneResp1();
}
window.onresize = function (){
    var win2 = window.innerWidth;
    if (win2 < 1255){
        contResponsive();
        boutique_resp1();
        boutique_resp2();
    }
    if(win2 > 1255){
        contResponsive1();
        boutique_resp_1();
        boutique_resp_2();
    }
    if (win2 < 900){
        aloneResp();
    }
    if (win2 > 900){
        aloneResp1();
    }

}




