//initial groundwork for js mozilla browser extension.

//placeholder for local currency
var currency = 0;

//adds currency for every triggered even
function addCurrency () {
	currency = currency + 1;
	window.alert(currency + " - Trigger: onDOMContentLoaded");
};

//*****TRIGGERS*****//

browser.webNavigation.onBeforeNavigate.addListener (addCurrency);
