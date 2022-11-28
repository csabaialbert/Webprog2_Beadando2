//import {Chart} from 'chart.js/auto'

$(function () {
    getAllParks();
});

function getAllParks() {
    $.post(
        "../includes/kiolvas.inc.php",
        {"op": "fullinfo"},
        function (data) {
            alert( "Data Loaded: " + data );
        },
        "json"
    );
}