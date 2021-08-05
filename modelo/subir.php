<?php
//Conexion al archivo de la conexion a la base de datos
include 'conexion.php';

class subir{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
        $this->arraydb = array();
    }

//Se traen las variables creadas en controlador/login.php
    public function agregar_audio($id, $name_audio, $ruta, $name_user){        
        $resultado = $this->db->query("INSERT INTO rap (grupo, ruta, id_user, name_user) VALUES ('$name_audio', '$ruta', '$id', '$name_user')");
    }
}