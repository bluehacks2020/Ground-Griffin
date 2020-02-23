<?php
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- meta settings -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Riznel Baldazo">

	<!-- libraries -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="w3.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="riz.css?v=<?php echo time(); ?>">

</head>
<body>

<div class="container-fluid">
<div class="row">

<div class="col-md-5" style="background-color: white; height: 100vh;">
	<div style="margin-left: auto; margin-right: auto; width: 50%;">
		<img src="logo colored.png" style="top: 220px; position: absolute; width: 150px;">
		<div style="font-size: 120px; top: 340px; position: absolute; font-family: 'palace script mt',optima; ">Likha</div>
		<div style="font-size: 20px; top: 470px; position: absolute;">Organization Member <br/> Exchange</div>
	</div>
</div>
<div class="col-md-7" style="background-image: url('forest1.png'); background-size: cover; height: 100vh;">
	<center>
		<div style="padding-top: 250px;">
			<input type="text" class="form-control" style="width: 200px;"><br/>
			<input type="password" class="form-control" style="width: 200px;"><br/>
			<button onclick="window.location.href='/ground_griffin/module_frequency_distribution.php'" class="btn btn-info" style="width: 150px;">Login</button>
		</div>
	</center>
</div>
	
</div>
</div>

</body>
</html>