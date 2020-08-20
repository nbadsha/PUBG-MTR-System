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
</head>
<body bgcolor="#F1ECF1">
<?php


?>
<table id="customers">
<tr>
	<th colspan="5">Payment Pending: <span style="color: yellow"><?php if(!empty($row_1)){echo count($row_1);}else{echo "NONE";} ?></span><br><br>
		Payment Approved: <span style="color: yellow"><?php if(!empty($row_2)){echo count($row_2);}else{echo "NONE";} ?></span></th>
</tr>
  <tr>
    <th>Sl.<?php  ?></th>
    <th>TM Name</th>
    <th>GM Name</th>
    <th>Whatsapp</th>
    <th>Amount</th>
    
  </tr>
  <?php
  	if (!empty($row_2)) {
  		$sl = 1;
  		$total_amount = array();
 		foreach ($row_2 as $key => $res) {
 		array_push($total_amount, $res["pmt_amount"]);
 		echo '
 			<tr>
 				<td>'.$sl.'</td>
 				<td>'.$res["team_name"].'</td>
        <td>'.$res["leader_name"].'</td>
 				<td><a href="tel:'.$res["leader_whatsapp"].'">'.$res["leader_whatsapp"].'</a></td>
 				<td align="center">'.$res["pmt_amount"].'</td> 				
 			</tr>
 		';
    $sl++;

 		}
 		echo "<tr><th colspan='5'>Total Amount Received: <span style='color: yellow'>₹".array_sum($total_amount)."</span></th></tr>";
  	}
  	else
  	{
  		echo "<tr><td align='center' colspan='6'><span style='color:red'>Nobody mades payment.</span></td></tr>";
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