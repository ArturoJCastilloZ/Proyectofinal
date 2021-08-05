<?php
class conexion {

    public function conn(){
        //Usamos la propiedad php de mysqli para conectarnos a nuestra base de datos
        $enlace = mysqli_connect("localhost", "root", "root", "proyectoweb");
        //Set_charset("utf8") permite leer la informacion con acento o sin acento
        $enlace -> set_charset("utf8");
        return $enlace;
    }
}
?>