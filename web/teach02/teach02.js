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
	    if ($("#bot_div").css('opacity') == 1) {
	    	$("#bot_div").animate({opacity: 0}, 2000);
	    }
    });
});