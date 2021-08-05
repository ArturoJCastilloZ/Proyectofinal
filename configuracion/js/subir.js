function subir(id) {
    var audio = $('#audio').prop('files')[0];
    var name_audio = document.getElementById('name_audio').value;
    var name_user = document.getElementById('name_user').value;
    var datos = new FormData();
    datos.append("audio", audio);
    datos.append("id", id);
    datos.append("name_user", name_user);
    datos.append("name_audio", name_audio);

    Swal.fire({
        title: 'Atencion',
        text: 'Desea agregar la canción ? ' + name_audio,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Confirmar!',
        cancelButtonText: 'Cancelar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../controlador/subir.php",
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
                            text: 'La canción se agregó correctamente.',
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