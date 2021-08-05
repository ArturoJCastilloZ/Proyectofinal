<?php
session_start();
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

include ("../modelo/login.php");
$objeto = new login();
$resultado = $objeto-> inicio_sesion($correo, $contrasena);

if(empty($resultado)){
    exit(json_encode([
        "status" => "2"
    ]));
}else{
    //$r extrae el contenido del arreglo llamado $resultado
    foreach($resultado as $r){
        $id = $r['id'];
        $nombre = $r['nombre'];
        $foto = $r['fotografia'];
        
    }

    $_SESSION['login'] = "ok";
    $_SESSION['nombre'] = $nombre;
    $_SESSION['id'] = $id;
    $_SESSION['fotografia'] = $foto;

    exit(json_encode([
        "status" => "1",
        "nombre" => $nombre,
        "url"=>"home"
    ]));
}


?>