//initial groundwork for js mozilla browser extension.

//placeholder for local currency
var currency = 0;

function addCurrencyOnBeforeNavigate () {
	currency = currency + 1;
	window.alert(currency + " - Trigger: webNavigation.onBeforeNavigate");
};

function addCurrencyOnCreatedNavigationTarget () {
	currency = currency + 1;
	window.alert(currency + " - Trigger: webNavigation.onCreatedNavigationTarget");
};

//*****TRIGGERS/LISTENERS*****//

//triggers when navigating to another web page
browser.webNavigation.onBeforeNavigate.addListener (addCurrencyOnBeforeNavigate);
//triggers when user opens a web page via new tab/new window (also triggers onBeforeNavigate)
browser.webNavigation.onCreatedNavigationTarget.addListener(addCurrencyOnCreatedNavigationTarget);
