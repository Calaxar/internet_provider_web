<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Enquiry page of assignment website" />
	<meta name="keywords" content="HTML5, CSS, assignment, internet, access, plan" />
	<meta name="author" content="Calum Hay"  />
	<title> jjNet - Enquire</title>
	<link href= "styles/style.css" rel="stylesheet"/>
	<script src="scripts/part2.js"></script>
</head>
<body id="enquireBody">
	<?php
	include 'include/header.inc';
	?>
	
	<div class="pageBody">
	<?php
	include 'include/menu.inc';
	?>
	
	<div class="content">
		<h1>Product Enquiries Form</h1>
		<form id="enquireForm" action="payment.php" novalidate="novalidate">
			<fieldset class="formBlock">
				<legend>Debug:</legend>
				<p>
					<label><input type="checkbox" name="debug" id="debug" value="debug" checked="checked"/>Enable Debug?</label>
				</p>
			</fieldset>
			<fieldset class="formBlock">
				<legend>Personal Details:</legend>
				<p>
					<label for="firstName">First Name:</label>
					<input type="text" name="firstName" id="firstName" required="required" pattern="[A-Za-z\-]{1,25}"/>
					<label for="lastName">Last Name:</label>
					<input type="text" name="lastName" id="lastName" required="required" pattern="[A-Za-z\-]{1,25}"/>
				</p>
				<p>
					<label for="email">Email:</label>
					<input type="email" name="email" id="email" required="required"/>
				</p>
				<p>
					<label  for="phone">Phone:</label>
					<input type="tel" name="phone" id="phone" required="required" placeholder="0312345678" pattern=".{6,10}"/>
				</p>
				<fieldset class="formBlock">
					<legend>Address:</legend>
					<p>
						<label for="street">Street Address:</label>
						<input type="text" name="street" id="street" required="required" pattern=".{1,40}"/>
					</p>
					<p>
						<label for="suburb">Suburb:</label>
						<input type="text" name="suburb" id="suburb" required="required" pattern=".{1,20}"/>
					</p>
					<p>
						<label for="state">State:</label>
						<select name="state" id="state" required="required">
							<option value="" selected="selected">-STATE-</option>
							<option value="vic">VIC</option>
							<option value="nsw">NSW</option>
							<option value="qld">QLD</option>
							<option value="nt">NT</option>
							<option value="wa">WA</option>
							<option value="sa">SA</option>
							<option value="tas">TAS</option>
							<option value="act">ACT</option>
						</select>
					</p>
					<p>
						<label for="postCode">Postcode:</label>
						<input type="text" name="postCode" id="postCode" required="required" pattern=".{4}"/>
					</p>
				</fieldset>
				<fieldset class="formBlock" id="prefContact">
					<legend>Preferred Contact:</legend>
					<p>
						<label><input type="radio" name="prefContact" value="Email" checked="checked"/>Email</label>
						<label><input type="radio" name="prefContact" value="Post"/>Post</label>
						<label><input type="radio" name="prefContact" value="Phone"/>Phone</label>
					</p>
				</fieldset>
			</fieldset>
			<fieldset class="formBlock">
				<legend>Product Details:</legend>
				<p>
					<label for="planType">Internet Plan</label>
					<select name="planType" id="planType" required="required">
						<option value="" selected="selected">Please Select</option>
						<option value="nbn">NBN [&#36;3/GB]</option>
						<option value="adsl">ADSL [&#36;2/GB]</option>
						<option value="potato">POTATO [&#36;1/GB]</option>
					</select>
				</p>
				<p>
					<label for="quantity">No. Devices (Quantity):</label>
					<input type="text" name="quantity" id="quantity" required="required" pattern="[0-9]{1,2}"/>
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
						<label><input type="checkbox" name="extras[]" id="scambloc" value="scambloc" checked="checked"/>Scambloc&#174; [&#36;150]</label>
						<label><input type="checkbox" name="extras[]" id="modem" value="modem"/>Modem [&#36;450]</label>
						<label><input type="checkbox" name="extras[]" id="newsletter" value="newsletter"/>Newsletter Subscription [&#36;85]</label>
					</p>
				</fieldset>
				<p><label>Additional Comments<br />
					<textarea name="comment"
					rows="5" cols="60" 
					placeholder="I'm particularly interested in..." ></textarea>
					</label>
				</p>
			</fieldset>
			<fieldset>
				<input type= "submit" value="Pay Now"/>
				<input type= "reset" value="Reset Enquiry"/>
			</fieldset>
		</form>
	</div>
	</div>
	<?php
	include 'include/footer.inc';
	?>
</body>
</html>