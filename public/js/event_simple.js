
function event_responsive3() {
    var i;
    var element = document.getElementsByClassName('eve_resp3');
    for (i = 0; i <element.length; i++){
        element[i].classList.remove("desc_border");
        element[i].classList.add("desc_border2");


    }
}
function event_responsive_3() {
    var i;
    var element = document.getElementsByClassName('eve_resp3');
    for (i = 0; i <element.length; i++){
        element[i].classList.remove("desc_border2");
        element[i].classList.add("desc_border");


    }
}
function event_responsive1() {
    var i;
    var element = document.getElementsByClassName('eve_resp1');
    for (i = 0; i< element.length; i++){
        element[i].classList.remove("col-6");
        element[i].classList.add("col-12");
    }

}
function event_responsive_1() {
    var i;
    var element = document.getElementsByClassName('eve_resp1');
    for (i = 0; i< element.length; i++){
        element[i].classList.remove("col-12");
        element[i].classList.add("col-6");
    }

}

var win3 = window.innerWidth;

if (win3 < 1003){
    event_responsive1();

    event_responsive1();
}
if (win3 > 1003){
    event_responsive_1();

    event_responsive_1();
}
if (win3 < 470){

    event_responsive3();
}
if (win3 > 470){

    event_responsive_3();
}

window.onresize = function (){
    if (window.innerWidth < 1003){
        event_responsive1();

        event_responsive3();


    }
    if(window.innerWidth > 1003){
        event_responsive_1();

        event_responsive_3();

    }
}
