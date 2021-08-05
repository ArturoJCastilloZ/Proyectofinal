<?php
//Conexion al archivo de la conexion a la base de datos
include 'conexion.php';

class eliminar{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
        $this->arraydb = array();
    }

//Se traen las variables creadas en controlador/login.php
    public function eliminar_grupo($id){
        $resultado = $this->db->query("DELETE FROM rap WHERE id = '$id'");        
    }
}
?>