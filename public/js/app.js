$('#modal-nomina').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('data-id', $(e.relatedTarget).data('href'));
});

$('#generar_nomina').on('click', function (){
    let base_url = window.location.origin;
    let empleado_id = $(this).data('id');
    let csrfToken = $('meta[name="csrf-token"]').attr('content');
    let data = {_token: csrfToken, compensaciones: $('#compensaciones').val(), puntualidad: $('#puntualidad').val(), dias_vacaciones: $('#dias_vacaciones').val()}

    if (valida(data)){
        $.ajax({
            type: "POST",
            url: base_url+'/actualizarEmpleado/'+empleado_id,
            data: data,
            global: false,
            success: data => {
                document.getElementById('redireccionar-nomina').click();
            }
        });
    }else{
        alert('Se requieren todos los campos');
    }
});

function mostrarModal(empleado_id){
    let base_url = window.location.origin+'/generar-pdf/'+empleado_id;
    $('#modal-nomina').find('.btn-ok').attr('data-id', empleado_id);
    $('#modal-nomina').removeClass('hidden');

    $('#redireccionar-nomina').attr('href', base_url);
}

function ocultarModal(){
    $('#modal-nomina').find('.btn-ok').attr('data-id', '');
    $('#modal-nomina').addClass('hidden');

    $('#redireccionar-nomina').attr('href', '');
}

function valida(data){
    return !(data.compensaciones == '' || data.puntualidad == '' || data.dias_vacaciones == '');
}

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
