<?php
//Conexion al archivo de la conexion a la base de datos
include 'conexion.php';

$audio = $_FILES['audio']['name'];
$ext = strtolower(pathinfo($audio, PATHINFO_EXTENSION));
$ruta = "../configuracion/archivos/$audio.".$ext;
$nombre = $audio;

class modificar{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
        $this->arraydb = array();
    }

//Se traen las variables creadas en controlador/login.php
    public function modificar_grupo($id, $nombre){
        $resultado = $this->db->query("UPDATE rap SET grupo = '$nombre' WHERE id = '$id'");        
    }
}
?>