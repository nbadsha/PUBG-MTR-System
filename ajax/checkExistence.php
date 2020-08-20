<?php

include '../classes/crud.php';
 $obj = new crud();

$input = $_REQUEST["q"];



 $result = $obj->check_existence("team","leader_whatsapp",$input);
 if (strlen($input) < 10 or !is_numeric($input)) {
 	echo "<span style='color:red; margin-left:100px'><b>Not a valid number.</b></span>";
 }
 elseif ($result) {
 	
 	echo "<span style='color:green; margin-left:100px'><b>Whatsapp number available.</b></span>";
 }
 else{
 	echo "<span style='color:red; margin-left:100px'><b>Whatsapp number already exist.</b></span>";
 }
?>

