<?php
include 'classes/crud.php';
$crud = new crud();
$row_1 = $crud->getData("SELECT * FROM `visitors` WHERE id=1");
$visitors = $row_1[0]["visit"];
$new_visitor = $visitors+1;
$crud->execute("UPDATE `visitors` SET `visit` = '$new_visitor' WHERE `visitors`.`id` = 1;");
?>
<!DOCTYPE html>
<html>
<head>
	<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 40px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 10px;
  cursor: pointer;
  border-radius: 12px;
}

.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */ 
.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
.button5 {background-color: #555555;} /* Black */

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: red;
   color: white;
   text-align: center;
}

.info{
	height: 100px;
	width: 100%;
	background-color: #FFFFFF;
	font-size: 15px;
	color: white;
}
.info1{
	height: 50px;
	width: 100%;
	background-color: #0FFF00;
	font-size: 15px;
	
	color: #F43737;
}

audio{
	display: none;
}
</style>
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">	

	<script type="text/javascript">
		
		var audio = new Audio("music/pubg.mp3");
		audio.play();
		
	var i = 0;
	function change() {
	  var doc = document.getElementById("random_btn_color");
	  var color = ["red", "blue", "green", "yellow"];
		if (color[i]=="yellow") {
			doc.style.color = "black"
			
		} else{
			doc.style.color = "white"
			
		}
	  doc.style.backgroundColor = color[i];
	  i = (i + 1) % color.length;
	}
	setInterval(change, 400);

	</script>

</head>
<body bgcolor="#400A70">
	
<!-- <audio controls autoplay>
  <source src="music/pubg.mp3" type="audio/mp3">
</audio> -->


<h1 style="font-family: Times New Roman;text-align: center; color: #DCFF00">PUBG TOURNAMENT<br>REGISTRATION SYSTEM<br><span style="font-family: Algerian;font-weight: normal; color: #00FF93"><u><span style="color: #FF9933">Organised</span> <span style="color: #FF9933;">By</span> <span style="color: #FF9933"> <a href="admin/login.html" style="color: #FF9933"> TEAMケFEAR</a></span></u></span></h1>



<div class="info">
	<div style="float: left;background-color: #FF9933;padding: 5px;width: 40%; height: 80%"><h3 align="center"><br><b></b></h3>
	</div>
	<div style="float: right; background-color: #138808;padding: 5px;width: 38%; height: 80%"><h3 align="center"><br><b></b></h3></div>
</div>


	<img  src="img/PUBG.jpg" alt="PUBG" align="middle" height="100%" width="100%">
<div align="center" style="margin-bottom: 70px">
	<h2 style="font-family: Times New Roman;text-align: center; color: yellow;text-shadow: 1px 1px black; text-decoration: none;font-size: 30px">|BeTheケFEAR ON| <br>15th Sep 2019</h2>
	<a class="button button2" href="trnmnt.php">Tournament info</a><br>
	<a class="button button2" id="random_btn_color" href="registration.php">Register</a>
	<a class="button button3" href="payment_status.php">Payment Status</a>
	<a class="button button2" href="payment_info.php">Payment info</a>
	<a class="button button3" href="login.php">Lobby</a><br>


	<h1 style="margin-top: 20px;font-size: 30px; color: white">Contact Us<br>|<a style="color: #00FF93" href="tel:7699554544">7699554544</a>||<a style="color: #00FF93" href="tel:7699429198">7699429198</a>|<br><br>		
		<a target="_blank" href="https://chat.whatsapp.com/CH14UmXelRq4uoaUZhXplR"><img src="img/whatsapp.png" height="100px" width="100px"></a>
		<a target="_blank" href="https://www.facebook.com/bhatpara1/"><img src="img/facebook.png" height="100px" width="100px"></a>
		<a target="_blank" href="https://t.me/PUBGTeamFEAR"><img src="img/telegram.png" height="100px" width="100px"></a><br><br>
		<img src="img/payment-method.png" alt="payment-method"><br>
		<span>Total Visitors: <?php echo $new_visitor; ?></span>
	</h1>

</div>


<div class="footer">  
  <p style="font-size: 20px">© ASMA_OASIS Technology Solutions</p>
</div>

</body>
</html>

