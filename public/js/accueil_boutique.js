
function contResponsive() {

    var element = document.getElementById("articles1");
       element.classList.remove("alone_border");

}
function contResponsive1() {

    var element = document.getElementById("articles1");
    element.classList.add("alone_border");

}
window.onresize = function (){
    var win = window.innerWidth;
    if (win < 768){
        contResponsive();
    }
    if(win > 768){
        contResponsive1();
    }
}


