<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">

function check_existence(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("message").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("message").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajax/checkExistence.php?q="+str, true);
  xhttp.send();   
}


</script>
</head>
<body >
<?php
include 'include/menu.php';
?>
<h1 align="center" style="font-family: Arial; color: #015AFF"><u>Registration Form</u></h1>

<div class="form-style-3">
<form method="POST" action="include/register_action.php">
<fieldset><legend>General Team Details</legend>
<label for="field1"><span>Team Name <span class="required">*</span></span><input type="text" class="input-field" name="team_name" value="" placeholder="Type your team name..." required="" /></label>
<label for="field1"><span>Whatsapp No <span class="required">*</span></span><input type="tel" pattern="[6789][0-9]{9}" maxlength="10" class="input-field" name="p1_whp"  placeholder="Leader's Whatsapp Number" value="" onkeyup="check_existence(this.value)" required=""></label>
<span id="message" style="font-size: 20px;"></span>
<label for="field1"><span>Leader Name <span class="required">*</span></span><input type="text" class="input-field" name="p1_name" value="" placeholder="Enter actual player name of PUBG" required="" /></label> 
<label for="field4"><span>Tournament<span class="required">*</span></span><select name="trnmnt" class="select-field">
<option value="1" selected="">15th Sep 2019</option>
</select></label>
<label for="field4"><span>Entry Fee <span class="required">*</span></span><input type="text" class="input-field" name="entry_fee" value="₹50" readonly="" /></label>
<label class="required">***Make payment after registration.</label>
<label class="required">***Add team members on the Login page.</label>

</select>

</fieldset>
<!-- <fieldset><legend>Players Information</legend> -->
<?php
/*include 'include/player_registration.php';*/
?>
<h5 align="center" ><input  type="submit" name="register" value="Register"></h5>
</fieldset>
</form>
</div>


</body>
</html>

<style type="text/css">
.form-style-3{
	width: 100%;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-3 label{
	display:block;
	margin-bottom: 10px;
}
.form-style-3 label > span{
	float: left;
	width: 100px;
	color: #F072A9;
	font-weight: bold;
	font-size: 13px;
	text-shadow: 1px 1px 1px #fff;
}
.form-style-3 fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;
	padding: 20px;
	background: #FFF4F4;
	box-shadow: inset 0px 0px 15px #FFE5E5;
	-moz-box-shadow: inset 0px 0px 15px #FFE5E5;
	-webkit-box-shadow: inset 0px 0px 15px #FFE5E5;
}
.form-style-3 fieldset legend{
	color: #FFA0C9;
	border-top: 1px solid #FFD2D2;
	border-left: 1px solid #FFD2D2;
	border-right: 1px solid #FFD2D2;
	border-radius: 5px 5px 0px 0px;
	-webkit-border-radius: 5px 5px 0px 0px;
	-moz-border-radius: 5px 5px 0px 0px;
	background: #FFF4F4;
	padding: 0px 8px 3px 8px;
	box-shadow: -0px -1px 2px #F1F1F1;
	-moz-box-shadow:-0px -1px 2px #F1F1F1;
	-webkit-box-shadow:-0px -1px 2px #F1F1F1;
	font-weight: normal;
	font-size: 12px;
}
.form-style-3 textarea{
	width:250px;
	height:100px;
}
.form-style-3 input[type=text],
.form-style-3 input[type=tel],
.form-style-3 input[type=date],
.form-style-3 input[type=datetime],
.form-style-3 input[type=number],
.form-style-3 input[type=search],
.form-style-3 input[type=time],
.form-style-3 input[type=url],
.form-style-3 input[type=email],
.form-style-3 select, 
.form-style-3 textarea{
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border: 1px solid #FFC2DC;
	outline: none;
	color: #F072A9;
	padding: 5px 8px 5px 8px;
	box-shadow: inset 1px 1px 4px #FFD5E7;
	-moz-box-shadow: inset 1px 1px 4px #FFD5E7;
	-webkit-box-shadow: inset 1px 1px 4px #FFD5E7;
	background: #FFEFF6;
	width:50%;
}
.form-style-3  input[type=submit],
.form-style-3  input[type=button]{
	background: #EB3B88;
	border: 1px solid #C94A81;
	padding: 5px 15px 5px 15px;
	color: #FFCBE2;
	box-shadow: inset -1px -1px 3px #FF62A7;
	-moz-box-shadow: inset -1px -1px 3px #FF62A7;
	-webkit-box-shadow: inset -1px -1px 3px #FF62A7;
	border-radius: 3px;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;	
	font-weight: bold;
}
.required{
	color:red;
	font-weight:normal;
}
h5:hover{
background-color: red;
color: black
}
</style>
