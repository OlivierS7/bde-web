function panier_resp1() {
    var i;
    var element = document.getElementsByClassName('pan_resp');
    for (i = 0; i< element.length; i++){
        element[i].classList.remove("row");
        element[i].classList.remove("justify-content-between");

    }


}
function panier_resp_1() {
    var i;
    var element = document.getElementsByClassName('pan_resp');
    for (i = 0; i< element.length; i++){
        element[i].classList.add("row");
        element[i].classList.add("justify-content-between");
    }

}
function panier_resp2(){
    var i;
    var element = document.getElementsByClassName('pan_resp1');
    for (i = 0; i <element.length; i++){
        element[i].classList.remove("col-2");
        element[i].classList.remove("mr-1");

    }

}
function panier_resp_2() {
    var i;
    var element = document.getElementsByClassName('pan_resp1');
    for (i = 0; i < element.length; i++) {
        element[i].classList.add("col-2");
        element[i].classList.add("mr-1");
    }

    var win = window.innerWidth;

    if (win < 1255) {
        panier_resp1();
        panier_resp2();
    }
    if (win > 1255) {

        panier_resp_1();
        panier_resp_2();
    }
}
    window.onresize = function () {
        var win2 = window.innerWidth;
        if (win2 < 1255) {

            panier_resp1();
            panier_resp2();
        }
        if (win2 > 1255) {
            panier_resp_1();
            panier_resp_2();
        }
    }
