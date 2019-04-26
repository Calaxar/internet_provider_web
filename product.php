<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Product page of assignment website" />
	<meta name="keywords" content="HTML5, CSS, assignment, internet, access, plan" />
	<meta name="author" content="Calum Hay"  />
	<title> jjNet - Product</title>
	<link href="styles/style.css" rel="stylesheet"/>
</head>
<body id="productBody">
	<?php
	include 'include/header.inc';
	?>
	
	<div class="pageBody">
	<?php
	include 'include/menu.inc';
	?>
	
	<div class="content">
	<h2>Products</h2>
	<p>This is our products page. here you will find what jjNet is offering for Internet access plans currently.
	<br/>Each plan can also be bundled with optional features which are described below.</p>
	<section id="productList">
	<h3>Internet Access Plan</h3>
	<aside id="extras">
		<h3>Optional Features</h3>
		<ul>
			<li>
				<p>Scamblok&#174;</p>
				<blockquote><em>'Keep your private details safely barricaded from viruses with this expensive bloatware'</em></blockquote>
			</li>
			<li>
				<p>Modem</p>
				<blockquote><em>'Don't own a modem? Allow us to provide a relatively low end rental for a substantial fee'</em></blockquote>
			</li>
			<li>
				<p>Subscription to our Newsletter</p>
				<blockquote><em>'Most companies provide their newsletters for free. Not us'</em></blockquote>
			</li>
		</ul>
	</aside>
	<ol>
		<li>NBN
			<ul>
				<li>"Fastest" Connection Speeds.</li>
				<li>Select Areas Only.</li>
			</ul>
			<p>Try out the governments newest attempt to make our internet *slightly* faster! If you're lucky enough to live in an area which has been wired up to NBN, you can try out our internet plan and experience internet speed like never before! Be aware however, if NBN is not in your area then you will be exempt from this plan until that time comes. If your area never gets NBN, then tough luck!</p>
		</li>
		<li>ADSL
			<ul>
				<li>Average Connection Speeds.</li>
				<li>Works In Most Areas.</li>
			</ul>
			<p>Welcome to the not so latest in stock standard internet setup. As NBN contues to become available in more areas, this interenet option is likely to become increasingly obsolete. That is, unless something horrible happens to NBN; then we'll all come flooding back to ol' faithful  ADSL. </p>
		</li>
		<li>POTATO
			<ul>
				<li>"Slowest" Connection Speeds.</li>
				<li>Requires Adapter.</li>
				<li>Found In Local Grocery Store</li>
			</ul>
			<p>The latest technology and research has allowed to humble potato to evolve from potato, to potato clock, and now to its final form as a fully fledged ISP! This exciting advance in internet technology is the fruit of over 20 years of research led by our company, and we are proud to finally make it public. <br/><em>*Please note: POTATO provides by far the slowest internet connection of all of our other options, as it is still in its alpha stage.</em></p>
		</li>
	</ol>
	</section>
	<p>Each Package comes in <strong>10GB/mo</strong>, <strong>50GB/mo</strong> and <strong>100GB/mo</strong> varieties.</p>
	


	<section id="featureTable">
		<h3>Feature Comparison</h3>
		<table>
			<tr>
				<th></th>
				<th>Connection Speed</th>
				<th>Availability</th>
				<th>Cost</th>
			</tr>
			<tr>
				<th scope="row">NBN</th>
				<td>Fast</td>
				<td>Limited</td>
				<td>&#36;56b Construction</td>
			</tr>
			<tr>
				<th scope="row">ADSL</th>
				<td>Average</td>
				<td>Most areas</td>
				<td>Average</td>
			</tr>
			<tr>
				<th scope="row">POTATO</th>
				<td>Slow</td>
				<td>Anywhere</td>
				<td>Cheap as Chips</td>
			</tr>
		</table>
	</section>

	<p>If you would like to make an enquiry with regards to any of these products, please <a href="enquire.html">Click Here</a></p>
	<img src="images/internetBanner.jpg" alt="Internet Banner" />
	</div>
	</div>
	<?php
	include 'include/footer.inc';
	?>
</body>
</html>