<?php
session_start();
include('api/common.php');

dbLogin();
dbSelect();

$iName = 'iName';
$iDescription = 'iDescription';
$releaseDate = 'releaseDate';
$price = 'price';

$sql = mysql_query("SELECT DISTINCT * FROM inventory;");
?>

<table id='display' border="1" style="width:100%"> 
    <?php 
        while($rows = mysql_fetch_array($sql)) { 
    ?>
       <tr>
           <td><?php echo $rows[$iName]; ?></td>
           <td><?php echo $rows[$iDescription]; ?></td>
           <td><?php echo $rows[$releaseDate]; ?></td>
           <td><?php echo $rows[$price]; ?></td>
    </tr>
     <?php   
        } 
     ?> 
 </table>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!--
   <link rel="stylesheet/less" type="tet/css" href="css/style.less">
  <script src="js/less.js" type="text/javascript"></script>
  -->
</head>
<body>
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
          <span class="username">Welcome cnieva</span>
        </div>
        <div class="cartbox">
          <img src="img/shopping_cart.png" height="16px" width="16px"/> My Cart&nbsp;
          <span class="items_in_cart">1</span>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="title"><h1>New Releases<h1></div>
    <div class="new_releases_page">
 
    <p>
      <a href="checkout1.html">Ready to checkout?</a>
    </p>
    <p>
      <a href="return.html">Ready to return your movie?</a>
    </p>
  </div>
  <div class="footer">
    <span>&copy; 2015 Team Zero Two Point Oh</span>
  </div>
</body>
</html>
