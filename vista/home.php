<?php
session_start();

include ("../modelo/mostrar_datos.php");
$obj = new grupos();
$resultado = $obj -> rap($_SESSION['id']);

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
    <title>Document</title>
</head>

<body>
    <header>
        <img src="../configuracion/img/logotipo.png">
    </header>

    <nav>
        <ul>
            <!-- <a href="#">Inicio</a>
            <a href="#">Acerca</a>
            <a href="#">Login</a> -->
        </ul>
    </nav>

    <center>
        <section id="main">
            <section id="seccion">
                <?php foreach($resultado as $r){ ?>
                <article>
                    <p><?php echo $r['grupo'] ?></p>
                    <audio controls>
                        <source src="<?php echo $r['ruta'] ?>" type="audio/mp3">
                    </audio>
                    <button class="btn btn-success" data-toggle="modal"
                        data-target="#modal<?php echo $r['id'] ?>">Modificar</button>
                    <button class="btn btn-danger"
                        onclick="eliminar('<?php echo $r['id'] ?>', '<?php echo $r['grupo'] ?>', '<?php echo $r['ruta'] ?>');">Eliminar</button>

                    <!-- The Modal -->
                    <div class="modal fade" id="modal<?php echo $r['id'] ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Modificar grupo</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="gpo">Grupo a modificar:</label>
                                        <input type="text" class="form-control" value="<?php echo $r['grupo'] ?>"
                                            id="grupo<?php echo $r['grupo'] ?>">
                                        <input type="hidden" name="" id="id_grupo_<?php echo $r['grupo'] ?>"
                                            value="<?php echo $r['id'] ?>">
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button
                                        onclick="modificar(document.getElementById('id_grupo_<?php echo $r['grupo'] ?>').value,document.getElementById('grupo<?php echo $r['grupo'] ?>').value)"
                                        class="btn btn-primary" data-dismiss="modal">Modificar</button>
                                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </article><?php } ?>
            </section>

            <aside>
                <h2><?php echo $_SESSION['nombre']; ?></h2>
                <img src="<?php echo $_SESSION['fotografia']; ?>"><br><br>
                <ul>
                    <section>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal">Cambiar foto de
                            perfil</a>
                    </section>
                    <section>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_file">Upload file</a>
                    </section>
                    <section>
                        <a class="dropdown-item" onclick="cerrar()" href="#">Cerrar sesion</a>
                    </section>
                </ul>
            </aside>
        </section>

        <!-- The Modal -->
        <div class="modal fade" id="add_file">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar archivo</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="agregar_audio">Archivo:</label>
                            <input type="file" name="" class="form-control-file border" id="audio" accept="audio/*"
                                multiple><br>
                            <input type="text" name="" class="form-control" id="name_audio"
                                placeholder="Nombre del archivo">
                            <input type="hidden" value="<?php echo $_SESSION['nombre']; ?>" id="name_user">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- Se agrega la funcion php echo $_SESSION['id']; para que se muestren solamente las canciones de ese ID de usuario -->
                        <button class="btn btn-primary" onclick="subir(<?php echo $_SESSION['id']; ?>)">Subir
                            archivo</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar archivo</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="foto_perfil">Archivo:</label>
                            <input type="hidden" value="<?php echo $_SESSION['id']; ?>" id="id">
                            <input type="hidden" value="<?php echo $_SESSION['nombre']; ?>" id="nombre">
                            <input type="file" name="" class="form-control-file border" id="foto" accept="image/jpeg"
                                multiple>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-primary" onclick="cambiarfoto()">Subir imagen</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>


        <footer class="foot">
            <img src="../configuracion/img/logotipo.png" alt="Logo" style="width:110px;"><br>
            Derechos reservados &copy; 2021 <br>
            Diseño realizado por: <a href="https://www.facebook.com/arturocasth">Arturo Castillo</a><br>
        </footer>

    </center>

    <script src="configuracion/js/cerrar_sesion.js"></script>
    <script src="configuracion/js/eliminar.js"></script>
    <script src="configuracion/js/modificar.js"></script>
    <script src="configuracion/js/subir.js"></script>
    <script src="configuracion/js/cambiarfoto.js"></script>

</body>

</html>