var ajax;

function login() {
	ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function () {
		if (this.status = 200) {
			if (this.readyState = 4) {
				location.reload();
			}
		}
	}

	ajax.open("POST", "demo_post2.asp", true);
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send("user_name=" + document.getElementById("user_name"));
}