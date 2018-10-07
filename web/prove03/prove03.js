var http;

function addToCart(add) {
	http = new XMLHttpRequest();

	var params = "add=" + add;

	http.open('POST', 'changeCart.php', true);
	http.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			alert("Added Item to cart");
		}
	}

	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send(params);
}

function removeFromCart(rem) {
	http = new XMLHttpRequest();

	var params = "rem=" + rem;

	http.open('POST', 'changeCart.php', true);
	http.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			alert("Removed Item From Cart");
		}
	}

	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send(params);
}