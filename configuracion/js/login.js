function login() {
    //Se crean dos variables (email y pass) las cuaes recibirán la información agregada 
    //en el elemtno id que le corresponda, ejemplo: la variable email recibirá el correo
    //que se agregará en input con id 'email' que se encuentra en el formulario vista/login.php
    var email = document.getElementById('email').value;
    var pass = document.getElementById('pwd').value;
    //Con la variable datos se recibe la informacion de las variables creadas en la parte de arriba
    var datos = new FormData();
    datos.append("correo", email);
    datos.append("contrasena", pass);


    $.ajax({
        url: "../controlador/login.php",
        type: "POST",
        //En data mandamos llamar la informacion recibida en la variable datos
        data: datos,
        //Es necesario desactivar instrucciones para enviar los datos del Ajax
        processData: false,
        contentType: false,
        //Obtener respuesta
        success: function(resp) {
            //Se comienza a extraer la informacion como JSON
            var respuesta = JSON.parse(resp);
            if (respuesta.status == "1") {
                Swal.fire({
                    title: 'Bienvenido',
                    text: respuesta.nombre,
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Continuar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace(respuesta.url)
                    }
                })
            } else {
                Swal.fire(
                    'Error!',
                    'Datos incorrectos!',
                    'error'
                )
            }
        }
    })
}