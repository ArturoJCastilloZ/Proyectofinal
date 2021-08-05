<?php
session_start();

include ("../modelo/mostraraudios.php");
$obj = new grupos();
$resultado = $obj -> rap();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../configuracion/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Globify</title>
</head>



<body>
    <!--Barra de navegación-->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <img src="../configuracion/img/logotipo.png" alt="Logo" style="width:110px;">
    </nav>
    <br>

    <div class="container">
        <center>
            <section id="main">
                <section id="seccionlogin">
                    <div class="container">
                        <!-- Se agregó action="return false" onsubmit="return false" para que la página no cambiara sin validar los datos -->
                        <form action="return false" onsubmit="return false" class="needs-validation" novalidate>
                            <div class="form-group">
                                <label for="email">Correo electrónico:</label>
                                <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo"
                                    name="email" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">No has ingresado tu correo electrónico</div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Contraseña:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Ingresa tu contraseña"
                                    name="pswd" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">No has ingresado tu contraseña</div>
                            </div>
                            <!-- El metodo Onclick es la forma de llamar a la función Login.js que se creó en la carpeta configuración/js -->
                            <button type="submit" class="btn btn-primary" onclick="login()">Ingresar</button>

                        </form>

                        <p>No tienes cuenta? <br><button class="btn btn-link" data-toggle="modal"
                                data-target="#modal">Registrate
                                aquí</button class="btn btn-info"></p>
                    </div>
                    <?php foreach($resultado as $r){ ?>
                    <article>
                        <p>Usuario: <?php echo $r['name_user'] ?><br>Canción: <?php echo $r['grupo'] ?></p>
                        <audio controls>
                            <source src="<?php echo $r['ruta'] ?>" type="audio/mp3">
                        </audio>
                    </article><?php } ?>
                </section>
            </section>
        </center>







        <!-- Modal de registro -->
        <div class="modal fade" id="modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h1 class="modal-title">REGISTRO</h1>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <h4>Completa todos los campos</h4>
                            <br>
                            <input type="text" class="form-control" placeholder="Ingresa tu nombre" id="usr"
                                name="username" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">No haz ingresado tu nombre</div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Ingresa tu correo" id="mail"
                                name="email" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">No has ingresado tu correo electrónico</div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Ingresa tu password" id="pswd"
                                name="password" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">No has ingresado tu password</div>
                        </div>
                        <div class="form-group">
                            <input type="file" name="" class="form-control-file border" id="foto" accept="image/*"
                                multiple>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- El metodo Onclick es la forma de llamar a la función Login.js que se creó en la carpeta configuración/js -->
                        <button type="submit" class="btn btn-primary" onclick="registrar()">Guardar</button>
                        <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


        <script>
        // Deshabilite el envío del formulario si hay campos vacíos
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Obtener los formularios a los que queremos agregar la validación
                var forms = document.getElementsByClassName('needs-validation');
                // Bucle sobre los campos a validar y evitar el envío
                var validation = Array.prototype.filter.call(forms, function(form, div) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        </script>

        <!-- Este script es necesario para poder llamar la función que se creó en login.js -->
        <script src="../configuracion/js/login.js"></script>
        <script src="../configuracion/js/registro.js"></script>
        <script src="configuracion/js/fotoperfil.js"></script>
    </div>

    <footer class="foot">
        <img src="../configuracion/img/logotipo.png" alt="Logo" style="width:110px;"><br>
        Derechos reservados &copy; 2021 <br>
        Diseño realizado por: <a href="https://www.facebook.com/arturocasth">Arturo Castillo</a><br>
    </footer>

</body>

</html>