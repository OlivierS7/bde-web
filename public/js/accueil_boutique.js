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
window.onresize = function (){

    var win2 = window.innerWidth;
    if (win2 < 1255){
        contResponsive();
    }
    if(win2 > 1255){
        contResponsive1();
    }
    if (win2 < 1055){
        aloneResp();
    }
    if (win2 > 1055){
        aloneResp1();
    }
}



