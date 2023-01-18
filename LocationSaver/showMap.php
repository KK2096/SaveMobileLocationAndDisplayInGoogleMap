<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Google Map</title>
</head>
<body>
	<table border=1 cellspacing=0 cellpadding=10>
		<tr>
			<td>#</td>
			<td>Name</td>	
			<td>Phone No</td>
			<td>Map</td>
		</tr>
		<?php 
			//Importing our db connection script
    		require_once('dbConnect.php');
    		$rows = mysqli_query($con, "SELECT * FROM `location` ORDER BY `id` DESC");
    		$i = 1;
    		foreach ($rows as $row) :
		?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["phoneNo"]; ?></td>
			<td style="width: 450px; height: 450px;"><iframe src='https://www.google.com/maps?q=<?php echo $row["log"]; ?>, <?php echo $row["lat"]; ?> &hl=es;z=14&output=embed' style = "width: 100%; height: 100%;"> </iframe></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>