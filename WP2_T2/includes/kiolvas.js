function nemzeti_parkok() {

    $.post(
        "../includes/kiolvas.inc.php",
        {"op": "parkok"},
        function (data) {
            //$("#parkselect").html('<option value="0">Válasszon ...</option>');
            $("<option>").val("0").text("Válasszon ...").appendTo("#parkselect");

            var lista = data.lista;
            for (i = 0; i < lista.length; i++)
                //$("#orszagselect").append('<option value="'+lista[i].id+'">'+lista[i].nev+'</option>');
                $("<option>").val(lista[i].id).text(lista[i].nev).appendTo("#parkselect");
        },
        "json"
    );
}

function varosok() {
    $("#varosselect").html("");
    $("#utselect").html("");
    $(".adat").html("");
    var parkid = $("#parkselect").val();

    if (parkid != 0) {
        $.post(
            "../includes/kiolvas.inc.php",
            {"op": "varos", "id": parkid},
            function (data) {

                $("#varosselect").html('<option value="0">Válasszon ...</option>');
                var lista = data.lista;
                for (i = 0; i < lista.length; i++)
                    $("#varosselect").append('<option value="' + lista[i].id + '">' + lista[i].nev + '</option>');
            },
            "json"
        );
    }
}

function utak() {
    $("#utselect").html("");
    $(".adat").html("");
    var varosid = $("#varosselect").val();
    if (varosid != 0) {
        $.post(
            "../includes/kiolvas.inc.php",
            {"op": "ut", "id": varosid},
            function (data) {
                $("#utselect").html('<option value="0">Válasszon ...</option>');
                var lista = data.lista;
                for (i = 0; i < lista.length; i++)
                    $("#utselect").append('<option value="' + lista[i].id + '">' + lista[i].nev + '</option>');
            },
            "json"
        );
    }
}

function ut() {
    $(".adat").html("");
    var utid = $("#utselect").val();
    if (utid != 0) {
        $.post(
            "../includes/kiolvas.inc.php",
            {"op": "info", "id": utid},
            function (data) {
                $("#nev").text(data.nev);
                $("#hossz").text(data.hossz);
                $("#allomas").text(data.allomas);
                $("#ido").text(data.ido);
                if (data.vezetes === 0) {
                    $("#vezetes").text("Nincs");
                }
                if (data.vezetes !== 0) {
                    $("#vezetes").text("Van");
                }

            },
            "json"
        );
    }
}

$(document).ready(function () {
    nemzeti_parkok();

    $("#parkselect").change(varosok);
    $("#varosselect").change(utak);
    $("#utselect").change(ut);

    $(".adat").hover(function () {
        $(this).css({"color": "white", "background-color": "black"});
    }, function () {
        $(this).css({"color": "black", "background-color": "white"});
    });
});