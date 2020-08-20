<?php
session_start();
include 'include/menu.php';
include 'classes/crud.php';
$crud = new crud();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Payement Status</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h1 align="center"><u>Check Payment Status</u></h1>
<form method="POST">
<div class="form-style-3">
<fieldset><legend>Provide Leader Whatsapp Number</legend>
<label for="field1"><span>Whatsapp No <span class="required">*</span></span><input type="tel" pattern="[6789][0-9]{9}" maxlength="10" class="input-field" name="p1_whp"  placeholder="Leader's Whatsapp Number" value=""  required=""></label>
<h5 align="center" ><input  type="submit" name="check_pmt" value="Check Status"></h5>
</fieldset>
</div>
</form>

<?php
$tm_nm = null;
$whts_no = null;
$pmt_sts = null;
$display = 'style="display: none;"';
if (isset($_POST['check_pmt']) or isset($_SESSION["whatsapp_no"])) {
	if (isset($_SESSION["whatsapp_no"])) {
		$whts_no = $_SESSION["whatsapp_no"];
	}
	else{
		$whts_no = $crud->escape_string($_POST["p1_whp"]);
	}

	 $display = null;	 
	 $row = $crud->getData("SELECT * FROM `team` WHERE `leader_whatsapp` = '$whts_no'");
	 if (!empty($row)) {
	 	$tm_nm = $row[0]["team_name"];
		 $pmt_sts = $row[0]["pmt_status"];
		 if ($pmt_sts == "APPROVED") {
		 	$pmt_sts = '<img src="img/approved.png" alt="Approved" height="150px" width="200px">';
		 }
		 else{
		 		$pmt_sts = '<img src="img/pending.png" alt="Pending" height="100px" width="200px">';
		 }
	 }
	 else{
	 	$tm_nm = '<a href="registration.php">NOT REGISTERED</a>';
		$whts_no = '<a href="registration.php">NOT REGISTERED</a>';
		$pmt_sts = '<a href="registration.php"><img src="img/click_here.jpg" alt="click_here" height="100px" width="100px"></a>';
	 }
		 
}
?>

<div align="center" <?php echo $display; ?>>


<table>
	<tr>
		<th colspan="2" align="center"><span style="font-family: Algerian; font-weight: normal;">Team Name: <span style="color: #C60DC6"><?php if (isset($tm_nm)) {echo $tm_nm;} ?></span></span></th>
	</tr>
	<tr>
		<td>Whatsapp No</td>
		<td><span style="color: #C60DC6"><?php if (isset($whts_no)) {echo $whts_no;} ?></span></td>
	</tr>
	<tr>
		<td>Payment Status</td>
		<td align="center"><?php if (isset($pmt_sts)) {echo $pmt_sts;} ?></td>
	</tr>
</table>
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
}

	h1{
		font-family: Arial; color: #015AFF
	}
	table, th ,td{
		border: 1px solid #19C62C;
		color: #FF008F;
		font-size: 20px;
	}

</style>