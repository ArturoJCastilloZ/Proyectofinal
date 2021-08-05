function cerrar() {
    Swal.fire({
        title: 'Atencion!',
        text: 'Desea cerrar la sesion?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Continuar!',
        cancelButtonText: 'Cancelar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../controlador/cerrar_sesion.php",
                type: "POST",
                //Es necesario desactivar instrucciones para enviar los datos del Ajax
                processData: false,
                contentType: false,
                //En data mandamos llamar la informacion recibida en la variable datos
                data: "ok= " + "ok",
                success: function(resp) {
                    var respuesta = JSON.parse(resp);
                    if (respuesta.status == "1") {
                        window.location.replace("login")
                    }
                }
            })
        }
    })


}