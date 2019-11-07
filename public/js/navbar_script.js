$(document).ready(function() {

    var test = true;

    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        if (test) {
            document.getElementById('main').style.marginLeft = "-250px";
            document.getElementById('sidebarCollapse').style.marginLeft = "-250px";
            test = false;
        } else {
            document.getElementById('main').style.marginLeft = "0px";
            document.getElementById('sidebarCollapse').style.marginLeft = "0px";
            test = true;
        }
    });

});