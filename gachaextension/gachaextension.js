//initial groundwork for js mozilla browser extension.

browser.storage.local.set({
	stash: {stashCurrency: 0}
	});

var localCurrency = 0;


function addCurrency() {
	localCurrency = localCurrency + 1;

	browser.storage.local.set({
		stash: {stashCurrency: localCurrency}
	});

	browser.storage.local.get("stash", items=> {
		console.log(items.stash.stashCurrency);
	});
}

function openPage() {
	browser.tabs.create({
		url: "popups/gachapopup.html"
});
}

//*****TRIGGERS/LISTENERS*****//
browser.browserAction.onClicked.addListener(openPage);

//triggers when navigating to another web page
browser.webNavigation.onBeforeNavigate.addListener(addCurrency);