
<script>


function  test(){
    let Url = "<?php echo base_url('Test/store') ?>";
    clearErrors()


    let mensaje ="Esta seguro de guarda cambios del test";
    Swal.fire({
        title: mensaje,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: Url,
                data:  $('#forTest').serialize(),
                dataType: "json",
                success: function(res) {

                    if (res.success) {

                        window.location.href = "<?php echo base_url('Test/testdepresion') ?>";

                    } else {

                        $.each(res.error, function(prefix, val) {
                            $('#forTest').find('span.' + prefix + '_error').text(val);
                        });
                    }

                }
            });
        }
    });

}

function clearErrors() {
    $('#forTest').find('span.pregunta_1_error').text("");
    $('#forTest').find('span.pregunta_2_error').text("");
    $('#forTest').find('span.pregunta_3_error').text("");
    $('#forTest').find('span.pregunta_4_error').text("");
    $('#forTest').find('span.pregunta_5_error').text("");
    $('#forTest').find('span.pregunta_6_error').text("");
    $('#forTest').find('span.pregunta_7_error').text("");
    $('#forTest').find('span.pregunta_8_error').text("");
    $('#forTest').find('span.pregunta_9_error').text("");
    $('#forTest').find('span.pregunta_10_error').text("");
    $('#forTest').find('span.pregunta_11_error').text("");
    $('#forTest').find('span.pregunta_12_error').text("");
    $('#forTest').find('span.pregunta_13_error').text("");
    $('#forTest').find('span.pregunta_14_error').text("");
    $('#forTest').find('span.pregunta_15_error').text("");


}


</script>
