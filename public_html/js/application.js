$(document).ready(function () {
    //AjaxLoading
    $('#loading-mask')
        .ajaxStart(function () {
            $(this).fadeIn()
        })
        .ajaxStop(function () {
            $(this).fadeOut()
        })
});