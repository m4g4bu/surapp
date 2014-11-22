<?php

    $var1 = $_REQUEST['action'];
	
    $jsonObject = json_decode($_REQUEST['outputJSON']); 
	
    $username = $jsonObject->{'username'}; 	
    $password = $jsonObject->{'password'};

	$conexion = new mysqli('190.228.29.67', 'surapp_admin', 'jacrmpTE822msac', 'surapp');

    $query = "SELECT * FROM clientes WHERE usuario = '".$username."' and contraseña = '".$password."'";
    
	$result = mysqli_query($conexion,$query);

    $num = mysqli_affected_rows($conexion);

	
    if($num != 0) {		
        crearSesion($username);
    } else {
        echo "false";        
    }
	
	function crearSesion($usr){
			
		$query = "INSERT INTO sesiones (usuario,fecha_creacion) VALUES ('".$usr."','".date("d/m/y H:i:s")."')";
    
		$conexion = new mysqli('190.228.29.67', 'surapp_admin', 'jacrmpTE822msac', 'surapp');
		$result = mysqli_query($conexion,$query);

	    $num = mysqli_affected_rows($conexion);

		if($num != 0) {
			echo "true";
		} else {
			echo "false";        
		}
    
		
	}
	
	
	
	
?>