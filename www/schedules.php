<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
	<h2>Schedules</h2>
	<p>
	<?php
		$connection = oci_connect($username = 'psaikia',
								  $password = 'wels@AINU14',
								  $connection_string = '//oracle.cise.ufl.edu/orcl');
		$statement = oci_parse($connection, 'SELECT T1.TEAM_NAME as TN1,T2.TEAM_NAME as TN2,G.DATETIME as DT,G.VENUE FROM GAME G, TEAM T1, TEAM T2 WHERE G.AWAYTEAM_ID = T1.TEAM_ID AND G.HOMETEAM_ID = T2.TEAM_ID');
		oci_execute($statement);

		//while (($row = oci_fetch_object($statement))) {
		//  var_dump($row);
		//}
		
		//echo "Home Team \t Away Team \t Date and time \t Venue <br>\n";
		//while (oci_fetch($statement)) {
		//	echo oci_result($statement, 'TN2'). "\t";
		//	echo oci_result($statement, 'TN1'). "\t";
		//	echo oci_result($statement, 'DT'). "\t";
		//	echo oci_result($statement, 'VENUE'). "<br>\n";
		//	//echo oci_result($stid, 'CITY') . "<br>\n";
		//}
		echo "<table border=\"1\">\n";
		echo "<tr>";
		echo "<th>Home Team</th>";
		echo "<th>Away Team</th>";
		echo "<th>Date and time</th>";
		echo "<th>Venue</th>";
		echo "</tr>\n";

		$ncols = oci_num_fields($statement);
		while (oci_fetch($statement)) {
			echo "<tr>";
			for ($i = 1; $i <= $ncols; $i++) {
				if ($i==1) $data  = oci_result($statement,'TN2');
				else if ($i==2) $data  = oci_result($statement, 'TN1');
				else if ($i==3) $data  = oci_result($statement, 'DT');
				else if ($i==4) $data  = oci_result($statement, 'VENUE');
				//$data  = oci_field_name($statement, $val);
				echo "<td>$data</td>";
				
			}
			echo "</tr>\n";
		}

		echo "</table>\n";

		//
		// VERY important to close Oracle Database Connections and free statements!
		//
		oci_free_statement($statement);
		oci_close($connection);
	?>
	</p>
</div>

<?php include("includes/footer.php");?>

</body>
</html>