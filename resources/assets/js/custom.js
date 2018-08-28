var cartModule = (function(){
	var url, newUrl, productId, price, totalPrice, totalCount, inputs;

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

	var getTotalPrice = function() {
		var prices = document.querySelectorAll('div.totalPrice');
		price = [];
		for (var i = 0; i < prices.length; i++) {
			price[i] = prices[i].innerHTML.split('€');
			price[i] = Number(price[i][1]);
		}
		totalPrice = 0;
		for (i = 0; i < price.length; i++) {
			totalPrice += price[i];
		}
		totalPrice = Number(totalPrice.toFixed(2));
		document.getElementById('totalPrice').innerHTML += totalPrice;
	};

	var getTotalCount = function(inputs) {
		totalCount = 0;
		for (var i = 0; i < inputs.length; i++) {
			totalCount += Number(inputs[i].value);
		}
		document.getElementById('totalItems').innerHTML = totalCount;
	};

	var init = (function() {//init function to add eventListeners to [input] when url has 'cart' in it and run some other things
		inputs = document.querySelectorAll('input[type=number]');
		if (location.href.includes('cart') && inputs.length != 0) {
			for (var i = 0; i < inputs.length; i++) {
				inputs[i].addEventListener('change', function(){
					createUrl(this);
				});
			}
			getTotalPrice();
			getTotalCount(inputs);
		} else if (location.href.includes('orderDetails')) {
			getTotalPrice();
			totalCount = 0;
			inputs = document.querySelectorAll('div.count');
			for (var i = 0; i < inputs.length; i++) {
				totalCount += Number(inputs[i].innerHTML);
			}
			document.getElementById('totalItems').innerHTML = totalCount;
		}
	})();

})();