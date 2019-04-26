<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Receipt page of assignment website" />
	<meta name="keywords" content="HTML5, CSS, assignment, internet, access, plan" />
	<meta name="author" content="Calum Hay"  />
	<title> jjNet - Payment</title>
	<link href="styles/style.css" rel="stylesheet"/>
	<script src="scripts/part2.js"></script>
</head>
<body id="receiptBody">
	
	<div class="pageBody">
		<?php
		include 'include/menu.inc';
		if ($_GET['firstName'] == "") header('Location: enquire.php');
		?>
		
		
		<div class="content">
			<form id="receiptForm" method="post" action="process_order.php" novalidate="novalidate">
				<fieldset class="formBlock">
					<legend>Your Details:</legend>
					<p>Name: <?php echo $_GET['firstName']; ?> <?php echo $_GET['lastName']; ?></p>
					<p>Email: <?php echo $_GET['email']; ?></p>
					<p>Phone: <?php echo $_GET['phone']; ?></p>
					<p>Address: <?php echo $_GET['street']; ?>, <?php echo $_GET['suburb']; ?> <?php echo $_GET['state']; ?></p>
					<p>Preferred Contact: <?php echo $_GET['prefContact']; ?></p>
				</fieldset>
				<fieldset class="formBlock">
					<legend>Receipt:</legend>
					<p>Plan: <?php echo $_GET['planType']; ?></p>
					<p>Quantity: <?php echo $_GET['quantity']; ?></p>
					<p>Data Size: <?php echo $_GET['dataSize']; ?></p>
					<p>Additional Features: <?php echo $_GET['extras']; ?></p>
					<p>Cost: $<?php echo $_GET['cost']; ?></p>
					<p>Status: <?php echo $_GET['status']; ?></p>
					<p>Time: <?php echo $_GET['time']; ?></p>
					<p>Order ID: <?php echo $_GET['orderId']; ?></p>
				</fieldset>
			</form>
		</div>
	</div>

	<?php
	include 'include/footer.inc';
	?>
</body>
</html>