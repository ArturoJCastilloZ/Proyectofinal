<?php
session_start(); //Libreria para el uso de variables globales(nivel servidor)

//Se crea una validación donde se pide iniciar en la página login si es que no hay una sesión iniciada
//En caso de existir una sesión inciiada, se abrirá la página de inicio
if(empty($_SESSION['login'])){
    header("location: ../login");
}else{
    header("location: ../home");
}
?>