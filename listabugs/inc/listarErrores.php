<?php


require_once 'conexion.php';

$conn = dbConnect();

try {
		
	$sql = "
SELECT er.codigo_error,
	   py.proyecto,
	   er.tipo, er.estado,
	   er.severidad, 
	   er.sistema,
	   er.navegador, 
	   er.titulo,
	   er.descripcion,
	   er.fecha_creacion 
FROM errores er, proyectos py 
WHERE er.idproyecto = py.id";

    $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $row){
	
	
    $return[] = array('codigo_error' => $row['codigo_error'],
                    'proyecto' => $row['proyecto'],
					'tipo' => $row['tipo'],
					'estado' => $row['estado'],
					'severidad' => $row['severidad'],
					'sistema' => $row['sistema'],
					'navegador' => $row['navegador'],
					'titulo' => $row['titulo'],
					'descripcion' => $row['descripcion'],
					'fecha_creacion' => $row['fecha_creacion']
					);
			//		var_dump($row);
}

	header("Content-type: application/json", true);
	echo json_encode($return);
	exit;
	
} catch(PDOException $e) {
	echo "error: " . $e->getMessage(); 
}

?>