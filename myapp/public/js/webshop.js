var addToCartButton = document.getElementById('addToCart');
var amount = document.getElementById('amount');
var price = document.getElementById('price');

addToCartButton.setAttribute("onClick", "showAlert('added to cart', 2000)");
function showAlert(msg, duration) {

	var el = document.createElement("div");
	el.id="alertbox";
	el.innerHTML = msg;
	setTimeout(function () {
		el.parentNode.removeChild(el);
	}, duration);
	document.body.appendChild(el);
}

function currentAmountValue(){
	return amount.value();
}



