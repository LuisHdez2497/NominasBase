function validaFechas(data){
    return !(data.fecha_inicio == '' || data.fecha_fin == '');
}

$('#agregarIncapacidad').on('click', function (){
    let base_url = window.location.origin;
    let csrfToken = $('meta[name="csrf-token"]').attr('content');
    let empleado_id = $('#agregarIncapacidad').data('id');
    let data = {_token: csrfToken, fecha_inicio: $('#fecha_inicio').val(), fecha_fin: $('#fecha_fin').val()};

    if (validaFechas(data)){
        $.ajax({
            type: "POST",
            url: base_url+'/agregar/incapacidad/'+empleado_id,
            data: data,
            global: false,
            success: data => {
                location.reload()
            }
        });
    }else{
        alert('Se requieren las dos fechas');
    }
});
