<?php
include '../classes/crud.php';
session_start();
$crud = new crud();
if (isset($_POST["login"])) {
	$username = $crud->escape_string($_POST["fear_username"]);
	$password = $crud->escape_string($_POST["fear_password"]);
	if (!$crud->check_existence("admin_login","username",$username) and !$crud->check_existence("admin_login","password",$password)) {
			$_SESSION["fear_admin"] = $username;
			header("Location:index.php");
		}
		else{
			header("Location:login.html");
		}
}
?>