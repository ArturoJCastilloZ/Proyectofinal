function cambiarfoto() {
    var foto = $('#foto').prop('files')[0];
    var nombre = document.getElementById('nombre').value;
    var id = document.getElementById('id').value;
    var datos = new FormData();
    datos.append("foto", foto);
    datos.append("nombre", nombre);
    datos.append("id", id);
    console.log(foto);
    console.log(nombre);

    Swal.fire({
        title: 'Atencion',
        text: nombre + ', Deseas cambiar tu foto de perfil?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Confirmar!',
        cancelButtonText: 'Cancelar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../controlador/cambiarfoto.php",
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
                            text: 'Tu foto se cambió correctamente.',
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