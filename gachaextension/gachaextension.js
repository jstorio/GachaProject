//initial groundwork for js mozilla browser extension.

var currency = 0;

function addCurrency () {
	currency = currency + 1;
	window.alert(currency);
};

browser.webNavigation.onCompleted.addListener (addCurrency);
browser.webRequest.onBeforeRequest.addListener (addCurrency);
