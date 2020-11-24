<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTD-8">
		<link rel="stylesheet" type="text/css" href="stylesheet/Stylesheet.css"/>
		<title><?php echo $title; ?></title>
	</head>
	<body>
			<div id="wrapper">
				<div id="banner">
				</div>

				<nav id="navigation">
					<ul id="nav">
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#"></a></li>
						<input type="text" placeholder="Search Doctors..">
					</ul>
				</nav>

				<div id="content_area">
					<?php echo $content; ?>
						<form action="index.php" method="post">
							<label> First Name: </label>
							<input type="text" name="first"/><br />
							<label> Last Name: </label>
							<input type="text" name="last"/><br />
							<label> Gender: </label>
							<input type="text" name="gender"/><br />
							<label> Address: </label>
							<input type="text" name="address"/><br />
							<label> SSN: </label>
							<input type="text" name="ssn"/><br />
							<label> Symptoms: <br />
							<textarea style="resize:none" type ="text" name="symptoms" rows="5" cols="40"></textarea><br />
							<input type="submit">
					</form>
					
				</div>

				<div id="sidebar">
				
				</div>

				<footer>
					<p>All Rights Reserved</p>
				</footer>
			</div>
	</body>
</html>

