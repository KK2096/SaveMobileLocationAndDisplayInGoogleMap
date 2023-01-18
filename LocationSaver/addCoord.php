<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['name']) && isset($_POST['phoneNo']) && isset($_POST['lat']) && isset($_POST['lng'])) {   
            //Importing our db connection script
    		require_once('dbConnect.php');

            $lat = $_POST['lat'];
        	$lng = $_POST['lng'];
        	$name = $_POST['name'];
        	$phoneNo = $_POST['phoneNo'];
        	
        	//Creating an sql query
        	$sql = "UPDATE `location` 
        	SET `log`= '$lat', `lat`= '$lng' 
        	WHERE `name`= '$name' AND `phoneNo`= '$phoneNo'";
        
        
        	//Executing query to database
        	if(mysqli_query($con,$sql)){
        		$coord = 1;
        	}else{
        		$coord = 2;
        	}
        
        }
    }
?>