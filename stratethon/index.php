<!DOCTYPE html>
<html>
<head>
	<title>CareUS</title>
	<link rel = "stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/googlemap.js"></script>
	<style type="text/css">
		.container {
			height: 450px;
		}
		#map {
			width: 100%;
			height: 100%;
			border: 1px solid blue;
		}
		#data, #allData {
			display: none;
		}
	</style>

</head>
<body>
	<div class="container">
		Patient Details: <br>
		First Name: <?php echo $_POST["first"]; ?> <br>
		Last Name: <?php echo $_POST["last"]; ?> <br>
		Gender: <?php echo $_POST["gender"]; ?> <br>
		Address: <?php echo $_POST["address"]; ?> <br>
		SSN: <?php echo $_POST["ssn"]; ?> <br>
		Symptoms: <?php echo $_POST["symptoms"]; ?> <br>

		 <center><h1>Hospitals Near Me</h1></center>
		 <?php
		 	require 'sample.php';
			$sam = new sample;
			$coll = $sam->getSampleBlankLatLng();
			$coll = json_encode($coll, true);
			echo '<div id="data">' . $coll . '</div>';
			$allData = $sam->getAllSample();
			$allData = json_encode($allData, true);
			echo '<div id="allData">' . $allData . '</div>';

		 ?>
		 <div id="map"></div>
	</div>
</body>
<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyY9wPqzito_7LKPB9GOJ92vNzBl-wvtI&callback=loadMap">
	</script>
</html>