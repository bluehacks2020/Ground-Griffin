<?php
include "connection.php";

$year = $_POST["year"];

$query_read_data = "SELECT * FROM frequency_distribution WHERE year_data ='$year'";

$process_read_data = mysqli_query($conn, $query_read_data);
if (mysqli_num_rows($process_read_data) > 0) {
	while ($row = mysqli_fetch_assoc($process_read_data)) {
		$data = array();
		array_push($data, 
			$row["tagalog"],
			$row["cebuano"],
			$row["ilocano"],
			$row["visayan"],
			$row["hiligaynon"],
			$row["bikol"],
			$row["waray"],
			$row["chinese"],
			$row["others"]
		);
		echo json_encode($data);
	}
}



?>