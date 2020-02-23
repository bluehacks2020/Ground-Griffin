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
	 	<button style="border: none; background-color: transparent; margin-top: 20px;">
	 	<i class="material-icons riz-nav-active" style="font-size:24px;">group</i>
	 	</button>
	 	<button onclick="window.location.href='/ground_griffin/module_regression.php'" style="border: none; background-color: transparent; margin-top: 20px;">
	 	<i class="material-icons riz-nav-inactive" style="font-size:24px;">trending_up</i>
	 	</button>
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

<!-- Select Year -->
<div class="w3-card" style="padding: 16px 24px; width: 300px; margin: 12px 0px;">
<select id="selected_year" class="custom-select" style="width: 100px;">
	<option>2020</option>
	<option>2021</option>
	<option>2022</option>
	<option>2023</option>
	<option>2024</option>
	<option>2025</option>
	<option>2026</option>
	<option>2027</option>
	<option>2028</option>
	<option>2029</option>
</select>
<button id="btn_open_year" class="btn btn-info">Open Data</button>
</div>

<!-- Data of Frequency Distribution (Display, Input, Delete) -->
<div id="section_frequency_distribution" class="d-none">

<!-- Create -->
<div id="card_display_buttons" class="w3-card" style="padding: 16px 24px; width: 300px; margin: 12px 0px;">
<button id="btn_input_data" class="btn btn-info">Input Data</button>
<button id="btn_delete_data" class="btn btn-info">Delete Data</button>
</div>

<div id="card_input_buttons" class="w3-card d-none" style="padding: 16px 24px; width: 300px; margin: 12px 0px;">
<input type="submit" value="Submit" class="btn btn-info" />
<button id="cancel_button" class="btn btn-info">Cancel</button>
</div>

<div id="input_frequency_distribution" class="w3-card d-none" style="padding: 16px 24px; margin-bottom:20px;width: 600px; display: inline-block;">	
	<table class="table table-borderless">
		<tr>
			<td>Ethnic Group</td>
			<td>Population Count</td>
		</tr>
		<tr>
			<td>Tagalog</td>
			<td><input id="input_tagalog" type="text" class="form-control" /></td>
		</tr>
		<tr>
			<td>Cebuano</td>
			<td><input id="input_cebuano" type="text" class="form-control" /></td>
		</tr>
		<tr>
			<td>Ilocano</td>
			<td><input id="input_ilocano" type="text" class="form-control" /></td>
		</tr>
		<tr>
			<td>Visayan</td>
			<td><input id="input_visayan" type="text" class="form-control" /></td>
		</tr>
		<tr>
			<td>Hiligaynon</td>
			<td><input id="input_hiligaynon" type="text" class="form-control" /></td>
		</tr>
		<tr>
			<td>Bikol</td>
			<td><input id="input_bikol" type="text" class="form-control" /></td>
		</tr>
		<tr>
			<td>Waray</td>
			<td><input id="input_waray" type="text" class="form-control" /></td>
		</tr>
		<tr>
			<td>Chinese Filipino</td>
			<td><input id="input_chinese" type="text" class="form-control" /></td>
		</tr>
		<tr>
			<td>Others</td>
			<td><input id="input_others" type="text" class="form-control" /></td>
		</tr>
	</table>
		

	
</div>

<div>
<div id="display_frequency_distribution" class="w3-card" style="height: 450px; width: 600px; display: inline-block;">
	<table class="table">
		<tr style="text-align: center;">
			<td>Ethnic Group</td>
			<td>Population Count</td>
			<td>Population Percentage</td>
		</tr>
		<tr style="text-align: center;">
			<td>Tagalog</td>
			<td id="display_tagalog">no data</td>
			<td id="percent_tagalog">no data</td>
		</tr>
		<tr style="text-align: center;">
			<td>Cebuano</td>
			<td id="display_cebuano">no data</td>
			<td id="percent_cebuano">no data</td>
		</tr>
		<tr style="text-align: center;">
			<td>Ilocano</td>
			<td id="display_ilocano">no data</td>
			<td id="percent_ilocano">no data</td>
		</tr>
		<tr style="text-align: center;">
			<td>Visayan</td>
			<td id="display_visayan">no data</td>
			<td id="percent_visayan">no data</td>
		</tr>
		<tr style="text-align: center;">
			<td>Hiligaynon</td>
			<td id="display_hiligaynon">no data</td>
			<td id="percent_hiligaynon">no data</td>
		</tr>
		<tr style="text-align: center;">
			<td>Bikol</td>
			<td id="display_bikol">no data</td>
			<td id="percent_bikol">no data</td>
		</tr>
		<tr style="text-align: center;">
			<td>Waray</td>
			<td id="display_waray">no data</td>
			<td id="percent_waray">no data</td>
		</tr>
		<tr style="text-align: center;">
			<td>Chinese Filipino</td>
			<td id="display_chinese">no data</td>
			<td id="percent_chinese">no data</td>
		</tr>
		<tr style="text-align: center;">
			<td>Others</td>
			<td id="display_others">no data</td>
			<td id="percent_others">no data</td>
		</tr>
	</table>
