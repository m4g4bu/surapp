<?php


require_once 'conexion.php';

$conn = dbConnect();


try {
		
	$sql = "select er.titulo,er.codigo_error,c.usuario,
	   py.proyecto,
	   er.tipo, er.estado,
	   er.severidad, 
	   er.sistema,
	   er.navegador, 
	   er.titulo,
	   er.descripcion,
	   er.fecha_creacion  from clientes c
left join sesiones ses on c.usuario = ses.usuario
left join proyectos py on c.proyecto = py.id
left join errores er on c.proyecto = er.idproyecto
WHERE c.usuario = (select ses.usuario from sesiones ses
                            ORDER BY ses.fecha_creacion DESC
                 LIMIT 1)";

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
					
}

	header("Content-type: application/json", true);
	echo json_encode($return);
	exit;
	
} catch(PDOException $e) {
	echo "error: " . $e->getMessage(); 
}

?>