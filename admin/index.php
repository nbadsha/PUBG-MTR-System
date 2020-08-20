<?php
include 'session.php';
include '../classes/crud.php';
$num_of_teams = null;
$team_1 = null;
$crud = new crud();
$empty_table = null;
$row_1 = $crud->getData("SELECT * FROM team ORDER BY `id` ASC");
if (!empty($row_1)) {
	$num_of_teams = count($row_1);
	$team_1 = $row_1[0]["id"];
  $team_1_name = $row_1[0]["team_name"];
	$players_team1 = $crud->getData("SELECT * FROM `players` WHERE team_id = '$team_1' ORDER BY `id` ASC");
}
else{
	$empty_table = "<tr><td align='center' colspan='6'><span style='color:red'>No Record Found</span></td></tr>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>TEAMケFEAR Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	 <script type="text/javascript">
  	function confirmFunction(){
  		 return confirm("Do you really want to delete?");
  	}
  </script>
</head>
<body bgcolor="#F1ECF1">
<?php
include 'include/menu.php';
?>
<div>
	<form action="include/register_action.php">
	<table id="customers">
<tr>
	<th colspan="6">Total Teams: <?php if(!empty($num_of_teams)){echo $num_of_teams;} ?></th>
</tr>
<tr>
	<th colspan="6" align="center"><?php if(!empty($team_1)){echo 'Team No: 1<br>Team Name: '.$team_1_name;} ?></th>
</tr>
  <tr>
    <th>Sl.<?php  ?></th>
    <th>Game Name</th>
    <th>Whatsapp</th>    
    <th>Time</th>
    <th>Action</th>
  </tr>
  
  	<?php
  	if (isset($empty_table)) {
  		echo $empty_table;
  	}
  	if (!empty($team_1)) {
  		$sl = 0;
  		foreach ($players_team1 as $key => $res) {
  		$gm_name = $res["game_name"];
 		$whp_no = $res["whatsapp_no"];
 		$designation = $res["designation"];
 		$time = $res["time"];
 		$time = explode(" ", $time);
 		$date = $time[0];
 		$tm = $time[1];
 		$sl++;
 		echo "<tr>
			    <td>$sl</td>
			    <td>$gm_name</td>
			    <td><a href='tel:$whp_no'>$whp_no</a></td>			    
			    <td>$date<br>$tm</td>";
		if ($sl == 1) {
			echo '<td align="center"><a href="../include/register_action.php?delete_team='.$whp_no.'/'.$team_1.' " onclick="return confirmFunction();" ><img src="../img/delete.png" alt="delete" height="50px" width="50px"></a></td>
			    </tr>';
		}
		else{
			echo '<td align="center"><img src="../img/delete.png" alt="delete" height="50px" width="50px"></td></tr>';
		}
			    
  		}
  	}
  	if (isset($num_of_teams)) {  
  			$skip_row = 1;
  		foreach ($row_1 as $key_1 => $res_1) {
  				$new_sl = 1;
  				if ($skip_row > 1) {
  					$t_id = $res_1["id"];
            $t_name = $res_1["team_name"];
  				  echo '<tr>
  						<th colspan="6" align="center">Team No:'.$skip_row.'<br>Team Name: '.$t_name.'</th>
  					</tr>';
  					$row_2 = $crud->getData("SELECT * FROM `players` WHERE team_id = '$t_id' ORDER BY `id` ASC");
  					foreach ($row_2 as $key_2 => $res_2) {
  						$new_time = $res_2["time"];
  						$new_time = explode(" ", $new_time);
  						$dt = $new_time[0];
  						$tm = $new_time[1];
  						echo '
  							<tr>
  								<td>'.$new_sl.'</td>
  								<td>'.$res_2["game_name"].'</td>
  								<td><a href="tel:'.$res_2["whatsapp_no"].'">'.$res_2["whatsapp_no"].'</a></td>
  								
  								<td>'.$dt.'<br>'.$tm.'</td>';
  								
			  			if ($new_sl == 1) {
						echo '<td align="center"><a href="../include/register_action.php?delete_team='.$res_2["whatsapp_no"].'/'.$t_id.' " onclick="return confirmFunction();" ><img src="../img/delete.png" alt="delete" height="50px" width="50px"></a></td>
						    </tr>';
					}
					else{
						echo '<td align="center"><img src="../img/delete.png" alt="delete" height="50px" width="50px"></td></tr>';
					}
  						$new_sl++;
  					}
  				}
  			$skip_row++;
  		}

  	}
  	?>
  	

</table>
</div>
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