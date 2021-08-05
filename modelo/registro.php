<?php
//Conexion al archivo de la conexion a la base de datos
include 'conexion.php';

class registrar{
    private $db;
    private $lista;

    public function __construct(){
        $this->db = conexion::conn();
        $this->arraydb = array();
    }

    public function validar_correo($correo){
        $resultado = $this->db->query("SELECT * FROM usuarios WHERE correo='$correo'");
        //Fetch_asocc permite guardar la informacion en la variables $filas
        while($filas = $resultado->fetch_assoc()){
            $this->lista[] = $filas;
            return $this->lista;
        }
    }


    public function registro_usuario($user, $correo, $password, $foto){
        $resultado = $this->db->query("INSERT INTO usuarios (nombre, correo, pass, fotografia) VALUES ('$user', '$correo', '$password', '$foto')");
    }
}
?>