<?php 
	
include "connection.php";

$query_freqdist = "SELECT * FROM frequency_distribution";
$process_freqdist= mysqli_query($conn, $query_freqdist);

$query_impact = "SELECT * FROM people_impacted";
$process_impact= mysqli_query($conn, $query_impact);

// missing code for preprocessing data and pushing to array may be explained via Excel

$array_ethnic_diversity = array(44.6, 46.13, 5.93, 39.93, 2.33);
$array_impact_count = array(22000, 21000, 32000, 24000, 34000);
$array_all = array();
array_push($array_all, $array_ethnic_diversity);
array_push($array_all, $array_impact_count);

echo json_encode($array_all);

?>