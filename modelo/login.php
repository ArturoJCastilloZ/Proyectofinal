<?php
//Conexion al archivo de la conexion a la base de datos
include 'conexion.php';

class login{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
        $this->arraydb = array();
    }

//Se traen las variables creadas en controlador/login.php
    public function inicio_sesion($correo, $contrasena){
        $resultado = $this->db->query("SELECT * FROM usuarios WHERE correo='$correo' AND pass='$contrasena'");
        //Fetch_asocc permite guardar la informacion en la variables $filas
        while($filas = $resultado->fetch_assoc()){
            $this->lista[] = $filas;
            return $this->lista;
        }
    }
}
?>