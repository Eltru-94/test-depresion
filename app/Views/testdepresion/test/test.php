<script>

    let tablaTest = $('#tablatest').DataTable({
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


    function loadTest() {
        tablaTest.row().clear();
        let Url = "<?php echo base_url('Test/selecttest') ?>";

        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {


                let cont = 1;
                var temp = "";
                res['test'].forEach(test => {
                    tablaTest.row.add([cont,test.test,test.opcion_1,test.opcion_2,test.respuesta
                    ]);
                    cont++;
                });
                tablaTest.draw(true);

            }
        });

    }



    window.onload = loadTest;
</script>
