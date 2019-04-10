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
	<h2>Scores</h2>
	<p>
	<?php
		$connection = oci_connect($username = 'psaikia',
								  $password = 'wels@AINU14',
								  $connection_string = '//oracle.cise.ufl.edu/orcl');
		$statement = oci_parse($connection, 'SELECT * FROM game');
		oci_execute($statement);

		while (($row = oci_fetch_object($statement))) {
		  var_dump($row);
		}

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