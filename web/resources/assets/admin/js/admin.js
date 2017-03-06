var toast = new Toast();
var notify = new Notify();
var errors = [];

$(document).ready(function() {

    $('.sidebar-menu > li > a[href="' + window.location.pathname + '"]').parent().addClass('active');
    $('.sidebar-menu > li > ul > li > a[href="' + window.location.pathname + '"]').parent().addClass('active').parent().show().parent().addClass('active');

    $('.checkboxBlue').iCheck({checkboxClass: 'icheckbox_flat-blue', radioClass: 'iradio_flat-blue'});

    setErrorToasts(document.querySelectorAll('select.request-errors'));

});