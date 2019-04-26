<?php
session_start();
if(!isset($_SESSION['userid']))
{
	header('location: LOGIN.html');
}
?>
<!doctype html>
<html>

<head>
    <title>Radar Chart</title>
    <script src="Chart.bundle.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>
<?php

$conn=mysqli_connect("localhost","root","","my_database");
	
		if(!$conn)
		{
			die("Connection failed: ".mysqli_connect_error($conn));
		}
		$saving=$_SESSION["saving"];
$sql="SELECT * FROM saving_plan WHERE type='$saving'";
$result=mysqli_query($conn,$sql);
$res=mysqli_fetch_assoc($result);

?>
<body>
    <div style="width:100%" style="
    color:#ffffff;">
        <canvas id="canvas"></canvas>
    </div>
    <input type="hidden" id="101" value="<?php echo $_SESSION['shopping_percent']?>" />
    <input type="hidden" id="102" value="<?php echo $_SESSION['food_percent']?>" />
	<input type="hidden" id="103" value="<?php echo $_SESSION['household_percent']?>" />
	<input type="hidden" id="104" value="<?php echo $_SESSION['electronics_percent']?>" />
	<input type="hidden" id="105" value="<?php echo $_SESSION['entertainment_percent']?>" />
	<input type="hidden" id="106" value="<?php echo $_SESSION['travel_percent']?>" />
	<input type="hidden" id="107" value="<?php echo $_SESSION['insurance_percent']?>" />
	<input type="hidden" id="108" value="<?php echo $_SESSION['accommodation_percent']?>" />
	<input type="hidden" id="109" value="<?php echo $_SESSION['bank_percent']?>" />
	
	/*Fetching saving plan data*/
	
	<input type="hidden" id="111" value="<?php echo $res['shopping']?>" />
    <input type="hidden" id="112" value="<?php echo $res['food']?>" />
	<input type="hidden" id="113" value="<?php $res['household']?>" />
	<input type="hidden" id="114" value="<?php echo $res['electronics']?>" />
	<input type="hidden" id="115" value="<?php echo $res['entertainment']?>" />
	<input type="hidden" id="116" value="<?php echo $res['travel']?>" />
	<input type="hidden" id="117" value="<?php echo $res['insurance']?>" />
	<input type="hidden" id="118" value="<?php echo $res['accommodation']?>" />
	<input type="hidden" id="119" value="<?php echo $res['bank']?>" />
    <script>
	var das = [
				 document.getElementById("101").value,document.getElementById("102").value,document.getElementById("103").value,document.getElementById("104").value,document.getElementById("105").value,document.getElementById("106").value,document.getElementById("107").value,document.getElementById("108").value,document.getElementById("109").value
                   
				   
               ];
	var asd=[document.getElementById("111").value,document.getElementById("112").value,document.getElementById("113").value,document.getElementById("114").value,document.getElementById("115").value,document.getElementById("116").value,document.getElementById("117").value,document.getElementById("118").value,document.getElementById("119").value
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
        type: 'radar',
        data: {
           labels: [
                "Shopping",
                "Food",
                "Household",
                "Electronics",
                "Entertainment",
                "Travel",
                "Insurance",
                "Accomodation",
                "Bank and Finances"            ],
            datasets: [{
                label: "Expenditure",
                borderColor: 'rgb(255, 0, 0,0.6)',
                backgroundColor: "rgba(220,0,0,0.6)",
                pointBackgroundColor: "rgba(220,220,220,1)",
                data: das
            },  {
                label: "As per Saving Plan",
                backgroundColor: "rgba(0,220,0,0.4)",
                pointBackgroundColor: "rgba(151,187,205,1)",
                pointHoverBackgroundColor: "#fff",
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
            },]
        },
        options: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Radar Chart'
            },
            scale: {
              reverse: false,
              gridLines: {
                color: ['black', 'red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet']
              },
              ticks: {
                beginAtZero: true
              }
            }
        }
    };

    window.onload = function() {
        window.myRadar = new Chart(document.getElementById("canvas"), config);
    };

    </script>
</body>

</html>
