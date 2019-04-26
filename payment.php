<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Payment page of assignment website" />
	<meta name="keywords" content="HTML5, CSS, assignment, internet, access, plan" />
	<meta name="author" content="Calum Hay"  />
	<title> jjNet - Payment</title>
	<link href="styles/style.css" rel="stylesheet"/>
	<script src="scripts/part2.js"></script>
</head>
<body id="paymentBody">
	
	<div class="pageBody">
		<?php
		include 'include/menu.inc';
		?>
		
		
		<div class="content">
			<form id="paymentForm" method="post" action="process_order.php" novalidate="novalidate">
				<fieldset class="formBlock">
					<legend>Your Details:</legend>
					<p>Name: <span id="confirm_name"></span></p>
					<p>Email: <span id="confirm_email"></span></p>
					<p>Phone: <span id="confirm_phone"></span></p>
					<p>Address: <span id="confirm_address"></span></p>
					<p>Preferred Contact: <span id="confirm_prefContact"></span></p>
				</fieldset>
				<fieldset class="formBlock">
					<legend>Product Details:</legend>
					<p>Plan: <span id="confirm_planType"></span></p>
					<p>Quantity: <span id="confirm_quantity"></span></p>
					<p>Data Size: <span id="confirm_dataSize"></span></p>
					<p>Additional Features: <span id="confirm_addFeatures"></span></p>
					<p>Cost: $<span id="confirm_cost"></span></p>
				</fieldset>
				<fieldset class="formBlock">
					<legend>Payment Method:</legend>
					<p id="cardType">
						<label><input type="radio" name="cardType" value="visa" checked="checked"/>Visa</label>
						<label><input type="radio" name="cardType" value="mastercard"/>Mastercard</label>
						<label><input type="radio" name="cardType" value="americanExpress"/>American Express</label>
					</p>
					<p>
						<label for="cardName">Name on Card:</label>
						<input type="text" id="cardName" name="cardName" pattern="[a-zA-Z\s]{1,40}" />
					</p>
					<p>
						<label for="cardNumber">Credit Card Number:</label>
						<input type="text" id="cardNumber" name="cardNumber" pattern="[0-9]{15,16}" />
					</p>
					<p>
						<label for="expiry">Expiry:</label>
						<input type="text" id="expiry" name="expiry" placeholder="MM-YY" pattern="(1[0-2]|0[1-9])-([0-9]?[0-9])" />
						<label for="cvv">CVV:</label>
						<input type="text" id="cvv" name="cvv" pattern="[0-9]{3,4}" />
					</p>
					<input type="submit" value="Check Out"/>
					<button type="button" id="cancelButton">Cancel Order</button>
				</fieldset>
				<input type="hidden" name="firstName" id="firstName" />
				<input type="hidden" name="lastName" id="lastName" />
				<input type="hidden" name="email" id="email" />
				<input type="hidden" name="phone" id="phone" />
				<input type="hidden" name="street" id="street" />
				<input type="hidden" name="suburb" id="suburb" />
				<input type="hidden" name="state" id="state" />
				<input type="hidden" name="postCode" id="postCode" />
				<input type="hidden" name="prefContact" id="prefContact" />
				<input type="hidden" name="planType" id="planType" />
				<input type="hidden" name="quantity" id="quantity" />
				<input type="hidden" name="dataSize" id="dataSize" />
				<input type="hidden" name="addFeatures" id="addFeatures"/>
				<input type="hidden" name="cost" id="cost" />
				<input type="hidden" name="debug" id="debug" />
			</form>
		</div>
	</div>

	<?php
	include 'include/footer.inc';
	?>
</body>
</html>