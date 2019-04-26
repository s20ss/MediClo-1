<?php
session_start();
if(!isset($_SESSION['userid']))
{
	header('location: LOGIN.html');
}

	
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="modalstyle.css">
  <script type="text/javascript" src="jquery-latest.js"></script> 
<script type="text/javascript" src="jquery.tablesorter.js"></script> 
 <style>
/* Full-width input fields */
input,select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 10%;
    border: none;
    cursor: pointer;
    width: 25%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}
span.time {
    float: right;
    padding-top: 16px;
}


/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 110%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 25%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
.topright {
    position: relative;
    top: 8px;
    right: 0px;
    font-size: 18px;
}
</style>

 <script type="text/javascript" src="jquery-latest.js"></script> 
<script type="text/javascript" src="jquery.tablesorter.js"></script> 
  <style type="text/css">
  @import url('http://fonts.googleapis.com/css?family=Amarante');

 div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  outline: none;
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
::selection { background: #5f74a0; color: #fff; }
::-moz-selection { background: #5f74a0; color: #fff; }
::-webkit-selection { background: #5f74a0; color: #fff; }

br { display: block; line-height: 1.6em; } 

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
ol, ul { list-style: none; }

input, textarea { 
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: none; 
}

blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
strong, b { font-weight: bold; } 

table { border-collapse: collapse; border-spacing: 0; }
img { border: 0; max-width: 100%; }




/** page structure **/
#wrapper {
  display: block;
  width: 850px;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}

#keywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
}


#keywords thead {
  cursor: pointer;
  background: #c9dff0;
}
#keywords thead tr th { 
  font-weight: bold;
  padding: 12px 30px;
  padding-left: 42px;
}
#keywords thead tr th span { 
  padding-right: 20px;
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#keywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
  background: #acc8dd;
}

#keywords thead tr th.headerSortUp span {
  background-image: url('http://i.imgur.com/SP99ZPJ.png');
}
#keywords thead tr th.headerSortDown span {
  background-image: url('http://i.imgur.com/RkA9MBo.png');
}


#keywords tbody tr { 
  color: #555;
}
#keywords tbody tr td {
  text-align: center;
  padding: 15px 10px;
}
#keywords tbody tr td.lalign {
  text-align: left;
}</style>
</head>
<body>
 <div id="wrapper">
  <h1><span style="font-size: 35px; font-color:green;"><b>PILL LOG</b></span></h1>
  
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>Pill Name</span></th>
        <th><span>Section</span></th>
        <th><span>AMOUNT</span></th>
        <th><span>DATE & TIME</span></th>
      </tr>
    </thead>
    <tbody>
	<?php
	$conn=mysqli_connect("localhost","root","","my_database");
	
		if(!$conn)
		{
			die("Connection failed: ".mysqli_connect_error($conn));
		}

		$chekc = "hello{$_SESSION['userid']}";
		$_Session["table"]=$chekc;
		$tab="SELECT * FROM {$chekc}";
				$res=mysqli_query($conn,$tab);
	while($row2=mysqli_fetch_array($res))
	{
		echo "<tr><td>{$row2['task']}</td><td>{$row2['category']}</td><td>{$row2['amount']}</td><td>{$row2['dnt']}</td></tr>";
	}
	?>
    </tbody>
  </table>
 </div>
 <a href="test.php"><button width:5%>Summary</button></a>
 <a href="test2.php"><button>Deviation from Saving plan</button></a> 
