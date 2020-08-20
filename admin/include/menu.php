
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
.focus {
  color: red;
}
</style>

<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$ary = explode("/", $actual_link);
$url = end($ary);

$cls1 = NULL;
$cls2 = NULL;
$cls3 = NULL;
$cls4 = NULL;
$cls5 = NULL;
$cls6 = NULL;

switch ($url) {
    case "index.php":
        $cls1 = "class='active'";
        break;
    case "approve_payment.php":
        $cls2 = "class='active'";
        break;
    case "view_payments.php":
        $cls3 = "class='active'";
        break;
    case "payment_info.php":
        $cls4 = "class='active'";
        break;
    case "login.php":
        $cls5 = "class='active'";
        break;
    case "trnmnt.php":
        $cls6 = "class='active'";
        break;
}

?>

<div class="topnav" id="myTopnav">
      <a href="index.php" <?php if (!is_null($cls1)) { echo $cls1;}?> >Team List</a>
      <a href="approve_payment.php" <?php if (!is_null($cls2)) { echo $cls2;}?> >Payment Approval</a>
      <!-- <?php
      if (is_null($cls5)) { ?>
         <a href="#" <?php if (!is_null($cls2)) { echo $cls2;}?> >Payment Approval</a>
        <?php
      }
      ?> -->
           
           <a href="view_payments.php" <?php if (!is_null($cls3)) { echo $cls3;}?> >View Payments</a>           
           <!-- <a href="#" <?php if (!is_null($cls5)) { echo $cls5;}?> >Login</a> -->
           <a href="logout.php" <?php if (!is_null($cls6)) { echo $cls6;}?> >Logout</a>
           
    <a href="javascript:void(0);" class="icon" onclick="mymenu()">
    <i class="fa fa-bars"></i>
  </a>
</div>


<script>
function mymenu() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}




</script>


