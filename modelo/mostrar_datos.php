<?php
//Conexion al archivo de la conexion a la base de datos
include 'conexion.php';

session_start();


class grupos{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
        $this->arraydb = array();
    }

    // se agrega la variable $id_usuario, la que mostrará solamente los resultados con el ID del usuario
    public function rap($id_usuario){
        // se realiza la validación en la BD con un SELECT para extraer solamente los datos de id_user
        $resultado = $this->db->query("SELECT * FROM rap WHERE id_user = '$id_usuario'");
        //Fetch_asocc permite guardar la informacion en la variables $filas
        while($filas = $resultado->fetch_assoc()){
            $this->lista[] = $filas;
        }
        return $this->lista;
    }
}
?>