<?php

require "dbConnect.php";

$name = isset($_POST["name"]) ? $_POST["name"] : '';;
$phoneNo = isset($_POST["phoneNo"]) ? $_POST["phoneNo"] : '';;

$tempName = $name;
$tempPhone = $phoneNo;
$sql = "INSERT INTO `location`(`name`, `phoneNo`) VALUES ('$name','$phoneNo')";

if(mysqli_query($con,$sql))
{
echo "Data Succesfully Save";
}
else
{
echo "Data Insertion Failed" ;
}
if (isset($_POST['lat']) && isset($_POST['lng'])) {   

	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	
	//Creating an sql query
	$sql = "UPDATE `location` 
	SET `log`= '$lat', `lat`= '$lng' 
	WHERE `name`= '$tempName' AND `phoneNo`= '$tempPhone'";


	//Executing query to database
	if(mysqli_query($con,$sql)){
		$coord = 1;
		echo "Update Succ";
	}else{
		$coord = 2;
		echo "Update Fail";
	}
}
?>