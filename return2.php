<?php
session_start();
include('api/common.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--
   <link rel="stylesheet/less" type="text/css" href="css/style.less">
  <script src="js/less.js" type="text/javascript"></script>
  -->
</head>
<body>
	<?php
		$username = $_SESSION['username'];
		$cartItems = $_SESSION['cartItems'];
		$returnedMovie = $_POST['return'];
		
		#login to database
		dbLogin();
		dbSelect();
		
		#construct write
		$write = "UPDATE transactions SET statusReturn='Y' WHERE
		$username = users.username and
		users.username = users.userID and
		users.userID = transactions.userID and
		transactions.statusReturn = 'N'";
	
		#write to db
		$write_result = mysql_query($write);
	
		#if result object is not returned, then print an error and exit the PHP program
		if(! $write_result){
			print("Error - query could not be executed");
			$error = mysql_error();
			print "<p> . $error . </p>";
			exit;
		}			
	?>
  <div class="header">
    <div class="navbar">
      <span class="logo">Graybox powered by RentalVideo&copy;</span>
      <div class="quick_links">
        <span>Home</span><span>New Releases</span><span>Movies</span><span>TV Shows</span>
      </div>
    </div>
    <div class="statusbar">
      <div class="locationbox">
        <span>Locations</span>
      </div>
      <div class="statusboxes">
        <div class="userbox">
          <span class="username">Welcome <?php $username?></span>
        </div>
        <div class="cartbox">
          <img src="img/shopping_cart.png" height="16px" width="16px"/> My Cart&nbsp;
          <span class="items_in_cart"><?php $cartItems ?></span>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="title"><h1>Return Movies<h1></div>
	<h3>Please print this page to include with your movie(s).</h3>
	<div class="return_page">
	  <table id="t01">
	    <tr><td>Customer ID:</td><td><?php $username ?></td></tr>
		<tr><td>Movie ID:</td><td><?php $returnedMovie ?></td></tr>
	  </table>
    </div>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
</body>
</html>
