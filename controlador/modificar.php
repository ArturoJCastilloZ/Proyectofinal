<?php
$id = $_POST['id'];
$grupo = $_POST['grupo'];

include ("../modelo/modificar.php");
$obj = new modificar();
$resultado = $obj -> modificar_grupo($id, $grupo);

exit(json_encode([
    "status" => "1"
]));

?>