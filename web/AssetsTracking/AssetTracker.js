function setActive(id) {
	document.getElementById(id).classList += " active";
}

function check(id) {
	document.getElementById(id).checked = true;
}

function confirmDelete() {
	return confirm("Are you sure you want to delete the selected items?");
}