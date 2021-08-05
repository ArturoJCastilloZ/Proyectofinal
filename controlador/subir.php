<?php

$id = $_POST['id'];
$name_audio = $_POST['name_audio'];
$name_user  = $_POST['name_user'];


$dir = "../configuracion/archivos/uploadaudio/$id";
if(!is_dir($dir)){
    mkdir($dir);
    $audio = $_FILES['audio']['name'];
    $ext = strtolower(pathinfo($audio, PATHINFO_EXTENSION));
    $ruta = "../configuracion/archivos/uploadaudio/$id/$name_audio.".$ext;
    move_uploaded_file($_FILES['audio']['tmp_name'], $ruta);    
}else{
    $audio = $_FILES['audio']['name'];
    $ext = strtolower(pathinfo($audio, PATHINFO_EXTENSION));
    $ruta = "../configuracion/archivos/uploadaudio/$id/$name_audio.".$ext;
    move_uploaded_file($_FILES['audio']['tmp_name'], $ruta);    
}

include ("../modelo/subir.php");
$obj = new subir();
$resultado = $obj -> agregar_audio($id, $name_audio, $ruta, $name_user);


exit(json_encode([
    "status" => "1"
]));

?>