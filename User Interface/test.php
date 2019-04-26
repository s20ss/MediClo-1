<?php
session_start();

?>
<!doctype html>

<html>

<head>



    <title>Doughnut Chart</title>
    <script src="
    Chart.bundle.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    .bottomleft {
    position: absolute;
    bottom: 40%;
    left: 20%;
    font-size: 18px;
}
.bottomright {
    position: absolute;
    bottom: 40%;
    right: 20%;
    font-size: 18px;
}

.center {
    position: absolute;

    left: 0;
    top: 50%;
    width: 100%;
    text-align: center;
    font-size: 18px;
}

    </style>
</head>

<body >
<center>
    <div id="canvas-holder" style="width:45%">
        <canvas id="chart-area" />
    </div>
   </center>
  <input type="hidden" id="101" value="<?php echo $_SESSION['shopping_percentage']?>" />
    <input type="hidden" id="102" value="<?php echo $_SESSION['food_percentage']?>" />
	<input type="hidden" id="103" value="<?php echo $_SESSION['household_percentage']?>" />
	<input type="hidden" id="104" value="<?php echo $_SESSION['electronics_percentage']?>" />
	<input type="hidden" id="105" value="<?php echo $_SESSION['entertainment_percentage']?>" />
	<input type="hidden" id="106" value="<?php echo $_SESSION['travel_percentage']?>" />
	<input type="hidden" id="107" value="<?php echo $_SESSION['insurance_percentage']?>" />
	<input type="hidden" id="108" value="<?php echo $_SESSION['accommodation_percentage']?>" />
	<input type="hidden" id="109" value="<?php echo $_SESSION['bank_percentage']?>" />
	<script>
	
	
	var das = [
				 document.getElementById("101").value,document.getElementById("102").value,document.getElementById("103").value,document.getElementById("104").value,document.getElementById("105").value,document.getElementById("106").value,document.getElementById("107").value,document.getElementById("108").value,document.getElementById("109").value
                   
				   
               ];
			   
	
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
    var randomColorFactor = function() {
        return Math.round(Math.random() * 255);
    };
    var randomColor = function(opacity) {
        return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
    };

    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: das ,
                backgroundColor: [
                    "#F7464A",
                    "#46BFBD",
                    "#FDB45C",
                    "#949FB1",
                    "#4D5360",
                     "#46BFBD",
                    "#FDB45C",
                    "#949FB1",
                    "#4D5360"
                  
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Shopping",
                "Food",
                "Household",
                "Electronics",
                "Entertainment",
                "Travel",
                "Insurance",
                "Accomodation",
                "Bank and Finances"            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Doughnut Chart'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myDoughnut = new Chart(ctx, config);
    };





    
    </script>
<div class="bottomleft">Total Income:<br><?php echo $_SESSION["total_income"]; ?></div>
<div class="bottomright">Total Expenditure:<br><?php echo $_SESSION["total_exp"]; ?></div>
<div class="center">Total Saving:<br><?php echo ($_SESSION["total_income"]- $_SESSION["total_exp"]); ?></div>
</body>

</html>
