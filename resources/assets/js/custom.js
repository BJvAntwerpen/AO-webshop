var cartModule = (function(){
	var url, newUrl, productId;
	
	var init = (function() {//init function to add eventListeners to [input] when url has 'cart' in it
		if (location.href.includes('cart')) {
			var inputs = document.querySelectorAll('input[type=number]');
			for (var i = 0; i < inputs.length; i++) {
				console.log(inputs[i]);
				inputs[i].addEventListener('change', function(){
					createUrl(this);
				});
			}
		}
	})();

	var createUrl = function(input) {
		url = location.href;
		url = splitUrl(url);
		productId = getProductId(input);//string
		inputValue = getInputValue(input);//string

		newUrl = url[0] + '/';//set http:/

		for (var i = 1; i < (url.length - 1); i++) {// loop through url array and add to newUrl with a '/' (except 'cart')
			newUrl += url[i] + '/';
		}

		if (inputValue != 0) {
			newUrl += 'updateCart?product_id=' + productId + '&new_quantity=' + inputValue;
		} else {
			newUrl += 'deleteItem?product_id=' + productId;
		}

		setUrl(newUrl);
	};

	var splitUrl = function(url) {
		url = url.split('/');
		console.log(url);
		return url;
	};

	var setUrl = function(url) {
		console.log(url);
		location.href = url;
	};

	var getProductId = function(input) {
		var productId = input.className.substr(2,1);
		console.log(productId);
		return productId;
	};

	var getInputValue = function(input) {
		var inputValue = input.value;
		console.log(inputValue);
		return inputValue
	};

})();