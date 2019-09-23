$(document).ready(function() {



    /*скрываем элементы услуг*/
    $(".vizov_sotrudnika").hide();
    $(".transport").hide();
    $(".stroitelstvo").hide();

    /* маски на input*/
    $(".telephone").mask("8(999)999-99-99");
    $(".rezerv_telephone").mask("8(999)999-99-99");
    $.mask.definitions['h'] = '[А-Я]';
    $(".dogovor").mask("99/99-99-9999h");

    /*анимация шапки*/
    $(".button_cab").mouseover(function() {
        $('#img').attr('src', '../img/icon_person_hover.png');
    });

    $(".button_cab").mouseleave(function() {
        $('#img').attr('src', '../img/icon_person.png');
    });
    /* календарь с минимальной датой - сегодня*/
    $('[type="date"].date_today').prop('min', function() {
        return new Date().toJSON().split('T')[0];
    });

    /*верхнее меню услуг*/
    $("#razgruzka_pogruzka").on("click", function() {
        $(".razgruzka_pogruzka").show();
        $(".vizov_sotrudnika").hide();
        $(".transport").hide();
        $(".stroitelstvo").hide();

        $("#razgruzka_pogruzka").addClass("active_li");
        $("#vizov_sotrudnika").removeClass("active_li");
        $("#transport").removeClass("active_li");
        $("#stroitelstvo").removeClass("active_li");
    });

    $("#vizov_sotrudnika").on("click", function() {
        $(".razgruzka_pogruzka").hide();
        $(".vizov_sotrudnika").show();
        $(".transport").hide();
        $(".stroitelstvo").hide();

        $("#razgruzka_pogruzka").removeClass("active_li");
        $("#vizov_sotrudnika").addClass("active_li");
        $("#transport").removeClass("active_li");
        $("#stroitelstvo").removeClass("active_li");
    });

    $("#transport").on("click", function() {
        $(".razgruzka_pogruzka").hide();
        $(".vizov_sotrudnika").hide();
        $(".transport").show();
        $(".stroitelstvo").hide();

        $("#razgruzka_pogruzka").removeClass("active_li");
        $("#vizov_sotrudnika").removeClass("active_li");
        $("#transport").addClass("active_li");
        $("#stroitelstvo").removeClass("active_li");
    });

    $("#stroitelstvo").on("click", function() {
        $(".razgruzka_pogruzka").hide();
        $(".vizov_sotrudnika").hide();
        $(".transport").hide();
        $(".stroitelstvo").show();

        $("#razgruzka_pogruzka").removeClass("active_li");
        $("#vizov_sotrudnika").removeClass("active_li");
        $("#transport").removeClass("active_li");
        $("#stroitelstvo").addClass("active_li");
    });

    $("#select_type").change(function () {


        if($("#select_type option:selected").text() == "ООО"){
            $("#ooo").show();
            $("#fam").hide();
            $("#im").hide();
            $("#ot").hide();
        } else {
            $("#ooo").hide();
            $("#fam").show();
            $("#im").show();
            $("#ot").show();
        }

    });


    $(".date_nach").on("change", function() {
        $(".date_okonch").attr({
            "min": $(".date_nach")         // values (or variables) here
        });
    });



        $("#popChart").hide();

    $('#otchet').on('click', function() {
        $(this).toggleClass('red').siblings('#popChart').slideToggle(0);
    });







   // $("#popChart").hide();

});

