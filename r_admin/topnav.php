  <div style="position: fixed; z-index: 99999">
  <div class="row" style="background-color: white; ;">
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
  <div class="container">
  <img src="../assets/logo_center.png" style="height: 60px; margin-top: 20px; margin-bottom: 20px;">
</div>
</div>
<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5"></div>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
  <img src="" style="width: 250px; margin-top: 30px; margin-left: -52px;">
</div>
</div>
<div class="topnav container" id="myTopnav" style="position: absolute;">
  <?php
    if($_SESSION['kategori'] == '0'){
   ?>
   <br>
  <a href="index.php?menu=peserta" style=;">Data Peserta</a>
  <a href="index.php?menu=detail_information" style="">Live Tracking</a>

  <?php
      }
   ?>


  <?php

    if ($_SESSION['kategori'] == '1') {

  ?>
  <a href="index.php?menu=peserta" style=;">Data Peserta</a>
  <a href="index.php?menu=hadiah" style="">Hadiah</a>
  <!-- <a href="index.php?menu=graph">Graph</a> -->
  <a href="index.php?menu=spg">SPG</a>
  <a href="index.php?menu=manage_admin" style="">Manage Admin</a>
  <a href="index.php?menu=detail_information" style="">Live Tracking</a>

  <?php
    }
  ?>

<a href="index.php?menu=logout" style="float: right;"> Log Out</a>
</div>
</div>
<div style="height: 150px;"></div>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.canvasjs-chart-credit{
  display:none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
