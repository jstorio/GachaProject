document.addEventListener("DOMContentLoaded", function(event) {
	var jsCurrency;
    browser.storage.local.get("stash", items=> {
		jsCurrency = items.stash.stashCurrency;
		document.getElementById("Text").innerHTML = jsCurrency ;
	});


	
  });