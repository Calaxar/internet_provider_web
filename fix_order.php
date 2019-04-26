<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Fix Order page of assignment website" />
	<meta name="keywords" content="HTML5, CSS, assignment, internet, access, plan" />
	<meta name="author" content="Calum Hay"  />
	<title> jjNet - Fix Payment</title>
	<link href="styles/style.css" rel="stylesheet"/>
	<script src="scripts/part2.js"></script>
</head>
<body id="fixOrderBody">
	<?php
	include 'include/header.inc';
	if ($_GET['firstName'] == "") header('Location: enquire.php');
	?>
	
	<div class="pageBody">
		<?php
		include 'include/menu.inc';
		?>
		
		
		<div class="content">
			<h1>Try again, Bub.</h1>
			<form id="fixForm" method="post" action="process_order.php" novalidate="novalidate">
				<fieldset class="formBlock">
					<legend>Personal Details:</legend>
					<p>
						<label for="firstName">First Name:</label>
						<input type="text" name="firstName" id="firstName" required="required" pattern="[A-Za-z\-]{1,25}" value="<?php echo $_GET['firstName']; ?>" /><?php echo $_GET['firstNameError']; ?>
						<label for="lastName">Last Name:</label>
						<input type="text" name="lastName" id="lastName" required="required" pattern="[A-Za-z\-]{1,25}" value="<?php echo $_GET['lastName']; ?>"/><?php echo $_GET['lastNameError']; ?>
					</p>
					<p>
						<label for="email">Email:</label>
						<input type="email" name="email" id="email" required="required" value="<?php echo $_GET['email']; ?>"/><?php echo $_GET['emailError']; ?>
					</p>
					<p>
						<label  for="phone">Phone:</label>
						<input type="tel" name="phone" id="phone" required="required" placeholder="0312345678" pattern=".{6,10}"  value="<?php echo $_GET['phone']; ?>"/><?php echo $_GET['phoneError']; ?>
					</p>
					<fieldset class="formBlock">
						<legend>Address:</legend>
						<p>
							<label for="street">Street Address:</label>
							<input type="text" name="street" id="street" required="required" pattern=".{1,40}" value="<?php echo $_GET['street']; ?>"/><?php echo $_GET['streetError']; ?>
						</p>
						<p>
							<label for="suburb">Suburb:</label>
							<input type="text" name="suburb" id="suburb" required="required" pattern=".{1,20}" value="<?php echo $_GET['suburb']; ?>"/><?php echo $_GET['suburbError']; ?>
						</p>
						<p>
							<label for="state">State:</label>
							<select name="state" id="state" required="required">
								<option value="" <?php if ($_GET['state'] == "") echo 'selected="selected"'; ?> >-STATE-</option>
								<option value="vic" <?php if ($_GET['state'] == "vic") echo 'selected="selected"'; ?> >VIC</option>
								<option value="nsw" <?php if ($_GET['state'] == "nsw") echo 'selected="selected"'; ?> >NSW</option>
								<option value="qld" <?php if ($_GET['state'] == "qld") echo 'selected="selected"'; ?> >QLD</option>
								<option value="nt" <?php if ($_GET['state'] == "nt") echo 'selected="selected"'; ?> >NT</option>
								<option value="wa" <?php if ($_GET['state'] == "wa") echo 'selected="selected"'; ?> >WA</option>
								<option value="sa" <?php if ($_GET['state'] == "sa") echo 'selected="selected"'; ?> >SA</option>
								<option value="tas" <?php if ($_GET['state'] == "tas") echo 'selected="selected"'; ?> >TAS</option>
								<option value="act" <?php if ($_GET['state'] == "act") echo 'selected="selected"'; ?> >ACT</option>
							</select>
							<?php echo $_GET['stateError']; ?>
						</p>
						<p>
							<label for="postCode">Postcode:</label>
							<input type="text" name="postCode" id="postCode" required="required" pattern=".{4}" value="<?php echo $_GET['postCode']; ?>"/>
							<?php echo $_GET['postCodeError']; ?>
						</p>
					</fieldset>
					<fieldset class="formBlock" id="prefContact">
						<legend>Preferred Contact:</legend>
						<p>

							<label><input type="radio" name="prefContact" value="Email" <?php if ($_GET['prefContact'] == "Email") echo 'checked="checked"'; ?>/>Email</label>
							<label><input type="radio" name="prefContact" value="Post" <?php if ($_GET['prefContact'] == "Post") echo 'checked="checked"'; ?>/>Post</label>
							<label><input type="radio" name="prefContact" value="Phone" <?php if ($_GET['prefContact'] == "Phone") echo 'checked="checked"'; ?>/>Phone</label>
						</p>
					</fieldset>
				</fieldset>
				<fieldset class="formBlock">
					<legend>Product Details:</legend>
					<p>
						<label for="planType">Internet Plan</label>
						<select name="planType" id="planType" required="required" value="<?php echo $_GET['planType']; ?>">
							<option value="" selected="selected" <?php if ($_GET['planType'] == "") echo 'selected="selected"'; ?> >Please Select</option>
							<option value="nbn" <?php if ($_GET['planType'] == "nbn") echo 'selected="selected"'; ?> >NBN [&#36;3/GB]</option>
							<option value="adsl" <?php if ($_GET['planType'] == "adsl") echo 'selected="selected"'; ?> >ADSL [&#36;2/GB]</option>
							<option value="potato" <?php if ($_GET['planType'] == "potato") echo 'selected="selected"'; ?> >POTATO [&#36;1/GB]</option>
						</select>
						<?php echo $_GET['planTypeError']; ?>
					</p>
					<p>
						<label for="quantity">No. Devices (Quantity):</label>
						<input type="text" name="quantity" id="quantity" required="required" pattern="[0-9]{1,2}" value="<?php echo $_GET['quantity']; ?>"/>
						<?php echo $_GET['quantityError']; ?>
					</p>
					<fieldset class="formBlock" id="data">
						<legend>Plan Data Size</legend>
						<p>
							<label><input type="radio" name="data" value="10gb" checked="checked"/>10GB/mo</label>
							<label><input type="radio" name="data" value="50gb"/>50GB/mo</label>
							<label><input type="radio" name="data" value="100gb"/>100GB/mo</label>
						</p>
					</fieldset>
					<fieldset class="formBlock">
						<legend>Additional Features:</legend>
						<p>
							<label><input type="checkbox" name="extras[]" id="scambloc" value="scambloc" <?php if (strpos($_GET['extras'], "scambloc") != false) echo 'checked="checked"'?> />Scambloc&#174; [&#36;150]</label>
							<label><input type="checkbox" name="extras[]" id="modem" value="modem" <?php if (strpos($_GET['extras'], "modem") != false) echo 'checked="checked"'?> />Modem [&#36;450]</label>
							<label><input type="checkbox" name="extras[]" id="newsletter" value="newsletter" <?php if (strpos($_GET['extras'], "newsletter") != false) echo 'checked="checked"'?> />Newsletter Subscription [&#36;85]</label>
						</p>
					</fieldset>
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
						<?php echo $_GET['cardNameError']; ?>
					</p>
					<p>
						<label for="cardNumber">Credit Card Number:</label>
						<input type="text" id="cardNumber" name="cardNumber" pattern="[0-9]{15,16}" />
						<?php echo $_GET['cardNumberError']; ?>
					</p>
					<p>
						<label for="expiry">Expiry:</label>
						<input type="text" id="expiry" name="expiry" placeholder="MM-YY" pattern="(1[0-2]|0[1-9])-([0-9]?[0-9])" />
						<?php echo $_GET['expiryError']; ?>
						<label for="cvv">CVV:</label>
						<input type="text" id="cvv" name="cvv" pattern="[0-9]{3,4}" />
						<?php echo $_GET['cvvError']; ?>
					</p>
					<input type="submit" value="Check Out"/>
					<button type="button" id="cancelButton">Cancel Order</button>
				</fieldset>
			</form>
		</div>
	</div>

	<?php
	include 'include/footer.inc';
	?>
</body>
</html>