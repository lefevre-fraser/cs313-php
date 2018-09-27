function ClickAlert () {
	"use strict";
	window.alert("Clicked!");
}

function ChangeColor () {
	"use strict";
	var color = document.getElementById("color").value;
	document.getElementById("top_div").style.color = color;
}

