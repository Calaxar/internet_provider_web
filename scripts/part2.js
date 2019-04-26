/**
* Author: Calum - 100598217
* Target: {enquire.html, payment.html}
* Purpose: 
* Created: 25/04/2017
* Last Updated: 25/04/2017
* Credits: 'Creating Web Applications Assignment Part 2 PDF'
*/

"use strict";	//prevents creation of global variables in functions

function storeEnquire(firstName, lastName, email, phone, street, suburb, state, postCode, prefContact, planType, quantity, dataSize, debug) {
	var scambloc = document.getElementById("scambloc").checked;
	var modem = document.getElementById("modem").checked;
	var newsletter = document.getElementById("newsletter").checked;

	var addFeatures = "";
	if(scambloc) addFeatures += "scambloc";
	if(scambloc&&modem) addFeatures += ", ";
	if(modem) addFeatures += "modem";
	if((modem&&newsletter)||(scambloc&&newsletter)) addFeatures += ", ";
	if(newsletter) addFeatures += "newsletter";
	sessionStorage.addFeatures = addFeatures;
	sessionStorage.firstName = firstName;
	sessionStorage.lastName = lastName;
	sessionStorage.email = email;
	sessionStorage.phone = phone;
	sessionStorage.street = street;
	sessionStorage.suburb = suburb;
	sessionStorage.state = state;
	sessionStorage.postCode = postCode;
	sessionStorage.prefContact = prefContact;
	sessionStorage.planType = planType;
	sessionStorage.quantity = quantity;
	sessionStorage.dataSize = dataSize;
	if(debug) sessionStorage.debug = "debug";
}

function checkPostByState(state, postCode) {
	var errMsg = "";
	var codeSplit = postCode.split("");
	if (state == "vic") {
		if ((codeSplit[0] != "3")&&(codeSplit[0] != "8")) {
			errMsg += "Postcode not valid for VIC\n";
		}
	}
	if (state == "nsw") {
		if ((codeSplit[0] != "1")&&(codeSplit[0] != "2")) {
			errMsg += "Postcode not valid for NSW\n";
		}
	}
	if (state == "qld") {
		if ((codeSplit[0] != "4")&&(codeSplit[0] != "9")) {
			errMsg += "Postcode not valid for QLD\n";
		}
	}
	if (state == "nt") {
		if (codeSplit[0] != "0") {
			errMsg += "Postcode not valid for NT\n";
		}
	}
	if (state == "wa") {
		if (codeSplit[0] != "6") {
			errMsg += "Postcode not valid for WA\n";
		}
	}
	if (state == "sa") {
		if (codeSplit[0] != "5") {
			errMsg += "Postcode not valid for SA\n";
		}
	}
	if (state == "tas") {
		if (codeSplit[0] != "7") {
			errMsg += "Postcode not valid for TAS\n";
		}
	}
	if (state == "act") {
		if (codeSplit[0] != "0") {
			errMsg += "Postcode not valid for ACT\n";
		}
	}

	return errMsg;
}

function getDataSize() {
	var dataSize = "Unknown";

	var dataArray = document.getElementById("data").getElementsByTagName("input");

	for (var i = 0; i < dataArray.length; i++) {
		if (dataArray[i].checked) {
			dataSize = dataArray[i].value;
		}
	}

	return dataSize;
}

function getPrefContact() {
	var prefContact = "Unknown";

	var contactArray = document.getElementById("prefContact").getElementsByTagName("input");

	for (var i = 0; i < contactArray.length; i++) {
		if (contactArray[i].checked) {
			prefContact = contactArray[i].value;
		}
	}

	return prefContact;
}

