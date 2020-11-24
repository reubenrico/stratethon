<?php 
	require 'sample.php';
	$sam = new sample;
	$sam->setId($_REQUEST['Id']);
	$sam->setLast($_REQUEST['NAME']);
	$sam->setLat($_REQUEST['LAT']);
	$sam->setLng($_REQUEST['LON']);
	$status = $sam->updateSampleWithLatLng();
	if($status == true) {
		echo "Updated...";
	} else {
		echo "Failed...";
	}
 ?>