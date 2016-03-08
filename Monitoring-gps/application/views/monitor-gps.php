<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.6/dist/css/bootstrap.css">

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	input.readonly{
	  	background-color : yellow; 
	}

	/*#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 5px #D0D0D0;
	}*/
	</style>
</head>
<body>
	<div class="container">
		<h1>Monitoring GPS android</h1>

		<div class="jumbotron">
			<div class="col-md12">
				<div class="input-group" style="margin-bottom:5px;">
                    <span class="input-group-addon" style="background-color:#C4C9D4;min-width:250px;text-align:left;"><strong>Lattitude</strong></span>
                    <input type="text" id="lat" style="background-color:#FFFFFF; " class="form-control" value="<?php if($monitor) echo $monitor->latitude?>" readonly/>
                </div>
                <div class="input-group" style="margin-bottom:5px;">
                    <span class="input-group-addon" style="background-color:#C4C9D4;min-width:250px;text-align:left;"><strong>Longitude</strong></span>
                    <input type="text" id="long" style="background-color:#FFFFFF; " class="form-control" value="<?php if($monitor) echo $monitor->longitude?>" readonly/>
                </div>
                <div class="input-group" style="margin-bottom:5px;">
                    <span class="input-group-addon" style="background-color:#C4C9D4;min-width:250px;text-align:left;"><strong>Altitude</strong></span>
                    <input type="text" id="alt" style="background-color:#FFFFFF; " class="form-control" value="<?php if($monitor) echo $monitor->altitude?>" readonly/>
                </div>
                <div class="input-group" style="margin-bottom:5px;">
                    <span class="input-group-addon" style="background-color:#C4C9D4;min-width:250px;text-align:left;"><strong>Accuracy</strong></span>
                    <input type="text" id="acc" style="background-color:#FFFFFF; " class="form-control" value="<?php if($monitor) echo $monitor->accuracy?>" readonly/>
                </div>
			</div>
			
		</div>
		
	</div>
	

    <script src="<?php echo base_url()?>assets/jQuery-1.12.0/jquery-1.12.0.min.js"></script>    
    <script src="<?php echo base_url()?>assets/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
		function loadQuery(){
			$.ajax({
			    url: '<?php echo base_url()?>index.php/welcome/getData', 
			    dataType: 'json',
			    type:'GET',
			    success: function(data) {
			      	console.log(data);
			      	$.each(data, function(i,item){
			      		$('#lat').val(item.latitude);
			      		$('#long').val(item.longitude);
			      		$('#alt').val(item.altitude);
			      		$('#acc').val(item.accuracy);
			      	})
			    },
			    complete: function() {
			      setTimeout(loadQuery, 5000);
			    }
			});
		}

		$(document).ready(function(){
	    	setTimeout(loadQuery, 5000);
    	});

    	
    </script>

</body>
</html>