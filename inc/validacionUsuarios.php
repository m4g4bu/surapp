<?php
  
    $jsonObject = json_decode($_REQUEST['outputJSON']); // Decode JSON object into readable PHP object

    $username = $jsonObject->{'username'}; // Get username from object
    $password = $jsonObject->{'password'}; // Get password from object
	
	$conexion = null;


    //$conexion = new mysqli('127.0.0.1', 'mbursesi', 'jacrmpTE822msac', 'surapp'); 
	 $conexion = new mysqli('190.228.29.67', 'surapp_admin', 'jacrmpTE822msac', 'surapp');
	

    $query = "SELECT * FROM clientes WHERE usuario = '".$username."' and contraseña = '".$password."'";
	
	$result = mysqli_query($conexion,$query);
	
    $num = mysqli_affected_rows($conexion);

    if($num != 0) {
        echo "true";
    } else {
        echo "false";        
    }
?>