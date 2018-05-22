//initial groundwork for js mozilla browser extension.

//TESTING GIT 1

//placeholder for local currency
var currency = 0;
var fs = require('fs');

var jsonCurrencyCont = fs.readFileSync("currency.json");
var jsonCurrency = JSON.parse(jsonCurrencyCont);

function addCurrencyOnBeforeNavigate () {

	jsonCurrency.currency = jsonCurrency + 1;
	window.alert(jsonCurrency.currency + " - Trigger: webNavigation.onBeforeNavigate");
};

function addCurrencyOnCreatedNavigationTarget () {
	currency = currency + 1;
	window.alert(currency + " - Trigger: webNavigation.onCreatedNavigationTarget");
};

function openPage() {
	browser.tabs.create({
		url: "popups/gachapopup.html"
});
}

//*****TRIGGERS/LISTENERS*****//

browser.browserAction.onClicked.addListener(openPage);

//triggers when navigating to another web page
browser.webNavigation.onBeforeNavigate.addListener (addCurrencyOnBeforeNavigate);
//triggers when user opens a web page via new tab/new window (also triggers onBeforeNavigate)
browser.webNavigation.onCreatedNavigationTarget.addListener(addCurrencyOnCreatedNavigationTarget);

browser.webNavigation.onCommitted.addListener (addCurrencyOnBeforeNavigate);