<center><a href="logout.php"> <button >Logout</button></a></center>

  <?php
  
	// Total sum of expenses
 	$total_exp="SELECT SUM(amount) AS tsum FROM {$chekc} where category!='income' ";
	$res2=mysqli_query($conn,$total_exp);
	$row1=mysqli_fetch_assoc($res2);
	$sum=$row1['tsum'];
	$_SESSION["total_exp"]=$sum;
	
	//Income expense
	if($sum>0)

	{
	$total_income="SELECT SUM(amount) AS tsumincome FROM {$chekc} where category='income' ";
	$res3=mysqli_query($conn,$total_income);
	$row3=mysqli_fetch_assoc($res3);
	$sum_income=$row3['tsumincome'];
	$_SESSION["total_income"]=$sum_income;
	$_SESSION["income_percentage"]=round(($sum_income/$sum)*360,2);
	
	//Shopping expense
	
	$total_shopping="SELECT SUM(amount) AS tsumshopping FROM {$chekc} where category='shopping' ";
	$res4=mysqli_query($conn,$total_shopping);
	$row4=mysqli_fetch_assoc($res4);
	$sum_shopping=$row4['tsumshopping'];
	$_SESSION["total_shopping"]=$sum_shopping;
	$_SESSION["shopping_percentage"]=round(($sum_shopping/$sum)*360,2);
	$_SESSION["shopping_percent"]=round(($sum_shopping/$sum)*100,2);
	
	
	// Food expense
	//

	$total_food="SELECT SUM(amount) AS tsumfood FROM {$chekc} where category='food' ";
	$res5=mysqli_query($conn,$total_food);
	$row5=mysqli_fetch_assoc($res5);
	$sum_food=$row5['tsumfood'];
	$_SESSION["total_food"]=$sum_food;
	$_SESSION["food_percentage"]=round(($sum_food/$sum)*360,2);
	$_SESSION["food_percent"]=round(($sum_food/$sum)*100,2);
	
	// Electronics expense
	
	$total_electronics="SELECT SUM(amount) AS tsumelectronics FROM {$chekc} where category='electronics' ";
	$res6=mysqli_query($conn,$total_electronics);
	$row6=mysqli_fetch_assoc($res6);
	$sum_electronics=$row6['tsumelectronics'];
	$_SESSION["total_electronics"]=$sum_electronics;
	$_SESSION["electronics_percentage"]=round(($sum_electronics/$sum)*360,2);
	$_SESSION["electronics_percent"]=round(($sum_electronics/$sum)*100,2);
	
	//Entertainment expense
	
	$total_entertainment="SELECT SUM(amount) AS tsumentertainment FROM {$chekc} where category='entertainment' ";
	$res7=mysqli_query($conn,$total_entertainment);
	$row7=mysqli_fetch_assoc($res7);
	$sum_entertainment=$row7['tsumentertainment'];
	$_SESSION["total_entertainment"]=$sum_entertainment;
	$_SESSION["entertainment_percentage"]=round(($sum_entertainment/$sum)*360,2);
	$_SESSION["entertainment_percent"]=round(($sum_entertainment/$sum)*100,2);
	
	//Travel expense
	
	$total_travel="SELECT SUM(amount) AS tsumtravel FROM {$chekc} where category='travel' ";
	$res8=mysqli_query($conn,$total_travel);
	$row8=mysqli_fetch_assoc($res8);
	$sum_travel=$row8['tsumtravel'];
	$_SESSION["total_travel"]=$sum_travel;
	$_SESSION["travel_percentage"]=round(($sum_travel/$sum)*360,2);
	$_SESSION["travel_percent"]=round(($sum_travel/$sum)*100,2);
	
	// Household expense
	
	$total_household="SELECT SUM(amount) AS tsumhousehold FROM {$chekc} where category='household' ";
	$res9=mysqli_query($conn,$total_household);
	$row9=mysqli_fetch_assoc($res9);
	$sum_household=$row9['tsumhousehold'];
	$_SESSION["total_household"]=$sum_household;
	$_SESSION["household_percentage"]=round(($sum_household/$sum)*360,2);
	$_SESSION["household_percent"]=round(($sum_household/$sum)*100,2);
	
	// Accomodation Expense
	
	$total_accommodation="SELECT SUM(amount) AS tsumaccommodation FROM {$chekc} where category='accommodation' ";
	$res10=mysqli_query($conn,$total_accommodation);
	$row10=mysqli_fetch_assoc($res10);
	$sum_accommodation=$row10['tsumaccommodation'];
	$_SESSION["total_accommodation"]=$sum_accommodation;
	$_SESSION["accommodation_percentage"]=round(($sum_accommodation/$sum)*360,2);
	$_SESSION["accommodation_percent"]=round(($sum_accommodation/$sum)*100,2);
	
	// Insuarance Expense

	$total_insurance="SELECT SUM(amount) AS tsuminsurance FROM {$chekc} where category='insurance' ";
	$res11=mysqli_query($conn,$total_insurance);
	$row11=mysqli_fetch_assoc($res11);
	$sum_insurance=$row11['tsuminsurance'];
	$_SESSION["total_insurance"]=$sum_insurance;
	$_SESSION["insurance_percentage"]=round(($sum_insurance/$sum)*360,2);
	$_SESSION["insurance_percent"]=round(($sum_insurance/$sum)*100,2);
	
	// Bank & Finances Expenses
	
	$total_bank="SELECT SUM(amount) AS tsumbank FROM {$chekc} where category='bank & finances' ";
	$res12=mysqli_query($conn,$total_bank);
	$row12=mysqli_fetch_assoc($res12);
	$sum_bank=$row12['tsumbank'];
	$_SESSION["total_bank"]=$sum_bank;
	$_SESSION["bank_percentage"]=round(($sum_bank/$sum)*360,2);
	$_SESSION["bank_percent"]=round(($sum_bank/$sum)*100,2);
	}
?>
 <script type="text/javascript">
 $(function(){
  $('#keywords').tablesorter(); 
});</script>
<link rel="stylesheet" type="text/css" href="icons.css" >

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<i class="material-icons" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">add</i>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="modal.php" method="POST">
    <!--<div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>-->

    <div class="container">
	<label><b>Pill Name</b></label>
		<input type="text" placeholder="Enter_name" name="task" required>
      <label><b>Amount</b></label>
		
	  
      <input type="Number" placeholder="Enter Amount" name="amt" required>

      <label><b>Section</b></label>
      <select placeholder="Section" name="category">
      <option value="1" >Section 1</option>
	  <option value="2" >Section 2</option>
	  <option value="3" >Section 3</option>
	  <option value="4" >Section 4</option>
	  <option value="5" >Section 5</option>
	  <option value="6" >Section 6</option>
	  <option value="7" >Section 7</option>
	  <option value="8" >Section 8</option>
	  <option value="9" >Section 9</option>
      </select>



      <label><b>Time</b></label><br />
      <input type="time"	  placeholder="Enter Time" name="time" required>
        
      <button type="submit">Add</button>
      <button type="reset">Reset</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>



<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>