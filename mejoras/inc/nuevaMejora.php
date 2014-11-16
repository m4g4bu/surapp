<?php
require_once 'conexion.php';

try {
	
	$conn = dbConnect();
	
	$plataforma = $_POST['plataforma'];
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$fecha_creacion = date("d/m/y");
	$proximo = obtenerID();
	$i = $proximo + 1;
	$id = '00' . $i;
		
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    $sql = "INSERT INTO mejoras (id, plataforma, titulo,descripcion,estado,fecha_creacion)
    VALUES ('$id', '$plataforma', '$titulo','$descripcion','Abierta','$fecha_creacion')";

    $conn->exec($sql);
   
	$iBookingID = $conn->lastInsertId();
		 
		 if ( $iBookingID != 0 ){
	  	
			echo "SUCCESS";
			
		 } else {
			echo $conn->errorCode();
		 }
		 
    } catch(PDOException $e)    {
    	echo $sql . "<br>" . $e->getMessage();
    }

	$conn = null;

   	
	function obtenerID(){		
	         
    	$conn = dbConnect();
    	// Create the query
    	$sql = 'SELECT COUNT(*) AS id FROM mejoras';
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