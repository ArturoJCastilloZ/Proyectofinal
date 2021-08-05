<?php

$id = $_POST['id'];
$ruta = $_POST['ruta'];

include ("../modelo/eliminar.php");
$obj = new eliminar();


if(file_exists($ruta)){
    if(unlink($ruta)){
        $resultado = $obj -> eliminar_grupo($id, $ruta);
        exit(json_encode([
            "status" => "1"
        ]));
    }  
};



?>