<?php
include_once("../classes/crud.php");
session_start();
$crud = new crud();
$html1 = "";
$html2 = "";

if (isset($_POST["register"])) {
	$tm_name 		= $crud->escape_string($_POST["team_name"]);
	$whatspp_no 	= $crud->escape_string($_POST["p1_whp"]);
	$game_name 		= $crud->escape_string($_POST["p1_name"]);
	$tournament		= $crud->escape_string($_POST["trnmnt"]);
	$entry_fee 		= $crud->escape_string($_POST["entry_fee"]);

	$tm_name = strval( $tm_name );
	$whatspp_no = strval($whatspp_no);
	$game_name = strval($game_name);
	$tournament = strval($tournament);
	$entry_fee = 50;
	

	if($crud->check_existence("team","leader_whatsapp",$whatspp_no) and $crud->check_existence("team","team_name",$tm_name)){
		if ($crud->execute("CALL `add_team_leader`('$tm_name','$game_name','$whatspp_no','$tournament','$entry_fee')")) {
			$_SESSION["whatsapp_no"] = $whatspp_no;
			$html1 = "<h1 align='center'>Registration Successful!!!</h1>";
			header("Location:../login.php");
		}
	}
	else{
		$html1 = "<h1 align='center'>Already Registered!!!</h1>";
		$html2 = "<br/><h1 align='center'><a href='javascript:self.history.back();'>$game_name Go Back</a></h1>";
	}

}
elseif (isset($_POST["add_player"])) {
	$game_name 		= $crud->escape_string($_POST["game_name"]);
	$whatspp_no 	= $crud->escape_string($_POST["whp_num"]);
	$tm_name 		= $crud->escape_string($_POST["team_name"]);

		if(
			//conditions for adding a player
			$crud->check_existence("team","leader_whatsapp",$whatspp_no) and 
			$crud->check_existence("team","leader_name",$game_name) and 
			$crud->check_existence("players","whatsapp_no",$whatspp_no)	and
			$crud->check_existence("players","game_name",$game_name)
		)
		{
			
			if ($crud->execute("CALL add_player('$game_name','$whatspp_no','$tm_name')")) {
				
				$html1 = "<h1 align='center'>Registration Successful!!!</h1>";
				header("Location:../login.php");
			}
			
		}
		else{
				$html1 = "<h1 align='center'>Already Registered!!!</h1>";
				$html2 = "<br/><h1 align='center'><a href='javascript:self.history.back();'>$game_name Go Back</a></h1>";
		}
}
elseif (isset($_GET["whp"])) {
		$whp_num = $crud->escape_string($_GET["whp"]);	
		if ($crud->execute("DELETE FROM `players` WHERE `players`.`whatsapp_no` = '$whp_num'")) {
				$html1 = "<h1 align='center'>Delete Successful!!!</h1>";
				header("Location:../login.php");
			}
			else{
				$html1 = "<h1 align='center'>Delete unSuccessful!!!</h1>";
				$html2 = "<br/><h1 align='center'><a href='javascript:self.history.back();'>Go Back</a></h1>";
			}
	
}


elseif (isset($_GET['delete_team'])) {
	if ($crud->checkPrivilege($_SESSION["fear_admin"]) > 0) {
		$delete_id = $crud->escape_string($_GET['delete_team']);
	$delete_id = explode("/", $delete_id);
	$tm = $delete_id[1];
	$wh = $delete_id[0];
	if (
		$crud->execute("DELETE FROM `players` WHERE `players`.`team_id` = '$tm'") and 
		$crud->execute("DELETE FROM `team` WHERE `team`.`leader_whatsapp` = '$wh'")
		) {
		header("Location:../admin/index.php");
	}
		
	}
	else{
				$html1 = "<h1 align='center' style='color:red'>You are not authorized to delete Team!!!</h1>";
				$html2 = "<br/><h1 align='center'><a href='javascript:self.history.back();'>Go Back</a></h1>";
	}
}


elseif (isset($_GET["approve_payment"])) {
	if (isset($_SESSION["fear_admin"])) {
		if ($_SESSION["fear_admin"] == "mirkdr") {
			$approve_id = $crud->escape_string($_GET["approve_payment"]);
			if ($crud->execute("UPDATE `team` SET `pmt_status` = 'APPROVED' WHERE `team`.`leader_whatsapp` = '$approve_id';")) {
				header("Location:../admin/approve_payment.php");
			}
		}
		else{
				$html1 = "<h1 align='center' style='color:red'>You are not authorized to approve payment!!!</h1>";
				$html2 = "<br/><h1 align='center'><a href='javascript:self.history.back();'>Go Back</a></h1>";
		}
		
		
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Register</title>
</head>
<body>
<?php

echo $html1;
echo $html2;
$rs = $crud->getData("SELECT * FROM players WHERE team_id = 20");
echo "<pre>";
print_r($rs);

$variable = utf8_encode($rs[0]["game_name"]);
$variable2 = htmlspecialchars_decode($rs[0]["game_name"]);
echo $variable;
echo "<br>".$variable2;
?>


</body>
</html>