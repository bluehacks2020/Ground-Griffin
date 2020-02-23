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

<!-- ---------------------- Navigation Bar ---------------------------- -->
<div class="col-md-1" style="height: 100vh;">
 <div style="width: 60px; height: 100vh; background: linear-gradient(240deg, rgba(255,255,255,0) 0%, rgba(61,202,255,0.14609593837535018) 30%, rgba(51,199,255,0.3477766106442577) 40%, rgba(41,196,255,0.6110819327731092) 50%, rgba(18,190,255,1) 69%, rgba(37,181,236,1) 70%, rgba(13,142,176,1) 90%, rgba(10,96,124,1) 100%); float: left; position: fixed; left: 0;">
 	<center>
 	<div style="margin-top: 50px;">
	 	<button data-toggle="modal" data-target="#logout_modal" style="border: none; background-color: transparent; margin-top: 20px;">
	 	<i class="material-icons riz-nav-inactive" style="font-size:24px;">arrow_back</i>
	 	</button>
	 	<button onclick="window.location.href='/ground_griffin/module_frequency_distribution.php'" style="border: none; background-color: transparent; margin-top: 20px;">
	 	<i class="material-icons riz-nav-inactive" style="font-size:24px;">group</i>
	 	</button>
	 	<div style="border: none; background-color: transparent; margin-top: 20px;">
	 	<i class="material-icons riz-nav-active" style="font-size:24px;">trending_up</i>
	 	</div>
 	</div>
 	</center>
 </div>
</div>

<div id="logout_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      	<center>
        <div>Continue to logout?</div>
        <br/>
        <button style="width: 100px;" class="btn btn-info" onclick="window.location.href='/ground_griffin/index.php'">Yes</button>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- ---------------------------- Body ---------------------------- -->
<div class="col-md-11 m-0">

<div class="w3-card" style="padding: 16px 24px; margin-top: 20px; width: 300px;">
	<div>Years Covered: <span id="years_covered"> 2020 to 2024 <span></div>
</div>

<div class="w3-card" style="padding: 16px 24px; margin-top: 20px; width: 900px;">
	<canvas id="regression_canvas"></canvas>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$.post("dataconnect_regression.php", {

		},
			function(data) {
				data = JSON.parse(data);
				var ethnic_diversity = data[0];
				var count_impact = data[1];

				// mean of X
				var sum_eth_div = 0;
				for (eth_div of ethnic_diversity) {
					sum_eth_div += eth_div;
				} 
				var mean_eth_div = sum_eth_div/ethnic_diversity.length;

				// mean of Y
				var sum_cnt_imp = 0;
				for (cnt_imp of count_impact) {
					sum_cnt_imp += cnt_imp;
				} 
				var mean_cnt_imp = sum_cnt_imp/count_impact.length;

				// number of values
				var n = ethnic_diversity.length;

				// calculating slope and y-intercept
				var numer = 0;
				var denom = 0;
				for (i = 0; i < n; i++) {
					numer += (ethnic_diversity[i] - mean_eth_div) * (count_impact[i] - mean_cnt_imp);
    				denom += (ethnic_diversity[i] - mean_eth_div) ** 2;
				}
				var slope = numer / denom;
				var intercept = mean_cnt_imp - (slope * mean_eth_div);

			

				var regression_canvas = document.getElementById("regression_canvas").getContext("2d");
				var regression_chart = new Chart(regression_canvas, {
					type: "scatter",
					data: {
				    datasets: [{
				    	backgroundColor: "#448AFF",
				    	borderColor: "#448AFF",
				    	label: "data points",
			            data: [{
			                x: ethnic_diversity[0],
			                y: count_impact[0]
			            }, {
			                x: ethnic_diversity[1],
			                y: count_impact[1]
			            }, {
			                x: ethnic_diversity[2],
			                y: count_impact[2]
			            }, {
			                x: ethnic_diversity[3],
			                y: count_impact[3]
			            }, {
			                x: ethnic_diversity[4],
			                y: count_impact[4]
			            }]
			        },{
			        	borderColor: "#B0BEC5",
			        	radius: 0,
			        	backgroundColor: "rgba(0,0,0,0)",
			        	showLine: true,

			        	label: "line of best fit",
			        	type: "line",
			        	data: [{
			                x: 51.90,
			                y: 20000
			            }, {
			                x: 33.63,
			                y: 25000
			            }, {
			                x: 15.37,
			                y: 30000
			            }, {
			                x: -2.90,
			                y: 35000
			            }]
			        }

			        ]}
				});

				
			}
		);
	});
</script>

<!-- end of col-11 -->
</div>

</div>
</div>

</body>