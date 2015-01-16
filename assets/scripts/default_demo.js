$(function () {
    "use strict";

    $('#back-button').click(function () {
        window.history.back();
    });
    $('#javascript-content').show();

    $('.button, .nav-button').button();
});
