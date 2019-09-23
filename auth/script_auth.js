$(document).ready(function() {

    $.mask.definitions['h'] = '[А-Я]';
    $(".login").mask("99/99-99-9999h");

    $(".button_cab").mouseover(function() {
        $('#img').attr('src', '../img/icon_person_hover.png');
    });

    $(".button_cab").mouseleave(function() {
        $('#img').attr('src', '../img/icon_person.png');
    });

});