<?php

function dbConnect (){
	
	$conn = null;	
	
	/*
	$host = '127.0.0.1';
 	$db =   'surapp';
   	$user = 'mbursesi';
   	$pwd =  'jacrmpTE822msac';
	*/
		
	$host = '190.228.29.67';
 	$db =   'surapp';
   	$user = 'surapp_admin';
   	$pwd =  'jacrmpTE822msac';

	try {
        $conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
      //  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "error " . $e->error;
        exit;
    }
	
    return $conn;
 }
 
 
 ?>