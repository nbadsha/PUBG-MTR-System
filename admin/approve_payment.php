<?php
include 'session.php';
include 'include/menu.php';
include '../classes/crud.php';
$crud = new crud();

$row_1 = null;
$row_2 = null;
 	$row_1 = $crud->getData("SELECT * FROM team WHERE pmt_status='PENDING' ORDER BY `id` ASC");
 	$row_2 = $crud->getData("SELECT * FROM team WHERE pmt_status='APPROVED' ORDER BY `id` ASC");
?>
<!DOCTYPE html>
<html>
<head>
	<title>TEAMケFEAR Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <script type="text/javascript">
  	function confirmFunction(){
  		 return confirm("Did you receive the payment?");
  	}
  </script>
</head>
<body bgcolor="#F1ECF1">
<?php


?>
<table id="customers">
<tr>
	<th colspan="5">Payment Approved: <span style="color: yellow"><?php if(!empty($row_2)){echo count($row_2);}else{echo "NONE";} ?></span><br><br>
		Payment Pending: <span style="color: yellow"><?php if(!empty($row_1)){echo count($row_1);}else{echo "NONE";} ?></span></th>
</tr>
  <tr>
    <th>Sl.<?php  ?></th>
    <th>Team Name</th>
    <th>Whatsapp</th>
    
    <th>Action</th>
  </tr>
  <?php
  	if (!empty($row_1)) {
  		$sl = 1;
 		foreach ($row_1 as $key => $res) {
 		$time_stamp = $res["time"];
 		$time = explode(" ", $time_stamp);
 		$dt = $time[0];
 		$tm = $time[1];
 		echo '
 			<tr>
 				<td>'.$sl.'</td>
 				<td>'.$res["team_name"].'</td>
 				<td><a href="'.$res["leader_whatsapp"].'">'.$res["leader_whatsapp"].'</a></td>
 				
 				<td align="center"><a href="../include/register_action.php?approve_payment='.$res["leader_whatsapp"].'" onclick="return confirmFunction();" ><img src="img/pmt_approve.png" alt="approve" height="40px" width="100px"></a></td>
 			</tr>
 		';
    $sl++;
 		}
  	}
  	else
  	{
  		echo "<tr><td align='center' colspan='6'><span style='color:red'>No Payements are Pending.</span></td></tr>";
  	}

  ?>
</table>
</body>
</html>

<style type="text/css">
	
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
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
</style>