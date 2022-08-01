<script>

    let tablaTestRealizada = $('#tablaTestRealizada').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Usuarios",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registro de usuarios del _START_ al _END_ de un total de _TOTAL_",
            "infoEmpty": "Mostrando registro del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado un todal de _MAX_ re)",
            "sSearch": "Buscar : ",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Ultimo",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        },
    });


    function loadTestRealizado() {
        tablaTestRealizada.row().clear();
        let Url = "<?php echo base_url('Test/selecttestdepresion') ?>";

        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {


                let cont = 1;


                res['testrealizados'].forEach(testrealizado => {

                    tablaTestRealizada.row.add([cont,testrealizado.usuario,testrealizado.paciente,calcularEdad(testrealizado.fecha_nacimiento),
                        testrealizado.detalle,testrealizado.puntuacion,testrealizado.sexo,testrealizado.provincia,testrealizado.ciudad,
                        "<div class='btn-group'><a onclick='detailTest("+testrealizado.id_testpaciente+")' class='btn btn-outline-primary'><i class='fas fa-info'></i></a></div> "
                    ]);
                    cont++;
                });
                tablaTestRealizada.draw(true);

            }
        });

    }


    function detailTest(id) {
        window.location.href = "<?php echo base_url('TestDetalle/testDetalle') ?>"+"/"+id;


    }



    function calcularEdad(fecha) {
        var hoy = new Date();
        var cumpleanos = new Date(fecha);
        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
        var m = hoy.getMonth() - cumpleanos.getMonth();

        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
            edad--;
        }

        return edad;
    }
    window.onload = loadTestRealizado;
</script>

