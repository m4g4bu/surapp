<?php

function dbConnect (){
	
 	$conn = null;	

	$host = '190.228.29.67';
 	$db =   'surapp';
   	$user = 'surapp_admin';
   	$pwd =  'jacrmpTE822msac';
		
	try {
        $conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo '<p>Conexión exitosa.</p>';
    }
    catch (PDOException $e) {
        echo '<p>No se pudo conectar con la base de datos</p>';
        exit;
    }
	
    return $conn;
}
 
?>