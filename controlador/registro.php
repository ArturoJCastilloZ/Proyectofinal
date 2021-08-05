<?php

$foto = $_FILES['foto']['name'];
$ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
$user = $_POST['user'];
$ruta = "../configuracion/archivos/profilephoto/$user.".$ext;
$correo = $_POST['correo'];
$password = $_POST['password'];




include ("../modelo/registro.php");
$obj = new registrar();

$val_email =$obj ->validar_correo($correo);
if(empty($val_email)){
    
    $resultado = $obj -> registro_usuario($user, $correo, $password, $ruta);
    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);

    exit(json_encode([
        "status" => "1"
    ]));
}else{
    exit(json_encode([
        "status" => "2",
    ]));
}



?>