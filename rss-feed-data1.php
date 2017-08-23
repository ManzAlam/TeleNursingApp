<?php
	$servername = "patch.twilightparadox.com";
			$username = "root";
			$password = "project";
			$dbname = "telehealth";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT resp_rate, timestamp FROM patient_health WHERE id=(select max(id) from patient_health)";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				print  "   Breathing Rate:  " . $row["resp_rate"]. "  timestamp:  " . $row["timestamp"]."<br>";
				
		
				
				}
			} else {
				echo "0 results";
			}
?>