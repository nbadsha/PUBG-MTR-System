<?php
session_start();
include 'classes/crud.php';
$off_display = null;
$on_display = "style='display:none'";

$crud = new crud();

if (isset($_POST["login"]) or isset($_SESSION["whatsapp_no"])) {
	if (isset($_SESSION["whatsapp_no"])) {
		$whp_no = $_SESSION["whatsapp_no"];
	}
	else{
		$whp_no = $crud->escape_string($_POST["p1_whp"]);
	}
	
	$row_1 = $crud->getData("SELECT * FROM `team` WHERE `leader_whatsapp` = '$whp_no'");
	
	if (!empty($row_1)) {
		$off_display = "style='display:none'";
		$on_display = "style=''";
		$tm_id = $row_1[0]["id"];
		$_SESSION["whatsapp_no"] = $whp_no;
		$row_2 = $crud->getData("SELECT * FROM `players` WHERE team_id = '$tm_id' ORDER BY `id` ASC");
	}
	else{
		echo "<script>alert('Mobile number not found..!!')</script>";
	}


	

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	function confirmFunction(){
  		 return confirm("Do you really want to delete?");
  	}
  	function msgShow() {
  		if (window.confirm('To delete your team please contact 8918464656.')) 
		{
		window.location.href='tel:8918464656';
		};
  	}
  </script>
</head>
<body>
<?php
include 'include/menu.php';
?>
<h1 align="center" style="font-family: Arial; color: #015AFF"><u> <?php if (isset($_POST["login"]) or isset($_SESSION["whatsapp_no"])) {echo "Profile Page";}else{echo "Login Form";} ?> </u><span style="float: right;margin-right:"><a href="logout.php">Logout</a></span></h1>
<div class="form-style-3" <?php if (isset($off_display)) {echo $off_display;}?>>
<form method="POST">

<fieldset><legend>Provide Leader Whatsapp Number</legend>
<label for="field1"><span>Whatsapp No <span class="required">*</span></span><input type="tel" pattern="[6789][0-9]{9}" maxlength="10" class="input-field" name="p1_whp"  placeholder="Leader's Whatsapp Number" value=""  required=""></label>
<h5 align="center" ><input  type="submit" name="login" value="Login"></h5>
<h2 align="center">Not Registered <a href="registration.php">click here</a></h2>
</fieldset>
</form>
</div>

<div <?php if (isset($on_display)) {echo $on_display;} ?> align="center">
	<form action="include/register_action.php">
	<table id="customers">
<tr>
	<th colspan="5" align="center">TEAM NAME: <span style="color: #C60DC6"><?php if(!empty($row_1)){echo $row_1[0]["team_name"];} ?></span></th>
</tr>
  <tr>
   
    <th>Player Name</th>
    <th>Whatsapp</th>    
    <th>Action</th>
  </tr>
 <?php
 	if (!empty($row_1)) {
 		$sl = 1;
 	foreach ($row_2 as $key => $res) {

 		$gm_name = $res["game_name"];
 		$whp_no = $res["whatsapp_no"];
 		$designation = $res["designation"];
 		echo "
			<tr>
			    
			    <td>$gm_name<br>(<span style='color:#C60DC6;'>$designation</span>)</td>
			    <td>$whp_no</td>";
			    //you can't delete the leader at number 1
			if ($sl == 1) {
				echo '<td align="center"><a href="#" onclick="return msgShow()"><img src="img/delete.png" alt="delete" height="40px" width="40px"></a></td></tr>';
			}
			else{
				echo '<td align="center"><a href="include/register_action.php?whp='.$whp_no.' " onclick="return confirmFunction();" ><img src="img/delete.png" alt="delete" height="40px" width="40px"></a></td></tr>';
			}

 		
 		$sl++;
 	}
 	}
 ?>
  </form>
</table><br>

<?php
if ($sl<5) {
	echo '<a href="#" data-toggle="modal" data-target="#myModal"><img src="img/add.png" style="animation: shake 0.8s;animation-iteration-count: infinite;" height="100px" alt="add_player" width="100px"></a>';
}
?>


<!-- Adding more players with modal form -->


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #FF9933">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add your friend.</h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="include/register_action.php">
        	<input type="hidden" name="team_name" value="<?php if(!empty($row_1)){echo $row_1[0]["id"];} ?>"/>        	
	        <table border="2px solid black">
	          	<tr>
	          		<td>
	          			Player Name
	          		</td>
	          		<td>
	          			<input type="text" class="input-field"  name="game_name" value="" placeholder="Actual player name of PUBG" required="" />
	          		</td>
	          	</tr>
	          	<tr>
	          		<td>
	          			WhatsApp Number
	          		</td>
	          		<td>
	          			<input type="tel"  pattern="[6789][0-9]{9}" maxlength="10" class="input-field" name="whp_num"  placeholder="Player's Whatsapp Number" value="" required="">
	          		</td>
	          	</tr>
	          	<tr>
	          		<td colspan="2" align="right"><input type="submit" name="add_player" value="Add your friend"></td>
	          	</tr>
	        </table>
        </form>
          
        </div>
        <div class="modal-footer" style="background-color: #138808">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

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

#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
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