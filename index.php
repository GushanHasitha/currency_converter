<html>
<head>
<link type="text/css" rel="stylesheet" href="currency_style.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
<?php 
//print_r($_SESSION);
//die();


//session_start();  

include('test.php'); 

?>
<div id="wrapper">
<?php include('errors.php'); ?>
<div id="convert_div">
<form method="post"action="index.php">
 <input type="text" name="amount" placeholder="Enter Amount">
 <select name="convert_from">
 <option  value="">Select Currency</option>
  <option  value="LKR">Sri Lankan Rupee</option>
  <option  value="USD">US Dollar</option>
  <option  value="SGD">Singapore Dollar</option>
  <option  value="EUR">Euro</option>
  <option  value="AED">UAE Dirham</option>
 </select>
 <select name="convert_to">
 <option  value="">Select Currency</option>
  <option  value="LKR">Sri Lankan Rupee</option>
  <option  value="USD">US Dollar</option>
  <option  value="SGD">Singapore Dollar</option>
  <option  value="EUR">Euro</option>
  <option  value="AED">UAE Dirham</option>
 </select>
 <br>
 <input type="submit" name="convert_currency" value="Convert Currency">
</form>
<?php
if (isset($_SESSION['rawData'])) {
  	echo $_SESSION['rawData'];
  }
?>
</div>

<script>

$(function() {
    console.log( "ready!" );
});



</script>

</div>
</body>
</html>