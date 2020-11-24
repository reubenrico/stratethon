<?php
	class sample
	{
			private $Id;
			private $NAME;
			private $LAT;
			private $LON;
			private $ADDRESS;
			private $conn;
			private $tableName = "organizations";

			function setId($Id) {$this->Id = $Id; }
			function getId() {return $this->Id; }
			function setNAME($NAME) {$this->NAME = $NAME; }
			function getNAME() {return $this->NAME; }
			function setLAT($LAT) {$this->LAT = $LAT; }
			function getLAT() {return $this->LAT; }
			function setLON($LON) {$this->LON = $LON; }
			function getLON() {return $this->LON; }
			function setADDRESS($ADDRESS) {$this->ADDRESS = $ADDRESS; }
			function getADDRESS() {return $this->ADDRESS; }


			public function __construct() {
				require_once('db/dbConnect.php');
				$conn = new dbConnect;
				$this->conn = $conn->connect();
			}

			public function getSampleBlankLatLng(){
				$sql = "SELECT * FROM $this->tableName WHERE LAT IS NULL AND LON IS NULL";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}

			public function getAllSample() {
				$sql = "SELECT * FROM $this->tableName WHERE LAT AND LON LIMIT 100";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			public function updateSampleWithLatLng() {
				$sql = "UPDATE $this->tableName SET LAT = :LAT, LON = :LON, NAME = :NAME, ADDRESS = :ADDRESS WHERE Id = :Id";
				$stmt = $this->conn->prepare($sql);
				$stmt->bindParam(':LAT', $this->LAT);
				$stmt->bindParam(':LON', $this->LON);
				$stmt->bindParam(':NAME', $this->NAME);
				$stmt->bindParam(':ADDRESS', $this->ADDRESS);
				$stmt->bindParam(':Id', $this->Id);

			if($stmt->execute()) {
				return true;
			} else {
				return false;
			}	
			}

		}
	

?>