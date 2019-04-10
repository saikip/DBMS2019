<?php include("includes/a_config.php");?>
<?php include("includes/connectionSettings.php");?>
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
		$statement = oci_parse($connection, 'SELECT T1.TEAM_NAME as TN1,T2.TEAM_NAME as TN2,G.DATETIME as DT,G.VENUE FROM GAME G, TEAM T1, TEAM T2 WHERE G.AWAYTEAM_ID = T1.TEAM_ID AND G.HOMETEAM_ID = T2.TEAM_ID');
		oci_execute($statement);

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