</div>

<div id="pie_chart_container" class="w3-card" style="margin-left: 20px; height: 450px; width: 550px; background-color: white; display: inline-block; top: 0; position: relative;">
	<canvas id="pie_chart_canvas"></canvas>
</div>

</div>

<!-- section_frequency_distribution -->
</div>

<!-- col-11 end -->
</div>

<script>
	$(document).ready(function() {
		var year;
		// get existing data from database if available
		$("#btn_open_year").click(function() {
			$("#section_frequency_distribution").removeClass("d-none");
			year = $("#selected_year").val();
			$.post("dataconnect_frequency_distribution.php", {
				year: year
			},
				function(data) {
					data = JSON.parse(data);
					data[0] = parseInt(data[0]);
					data[1] = parseInt(data[1]);
					data[2] = parseInt(data[2]);
					data[3] = parseInt(data[3]);
					data[4] = parseInt(data[4]);
					data[5] = parseInt(data[5]);
					data[6] = parseInt(data[6]);
					data[7] = parseInt(data[7]);
					data[8] = parseInt(data[8]);
					var sum_count = data[0]+
					data[1]+
					data[2]+
					data[3]+
					data[4]+
					data[5]+
					data[6]+
					data[7]+
					data[8];
					var tagalog_percent = data[0]/sum_count;
					var cebuano_percent = data[1]/sum_count;
					var ilocano_percent = data[2]/sum_count;
					var visayan_percent = data[3]/sum_count;
					var hiligaynon_percent = data[4]/sum_count;
					var bikol_percent = data[5]/sum_count;
					var waray_percent = data[6]/sum_count;
					var chinese_percent = data[7]/sum_count;
					var others_percent = data[8]/sum_count;

					// frequency distribution of count from database
					$("#display_tagalog").text(data[0]);
					$("#display_cebuano").text(data[1]);
					$("#display_ilocano").text(data[2]);
					$("#display_visayan").text(data[3]);
					$("#display_hiligaynon").text(data[4]);
					$("#display_bikol").text(data[5]);
					$("#display_waray").text(data[6]);
					$("#display_chinese").text(data[7]);
					$("#display_others").text(data[8]);
					$("#percent_tagalog").text((tagalog_percent*100).toFixed(2) + " %");
					$("#percent_cebuano").text((cebuano_percent*100).toFixed(2) + " %");
					$("#percent_ilocano").text((ilocano_percent*100).toFixed(2) + " %");
					$("#percent_visayan").text((visayan_percent*100).toFixed(2) + " %");
					$("#percent_hiligaynon").text((hiligaynon_percent*100).toFixed(2) + " %");
					$("#percent_bikol").text((bikol_percent*100).toFixed(2) + " %");
					$("#percent_waray").text((waray_percent*100).toFixed(2) + " %");
					$("#percent_chinese").text((chinese_percent*100).toFixed(2) + " %");
					$("#percent_others").text((others_percent*100).toFixed(2) + " %");
					console.log(data);

					// frequency distribution of pie chart
					var pie_chart_canvas = document.getElementById('pie_chart_canvas').getContext('2d');
					var pie_chart = new Chart(pie_chart_canvas, {
					    type: 'pie',
					    data:  {
					        labels: ['Tagalog', 'Cebuano', 'Ilocano', 'Visayan', 'Hiligaynon', 'Bikol', 'Waray', 'Chinese Filipino', 'Others'],
					        datasets: [{
					            label: 'My First dataset',
					            backgroundColor: [	'#D50000',
					            					'#FF8A80',	
					            					'#F8BBD0',
					            					'#1261A0',
					            					'#3895D3',
					            					'#58CCED',
					            					'rgb(100, 200, 100)',
					            					'rgb(0, 255, 0)',
					            					'rgb(255, 255, 0)',],
					            data: [	tagalog_percent,
										cebuano_percent,
										ilocano_percent,
										visayan_percent,
										hiligaynon_percent,
										bikol_percent,
										waray_percent,
										chinese_percent,
										others_percent ]
					        }]
					    },
					    options: {}
					});
				}
			);
			
		});

		// input data into database
		$("#btn_input_data").click(function() {
			$("#input_frequency_distribution").removeClass("d-none");
			$("#display_frequency_distribution").addClass("d-none");
			$("#btn_input_data").addClass("d-none");
			$("#btn_delete_data").addClass("d-none");
			$("#card_display_buttons").addClass("d-none");
			$("#card_input_buttons").removeClass("d-none");
			$("#pie_chart_container").addClass("d-none");
		});

		//
		$("#cancel_button").click(function() {
			$("#input_frequency_distribution").addClass("d-none");
			$("#display_frequency_distribution").removeClass("d-none");
			$("#btn_input_data").removeClass("d-none");
			$("#btn_delete_data").removeClass("d-none");
			$("#card_display_buttons").removeClass("d-none");
			$("#card_input_buttons").addClass("d-none");
			$("#pie_chart_container").removeClass("d-none");
		});

	});
</script>

</div>
</div>

</body>
</html>