function validateEnquire() {
	var errMsg = "";
	var result = true;

	var debug = document.getElementById("debug").checked;

	var firstName = document.getElementById("firstName").value;
	var lastName = document.getElementById("lastName").value;
	var email = document.getElementById("email").value;
	var phone = document.getElementById("phone").value;
	var street = document.getElementById("street").value;
	var suburb = document.getElementById("suburb").value;
	var state = document.getElementById("state").value;
	var postCode = document.getElementById("postCode").value;
	var planType = document.getElementById("planType").value;
	var quantity = document.getElementById("quantity").value;

	if (!debug) {
		if (!firstName.match(/^([a-zA-Z\-]{1,25})+$/)) {
			errMsg = errMsg + "Your first name is required and must contain alpha characters or hyphens only\n";
			result = false;
		}

		if (!lastName.match(/^([a-zA-Z\-]{1,25})+$/)) {
			errMsg = errMsg + "Your last name is required and must contain alpha characters or hyphens only\n";
			result = false;
		}

		if (!email.match(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
			errMsg += "You must provide a valid email\n";
			result = false;
		}

		if (!phone.match(/^([0-9]{6,10})+$/)) {
			errMsg += "You must provide a valid phone number\n";
			result = false;
		}

		if (!street.match(/.{1,40}/)) {
			errMsg += "You must provide a valid street address\n";
			result = false;
		}

		if (!suburb.match(/.{1,20}/)) {
			errMsg += "You must provide a valid suburb\n";
			result = false;
		}

		if (state == "") {
			errMsg += "You must select a state\n";
			result = false;
		}

		if (!postCode.match(/.{4}/)) {
			errMsg += "You must provide a valid postcode\n";
			result = false;
		}

		if (checkPostByState(state, postCode) != "") {
			errMsg += checkPostByState(state, postCode);
			result = false;
		}

		if (getPrefContact == "Unknown") {
			errMsg += "Please select a preferred contact method\n";
			result = false;
		}

		if (planType == "") {
			errMsg += "You must select a plan type\n";
			result = false;
		}

		if (!quantity.match(/^([0-9]{1,2})+$/)) {
			errMsg += "You must provide a valid quantity\n";
			result = false;
		}

		if (getDataSize == "Unknown") {
			errMsg += "You must select a data size\n";
			result = false;
		}

		if (errMsg != "") {		//only display message box if there is something to show
			alert(errMsg);
		}
	}

	if (result) {
		storeEnquire(firstName, lastName, email, phone, street, suburb, state, postCode, getPrefContact(), planType, quantity, getDataSize(), debug);
	}

	return result;
}

function calcCost(planType, dataSize, addFeatures, quantity) {
	var cost = 0;
	if (addFeatures.search("scambloc") != -1) cost += 150;
	if (addFeatures.search("modem") != -1) cost += 450;
	if (addFeatures.search("newsletter") != -1) cost += 85;
	var planCost = 0;
	if (planType == "nbn") planCost = 3;
	else if (planType == "adsl") planCost = 2;
	else planCost = 1;
	var dataCost = 0;
	if (dataSize == "10gb") dataCost = 10;
	if (dataSize == "50gb") dataCost = 50;
	if (dataSize == "100gb") dataCost = 100;
	cost += (planCost * dataCost);

	return cost * quantity;
}

function getAddress() {
	return (sessionStorage.street + ", " + sessionStorage.suburb + " " + sessionStorage.state + " " +  sessionStorage.postCode);
}

function getEnquiry() {
	var cost = 0;
	if(sessionStorage.firstName != undefined) {
		//confirmation text
		document.getElementById("confirm_name").textContent = sessionStorage.firstName + " " + sessionStorage.lastName;
		document.getElementById("confirm_email").textContent = sessionStorage.email;
		document.getElementById("confirm_phone").textContent = sessionStorage.phone;
		document.getElementById("confirm_address").textContent = getAddress();
		document.getElementById("confirm_prefContact").textContent = sessionStorage.prefContact;
		document.getElementById("confirm_planType").textContent = sessionStorage.planType;
		document.getElementById("confirm_quantity").textContent = sessionStorage.quantity;
		document.getElementById("confirm_dataSize").textContent = sessionStorage.dataSize;
		document.getElementById("confirm_addFeatures").textContent = sessionStorage.addFeatures;
		cost = calcCost(sessionStorage.planType, sessionStorage.dataSize, sessionStorage.addFeatures, sessionStorage.quantity);
		document.getElementById("confirm_cost").textContent = cost;
		//fill hidden fields
		document.getElementById("firstName").value = sessionStorage.firstName;
		document.getElementById("lastName").value = sessionStorage.lastName;
		document.getElementById("email").value = sessionStorage.email;
		document.getElementById("phone").value = sessionStorage.phone;
		document.getElementById("street").value = sessionStorage.street;
		document.getElementById("suburb").value = sessionStorage.suburb;
		document.getElementById("state").value = sessionStorage.state;
		document.getElementById("postCode").value = sessionStorage.postCode;
		document.getElementById("prefContact").value = sessionStorage.prefContact;
		document.getElementById("planType").value = sessionStorage.planType;
		document.getElementById("quantity").value = sessionStorage.quantity;
		document.getElementById("dataSize").value = sessionStorage.dataSize;
		document.getElementById("addFeatures").value = sessionStorage.addFeatures;
		document.getElementById("cost").value = cost;
		document.getElementById("debug").value = sessionStorage.debug;
	}
}

function getCardType() {
	var cardType = "Unknown";

	var cardTypeArray = document.getElementById("cardType").getElementsByTagName("input");

	for (var i = 0; i < cardTypeArray.length; i++) {
		if (cardTypeArray[i].checked) {
			cardType = cardTypeArray[i].value;
		}
	}

	return cardType;
}

function afterNow(expiry) {
	var expirySplit = expiry.split("-");
	var date = new Date();
	var result = true;
	if (!expiry.match(/^(1[0-2]|0[1-9])-([0-9]?[0-9])$/)) {
		result =  false;
	} else if (expirySplit[1] < (date.getFullYear() - 2000)) {
		result =  false;
	} else if (expirySplit[1] == (date.getFullYear() - 2000)) {
		if (expirySplit[0] < (date.getMonth() + 1)) {
			result =  false;
		}
	}
	return result;
}

function checkCardNumberByType(cardNumber, cardType) {
	var cardNumberSplit = cardNumber.split("");
	if (cardNumber.length == 16) {
		if (cardType == "visa") {
			if (cardNumberSplit[0] == "4") return true;
		} else if (cardType == "mastercard") {
			if (((cardNumberSplit[0] + cardNumberSplit[1]) == "51")||((cardNumberSplit[0] + cardNumberSplit[1]) == "55")) return true;
		}
	} else if (cardNumber.length == 15) {
		if (cardType == "americanExpress") {
			if (((cardNumberSplit[0] + cardNumberSplit[1]) == "34")||((cardNumberSplit[0] + cardNumberSplit[1]) == "37")) return true;
		}
	}
	return false;
}

function checkCVV(cardType, cvv) {

	if (!cvv.match(/^([0-9]{3,4})+$/)) return false;
	if (cvv.length == 3) {
		if ((cardType == "visa")||(cardType == "mastercard")) return true;
	} else if (cvv.length == 4) {
		if (cardType == "americanExpress") return true;
	}
	return false
}

function validatePayment() {
	var errMsg = "";
	var result = true;

	var cardType = getCardType;
	var cardName = document.getElementById("cardName").value;
	var cardNumber = document.getElementById("cardNumber").value;
	var expiry = document.getElementById("expiry").value;
	var cvv = document.getElementById("cvv").value;

	var debug = document.getElementById("debug").value;

	if (debug != "debug") {
		if (getCardType == "Unknown") {
		errMsg += "Please select a card type\n";
		result = false;
		}

		if (!cardName.match(/^([a-zA-Z\s]{1,40})+$/)) {
			errMsg += "You must provide a card name, using only alpha characters or spaces\n";
			result = false;
		}

		if (!cardNumber.match(/^([0-9]{15,16})+$/)) {
			errMsg += "You must provide a card number, consisting of 15 or 16 digits\n";
			result = false;
		}

		if ((!expiry.match(/^(1[0-2]|0[1-9])-([0-9]?[0-9])$/))||(!afterNow(expiry))) {
			errMsg += "You must provide a valid, current expiry date using the format provided\n";
			result = false;
		}

		if (!checkCardNumberByType(cardNumber, getCardType())) {
			errMsg += "Your credit card number is not valid according to your card type\n";
			result = false;
		}

		if (!checkCVV(getCardType(), cvv)) {
			errMsg += "Your CVV is not valid according to your card type\n";
			result = false;
		}

		if (errMsg != "") {		//only display message box if there is something to show
			alert(errMsg);
		}
	}
	
	return result;
}

function cancelPayment() {
	sessionStorage.clear();
	window.location = "enquire.html";
}

function init() {
	var enquireForm = document.getElementById("enquireForm");
	var paymentForm = document.getElementById("paymentForm");

	if (enquireForm != null) {
		enquireForm.onsubmit = validateEnquire; //register the event listener
	} else {
		getEnquiry();
		document.getElementById("cancelButton").onclick = cancelPayment;
		paymentForm.onsubmit = validatePayment;
	}
}

window.onload = init;