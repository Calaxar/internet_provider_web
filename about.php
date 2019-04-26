<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="About page of assignment website" />
	<meta name="keywords" content="HTML5, CSS, assignment, internet, access, plan" />
	<meta name="author" content="Calum Hay"  />
	<title> jjNet - About</title>
	<link href= "styles/style.css" rel="stylesheet"/>
</head>
<body id="aboutBody">
	<?php
	include 'include/header.inc';
	?>
	
	<div class="pageBody">
		<?php
		include 'include/menu.inc';
		?>
		
		<div class="content">
			<section id="studentDetails">
				<h2>Student Details</h2>
				<figure>
					<img src="images/picOfMe.jpg" />
					<figcaption>Picture of Calum</figcaption>
				</figure>
				<dl>
					<dt>Name:</dt>
						<dd>Calum Hay</dd>
					<dt>Student:</dt>
						<dd>100598217</dd>
					<dt>Course:</dt>
						<dd>Robotics and Mechatronics Engineering/Computer Science</dd>
			    </dl>
				
				
				<p id="mailTo"><a href="mailto:someone@swin.edu.au"> Click Here</a> to contact Calum via Email.</p>
			</section>
			<div id="timetable">
					<h2>Timetable</h2>
					<table>
						<tr>
							<th></th>
							<th>Monday</th>
							<th>Tuesday</th>
							<th>Wednesday</th>
							<th>Thursday</th>
							<th>Friday</th>
						</tr>
						<tr>
							<th scope="row">8:30</th>
							<td></td>
							<td rowspan="2">COS10011<br/>Lecture 1</td>
							<td></td>
							<td>MTH20007<br/>Lecture 2</td>
							<td></td>
						</tr>
						<tr>
							<th scope="row">9:30</th>
							<td></td>
							<td></td>
							<td>MTH20007<br/>Tutorial 1</td>
							<td></td>
						</tr>
						<tr>
							<th scope="row">10:30</th>
							<td></td>
							<td></td>
							<td></td>
							<td rowspan="2">COS10011<br/>Lab 1</td>
							<td></td>
						</tr>
						<tr>
							<th scope="row">11:30</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th scope="row">12:30</th>
							<td></td>
							<td rowspan="2">MTH20007<br/>Lecture 1</td>
							<td></td>
							<td rowspan="2">COS20007<br/>Lab 1</td>
							<td></td>
						</tr>
						<tr>
							<th scope="row">1:30</th>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th scope="row">2:30</th>
							<td rowspan="2">MEE30003<br/>Lecture 1</td>
							<td rowspan="2">MEE30003<br/>Tutorial 1</td>
							<td></td>
							<td rowspan="2">COS20007<br/>Workshop 1</td>
							<td></td>
						</tr>
						<tr>
							<th scope="row">3:30</th>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th scope="row">4:30</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th scope="row">5:30</th>
							<td rowspan="2">COS20007<br/>Lecture 1</td>
							<td>MTH20007<br/>Lab 1</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th scope="row">6:30</th>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</div>
			<section id="assignmentRequirements">
				<h2>Assignment requirements</h2>
				<section class="requirement">
					<h3>Index</h3>
					<ul>
						<li>Validates to HTML5</li>
						<li>Validates to XML</li>
						<li>Menu with links</li>
						<li>Graphic</li>
					</ul>
				</section>
				<section class="requirement">
					<h3>Product</h3>
					<ul>
						<li>Validates to HTML5</li>
						<li>Validates to XML</li>
						<li>Menu</li>
						<li>Appropriate use of headings</li>
						<li>Meaningful Content</li>
						<li>Table, Image, Lists</li>
					</ul>
				</section>
				<section class="requirement">
					<h3>Enquire</h3>
					<ul>
						<li>Validates to HTML5</li>
						<li>Validates to XML</li>
						<li>Menu</li>
						<li>Form Input Fields(text, email, radio, select, checkbox, textarea, and submit used)</li>
						<li>HTML5 used to check some form control elements</li>
						<li>All field values are echoed back from server</li>
					</ul>
				</section>
				<section class="requirement">
					<h3>About</h3>
					<ul>
						<li>Validates to HTML5</li>
						<li>Validates to XML</li>
						<li>Menu</li>
						<li>3 sections</li>
						<li>dl</li>
						<li>Timetable</li>
						<li>Figure, Photo</li>
						<li>Email Link</li>
					</ul>
				</section>
				<section class="requirement">
					<h3>CSS</h3>
					<ul>
						<li>CSS validates with no errors</li>
						<li>External CSS applied to all HTML pages</li>
					</ul>
				</section>
			</section>
			
			<section id="reflection">
				<h2>Reflections</h2>
			</section>
		</div>
	</div>

	<?php
	include 'include/footer.inc';
	?>
</body>
</html>