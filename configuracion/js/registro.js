function registrar() {
    var foto = $('#foto').prop('files')[0];
    var usuario = document.getElementById('usr').value;
    var email = document.getElementById('mail').value;
    var pass = document.getElementById('pswd').value;
    console.log(usuario);
    console.log(email);
    console.log(pass);
    console.log(foto);

    var datos = new FormData();
    datos.append("foto", foto);
    datos.append("user", usuario)
    datos.append("correo", email)
    datos.append("password", pass)

    Swal.fire({
        title: 'Atencion',
        text: 'Los datos agregados son correctos?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Confirmar!',
        cancelButtonText: 'Cancelar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../controlador/registro.php",
                type: "POST",
                //Es necesario desactivar instrucciones para enviar los datos del Ajax
                processData: false,
                contentType: false,
                //En data mandamos llamar la informacion recibida en la variable datos
                data: datos,
                success: function(resp) {
                    var respuesta = JSON.parse(resp);
                    if (respuesta.status == "1") {
                        Swal.fire({
                            title: 'Atencion',
                            text: usuario + ' se agregó correctamente.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Continuar!',
                        }).then((result) => {
                            window.location.reload();
                        })
                    } else {
                        Swal.fire(
                            'Error!',
                            'Correo ya registrado!',
                            'error'
                        )
                    }
                }
            })
        }
    })
}