function ClickAlert () {
	"use strict";
	window.alert("Clicked!");
}

function ChangeColor () {
	"use strict";
	var color = document.getElementById("color").value;
	document.getElementById("top_div").style.color = color;
}

$(document).ready(function () {
    $("#color_button").click(function() {
        var color = $("#color").val();
        $("#top_div").css('backgroundColor', color);
    });

    $("#hide_show").click(function() {
        $("#bot_div").fadeToggle(2000, "swing", function() {
            //finished toggle
        });
    });
});