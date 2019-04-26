<?php
	function checkPostByState($state, $postCode) {
		$errMsg = "";
		$codeSplit = str_split($postCode, 1);
		if ($state == "vic") {
			if (($codeSplit[0] != "3")&&($codeSplit[0] != "8")) {
				$errMsg += "Postcode not valid for VIC\n";
			}
		}
		if ($state == "nsw") {
			if (($codeSplit[0] != "1")&&($codeSplit[0] != "2")) {
				$errMsg += "Postcode not valid for NSW\n";
			}
		}
		if ($state == "qld") {
			if (($codeSplit[0] != "4")&&($codeSplit[0] != "9")) {
				$errMsg += "Postcode not valid for QLD\n";
			}
		}
		if ($state == "nt") {
			if ($codeSplit[0] != "0") {
				$errMsg += "Postcode not valid for NT\n";
			}
		}
		if ($state == "wa") {
			if ($codeSplit[0] != "6") {
				$errMsg += "Postcode not valid for WA\n";
			}
		}
		if ($state == "sa") {
			if ($codeSplit[0] != "5") {
				$errMsg += "Postcode not valid for SA\n";
			}
		}
		if ($state == "tas") {
			if ($codeSplit[0] != "7") {
				$errMsg += "Postcode not valid for TAS\n";
			}
		}
		if ($state == "act") {
			if ($codeSplit[0] != "0") {
				$errMsg += "Postcode not valid for ACT\n";
			}
		}

		return $errMsg;
	}

	function afterNow($expiry) {
		$expirySplit = explode("-", $expiry);
		$date = explode("-20", date("m-Y"));
		$result = true;
		if ($expirySplit[1] < $date[1]) {
			$result =  false;
		} else if (($expirySplit[1] == $date[1])) {
			if (($expirySplit[0] < $date[0])) {
				$result =  false;
			}
		}
		return $result;
	}

	function checkCardNumberByType($cardNumber, $cardType) {
	$cardNumberSplit = str_split($cardNumber, 1);
	if (count($cardNumberSplit) == 16) {
		if ($cardType == "visa") {
			if ($cardNumberSplit[0] == "4") return true;
		} else if ($cardType == "mastercard") {
			if ((($cardNumberSplit[0] + $cardNumberSplit[1]) == "51")||(($cardNumberSplit[0] + $cardNumberSplit[1]) == "55")) return true;
		}
	} else if (count($cardNumberSplit) == 15) {
		if ($cardType == "americanExpress") {
			if ((($cardNumberSplit[0] + $cardNumberSplit[1]) == "34")||(($cardNumberSplit[0] + $cardNumberSplit[1]) == "37")) return true;
		}
	}
	return true;
	}

	function checkCVV($cardType, $cvv) {

		if (!preg_match("/^([0-9]{3,4})+$/", $cvv)) return false;
		if (strlen($cvv) == 3) {
			if (($cardType == "visa")||($cardType == "mastercard")) return true;
		} else if (strlen($cvv) == 4) {
			if ($cardType == "americanExpress") return true;
		}
		return false;
	}

	function calcCost($planType, $dataSize, $addFeatures, $quantity) {
		$cost = 0;
		if (strpos($addFeatures, "scambloc") != false) $cost += 150;
		if (strpos($addFeatures, "modem") != false) $cost += 450;
		if (strpos($addFeatures, "newsletter") != false) $cost += 85;
		$planCost = 0;
		if ($planType == "nbn") $planCost = 3;
		else if ($planType == "adsl") $planCost = 2;
		else $planCost = 1;
		$dataCost = 0;
		if ($dataSize == "10gb") $dataCost = 10;
		if ($dataSize == "50gb") $dataCost = 50;
		if ($dataSize == "100gb") $dataCost = 100;
		$cost += ($planCost * $dataCost);

		return $cost * $quantity;
	}

	require_once ("settings.php");	//connection info

	// Checks if connection is successful
	if (!$conn) {
		header('Location: enquire.php');
		echo "<p>Database connection failure</p>";
	} else if ($_POST["firstName"] == null) {
		header('Location: enquire.php');
	} else {
		$sql_table="orders";
		if (isset($_POST["cardType"])) $cardType = trim(htmlspecialchars($_POST["cardType"]));
		if (isset($_POST["cardName"])) $cardName = trim(htmlspecialchars($_POST["cardName"]));
		if (isset($_POST["cardNumber"])) $cardNumber = trim(htmlspecialchars($_POST["cardNumber"]));
		if (isset($_POST["expiry"])) $expiry = trim(htmlspecialchars($_POST["expiry"]));
		if (isset($_POST["cvv"])) $cvv = trim(htmlspecialchars($_POST["cvv"]));
		if (isset($_POST["firstName"])) $firstName = trim(htmlspecialchars($_POST["firstName"]));
		if (isset($_POST["lastName"])) $lastName = trim(htmlspecialchars($_POST["lastName"]));
		if (isset($_POST["email"])) $email = trim(htmlspecialchars($_POST["email"]));
		if (isset($_POST["phone"])) $phone = trim(htmlspecialchars($_POST["phone"]));
		if (isset($_POST["street"])) $street = trim(htmlspecialchars($_POST["street"]));
		if (isset($_POST["suburb"])) $suburb = trim(htmlspecialchars($_POST["suburb"]));
		if (isset($_POST["state"])) $state = trim(htmlspecialchars($_POST["state"]));
		if (isset($_POST["postCode"])) $postCode = trim(htmlspecialchars($_POST["postCode"]));
		if (isset($_POST["prefContact"])) $prefContact = trim(htmlspecialchars($_POST["prefContact"]));
		if (isset($_POST["planType"])) $planType = trim(htmlspecialchars($_POST["planType"]));
		if (isset($_POST["quantity"])) $quantity = trim(htmlspecialchars($_POST["quantity"]));
		if (isset($_POST["dataSize"])) $dataSize = trim(htmlspecialchars($_POST["dataSize"]));
		if (isset($_POST["addFeatures"])) {
			$addFeatures = trim(htmlspecialchars($_POST["addFeatures"]));
		}
		if (isset($_POST["cost"])) $cost = trim(htmlspecialchars($_POST["cost"]));
		if (isset($_POST["cardType"])) $cardType = trim(htmlspecialchars($_POST["cardType"]));
		if (isset($_POST["cardName"])) $cardName = trim(htmlspecialchars($_POST["cardName"]));
		if (isset($_POST["cardNumber"])) $cardNumber = trim(htmlspecialchars($_POST["cardNumber"]));
		if (isset($_POST["expiry"])) $expiry = trim(htmlspecialchars($_POST["expiry"]));
		if (isset($_POST["cvv"])) $cvv = trim(htmlspecialchars($_POST["cvv"]));

		$error = false;
		if (!preg_match("/^([a-zA-Z\-]{1,25})$/", $firstName)) {
			$firstNameError = "<p>Your first name is required and must contain alpha characters or hyphens only</p>";
			$error = true;
		}
		if (!preg_match("/^([a-zA-Z\-]{1,25})$/", $lastName)) {
			$lastNameError = "<p>Your last name is required and must contain alpha characters or hyphens only</p>";
			$error = true;
		}
		if (!preg_match("/^[a-zA-Z\-\@\.]{1,25}$/", $email)) {
			$emailError = "<p>You must provide a valid email</p>";
			$error = true;
		}
		if (!preg_match("/^([0-9]{6,10})+$/", $phone)) {
			$phoneError = "<p>You must provide a valid phone number</p>";
			$error = true;
		}
		if (!preg_match("/.{1,40}/", $street)) {
			$streetError = "<p>You must provide a valid street address</p>";
			$error = true;
		}
		if (!preg_match("/.{1,20}/", $suburb)) {
			$suburbError = "<p>You must provide a valid suburb</p>";
			$error = true;
		}
		if ($state == "") {
			$stateError = "<p>You must select a state</p>";
			$error = true;
		}
		if (!preg_match("/.{4}/", $postCode)) {
			$postCodeError = "<p>You must select a plan type</p>";
			$error = true;
		}
		if (checkPostByState($state, $postCode) != "") {
			$postCodeError .= checkPostByState($state, $postCode);
			$error = true;
		}
		if ($planType == "") {
			$planTypeError = "<p>You must select a plan type</p>";
			$error = true;
		}
		if (!preg_match("/^([0-9]{1,2})+$/", $quantity)) {
			$quantityError = "<p>You must provide a valid quantity</p>";
			$error = true;
		}
		if (!preg_match("/^([a-zA-Z\s]{1,40})+$/", $cardName)) {
			$cardNameError = "<p>You must provide a valid cardName</p>";
			$error = true;
		}
		if (!preg_match("/^([0-9]{15,16})+$/", $cardNumber)) {
			$cardNumberError = "<p>You must provide a valid cardNumber</p>";
			$error = true;
		}
		if (!preg_match("/^(1[0-2]|0[1-9])-([0-9]?[0-9])$/", $expiry)) {
			$expiryError = "<p>You must provide a valid date using the format provided</p>";
			$error = true;
		} elseif (!afterNow($expiry)) {
			$expiryError .= "<p>You must provide a date that hasn't expired</p>";
			$error = true;
		}
		if (!checkCardNumberByType($cardNumber, $cardType)) {
			$cardNumberError = "<p>Your credit card number is not valid according to your card type</p>";
			$error = true;
		}
		if (!checkCVV($cardType, $cvv)) {
			$cvvError = "<p>Your CVV is not valid according to your card type</p>";
			$error = true;
		}

		if ($error == true) {
			header('Location: fix_order.php?debug=debug'
				.'&firstName='.$firstName
				.'&firstNameError='.$firstNameError
				.'&lastName='.$lastName
				.'&lastNameError='.$lastNameError
				.'&email='.$email
				.'&emailError='.$emailError
				.'&phone='.$phone
				.'&phoneError='.$phoneError
				.'&street='.$street
				.'&streetError='.$streetError
				.'&suburb='.$suburb
				.'&suburbError='.$suburbError
				.'&state='.$state
				.'&stateError='.$stateError
				.'&postCode='.$postCode
				.'&postCodeError='.$postCodeError
				.'&prefContact='.$prefContact
				.'&planType='.$planType
				.'&planTypeError='.$planTypeError
				.'&quantity='.$quantity
				.'&quantityError='.$quantityError
				.'&dataSize='.$dataSize
				.'&extras='.$addFeatures
				.'&cardNameError='.$cardNameError
				.'&cardNumberError='.$cardNumberError
				.'&expiryError='.$expiryError
				.'&cvvError='.$cvvError
				);
		} else {
			$cost = calcCost($planType, $dataSize, $addFeatures, $quantity);
			//Set up the SQl command to query or add data into the table
			$status = "PENDING";
			$time = date("Y-m-d h:i:sa");
			$query = "INSERT INTO $sql_table (order_cost, order_time, order_status) VALUES ('$cost', '$time', '$status')";
			
			mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS 'orders';");

			//execute the query and store result into the result pointer
			$result = mysqli_query($conn, $query);
			$orderId = mysqli_insert_id($conn);
			//checks if the execution was successful
			if(!$result) {
				header('Location: enquire.php');
				echo "<p>Something is wrong with ", $query, "</p>";
			} else {
				header('Location: receipt.php?'
				.'&firstName='.$firstName
				.'&lastName='.$lastName
				.'&email='.$email
				.'&phone='.$phone
				.'&street='.$street
				.'&suburb='.$suburb
				.'&state='.$state
				.'&postCode='.$postCode
				.'&prefContact='.$prefContact
				.'&planType='.$planType
				.'&quantity='.$quantity
				.'&dataSize='.$dataSize
				.'&extras='.$addFeatures
				.'&cost='.$cost
				.'&status='.$status
				.'&time='.$time
				.'&orderId='.$orderId
				);
			//close the database connection
			mysqli_close($conn);
			}
			
			
		}
	}
?>