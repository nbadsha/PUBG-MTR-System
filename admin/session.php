<?php
session_start();
if (!isset($_SESSION["fear_admin"])) {
	header("Location:login.html");
}
else{
	
}
?>