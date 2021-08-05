<?php

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$foto = $_FILES['foto']['name'];
$ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
$ruta = "../configuracion/archivos/profilephoto/$nombre.".$ext;
$nombrefoto = "../configuracion/archivos/profilephoto/$nombre";

include ("../modelo/cambiarfoto.php");
$obj = new cambiarfoto();
move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
$resultado = $obj -> cambiar_foto($id, $ruta);        

exit(json_encode([
    "status" => "1"
]));

?>