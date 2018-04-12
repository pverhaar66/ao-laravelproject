var addToCartButton = document.getElementById('addToCart');


addToCartButton.setAttribute("onClick", "showAlert('added to cart', 1000)");
function showAlert(msg, duration) {

	var el = document.createElement("div");
	el.id="alertbox";
	el.innerHTML = msg;
	setTimeout(function () {
		el.parentNode.removeChild(el);
	}, duration);
	document.body.appendChild(el);

}