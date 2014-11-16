<?php
require_once 'conexion.php';

    try
    {

		$oConn = new mysqli("190.228.29.67", 'surapp_admin', 'jacrmpTE822msac', 'surapp') or die("Error " . mysqli_error($oConn));

		
		$tipo = $_POST['tipo'];
		$prioridad = $_POST['prioridad'];
		$severidad = $_POST['severidad'];
		$sistema = $_POST['sistema'];
		$navegador = $_POST['navegador'];
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$fecha_creacion = date("d/m/y");
		$fecha_modificacion = date("d/m/y");
		$proximo = obtenerID();
		$i = $proximo + 1;
		//$i = $proximo++;
		$codigo_err = '00' . $i;
		
		 $oConn->query("INSERT INTO errores (id,codigo_error,idproyecto,tipo, estado,prioridad,severidad,sistema,navegador,titulo, descripcion,fecha_creacion,fecha_modificacion) VALUES
    ('$i', '$codigo_err','1','$tipo','Abierto', '$prioridad', '$severidad', '$sistema', '$navegador', '$titulo', '$descripcion', '$fecha_creacion', '$fecha_modificacion')");
		 
		 
		 $iBookingID = $oConn->insert_id;
		 
		 if ( $iBookingID != 0 ){
	  	
			echo "SUCCESS";
		 } else {
			echo $oConn->error; 
		 }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        // Note: Log the error or something
    }
	
	function obtenerID(){		
	         
    	$conn = dbConnect();
    	// Create the query
    	$sql = 'SELECT COUNT(*) AS id FROM errores';
    	// Create the query and asign the result to a variable call $result
    	$result = $conn->query($sql);
    	// Extract the values from $result
   		$rows = $result->fetchAll();
    	// Since the values are an associative array we use foreach to extract the values from $rows
		foreach ($rows as $row) {
			$variable = $row['id'];			
		}
	 	return $variable++;
	}
?>