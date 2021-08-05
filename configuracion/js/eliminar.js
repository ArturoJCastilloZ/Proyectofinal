function eliminar(id, grupo, ruta) {
    var datos = new FormData();
    datos.append("id", id)
    datos.append("ruta", ruta)

    Swal.fire({
        title: 'Atencion',
        text: 'Desea eliminar a ' + grupo + '?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Confirmar!',
        cancelButtonText: 'Cancelar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../controlador/eliminar.php",
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
                            text: grupo + ' se eliminó correctamente.',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Continuar!',
                        }).then((result) => {
                            window.location.reload();
                        })
                    }
                }
            })
        }
    })
}