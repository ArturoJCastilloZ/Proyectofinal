<?php
//Conexion al archivo de la conexion a la base de datos
include 'conexion.php';

class cambiarfoto{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
        $this->arraydb = array();
    }

//Se traen las variables creadas en controlador/login.php
    public function cambiar_foto($id, $ruta){        
        $resultado = $this->db->query("UPDATE usuarios SET fotografia = '$ruta' WHERE id = '$id'");
    }
}