<!DOCTYPE html>
<html>
<head>
	<title>Payment Info</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
		var i = 0;
	function change() {
	  var doc = document.getElementById("random_btn_color");
	  var color = ["red", "blue", "green", "orange"];
		
	  doc.style.color= color[i];
	  i = (i + 1) % color.length;
	}
	setInterval(change, 400);
	</script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
include 'include/menu.php';
?>
<h1 align="center" style="font-family: Arial; color: #015AFF"><u>Payment Info</u></h1>
<div align="center">
	
	<a href="#" onclick='swal("Your Payment is 100% Secured!", "COMMON SERVICE CENTER at Bhatpara\ne-Governance Services India Limited", "success");'>
		<img src="img/trust.png" height="110px" style="animation: shake 1s;animation-iteration-count: infinite;" width="150px"></a>
		<a target="_blank" href="https://goo.gl/maps/V33c1pNRpWwMPsMJ8"><img src="img/maps.jpg" height="110px" style="animation: shake 2s;animation-iteration-count: infinite;" width="120px"></a>
	<table >
		<tr>
			<th colspan="2" style="color: red" align="left">
				1) **Please pay ₹50 rupees.<br>
				2) **Take a screenshot of payment.<br>
				3) **Send the screenshot to<br>
				<a target="_blank" href="tel:7699554544" style="margin-left: 15px" id="random_btn_color">Mir Kadir</a> via WhatsApp.<br>
				4) **Mention Leader WhatsApp No
			</th>
		</tr>
		<tr>
			<th colspan="2">
				Paytm <br> (COMMON SERVICE CENTER)
			</th>
		</tr>
		<tr>
			<td>
				Number
			</td>
			<td>
				8918464656
			</td>			
		</tr>
		<tr>
			<td>
				UPI ID
			</td>
			<td>
				8918464656@paytm
			</td>
		</tr>
		<tr>
			<td>
				QR Code
			</td>
			<td>
				
				<a href="img/payment_method/QR_Paytm.jpg" download=""><img src="img/payment_method/QR_Paytm.jpg" alt="8918464656" height="270px" width="250px"></a>
			</td>
		</tr>
			
		
	</table>


	
	<table >
		<tr>
			<th colspan="2">
				PhonePe <br> (Mir Kadir)
			</th>
		</tr>
		<tr>
			<td>
				Number
			</td>
			<td>
				7699554544
			</td>			
		</tr>
		<tr>
			<td>
				UPI ID
			</td>
			<td>
				mirkadir@ybl
			</td>
		</tr>
		<tr>
			<td>
				QR Code
			</td>
			<td>
				
				<a href="img/payment_method/QR_PhonePe.jpg" download=""><img src="img/payment_method/QR_PhonePe.jpg" alt="8918464656" height="270px" width="250px"></a>
			</td>
		</tr>
			
		
	</table>
	

	<table>
		<tr>
			<th colspan="2">
				Google Pay or GPay <br> (Mir Kadir)
			</th>
		</tr>
		<tr>
			<td>
				Number
			</td>
			<td>
				7699554544
			</td>			
		</tr>
		<tr>
			<td>
				UPI ID
			</td>
			<td>
				mirkdr2-1@oksbi
			</td>
		</tr>
		<tr>
			<td>
				QR Code
			</td>
			<td>
				
				<a href="img/payment_method/QR_GPay.jpg" download=""><img src="img/payment_method/QR_GPay.jpg"  alt="8918464656" height="270px" width="250px"></a>
			</td>
		</tr>
			
		
	</table>

</div>
</body>
</html>
<style type="text/css">
	h1{
		font-family: Arial; color: #015AFF
	}
	table, th ,td{
		border: 1px solid #19C62C;
		color: #FF008F;
		font-size: 20px;
	}

	@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
</style>
