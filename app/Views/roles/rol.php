
<script>

    //Cargar datos para la tabla
    let tablaRoles = $('#tablaRoles').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Roles",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registro de roles del _START_ al _END_ de un total de _TOTAL_",
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


    function loadRoles() {
        tablaRoles.row().clear();
        let Url = "<?php echo base_url('Roles/select') ?>";

        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function (res) {


             let cont = 1;
                var temp = "";
                res['roles'].forEach(rol => {

                  
                   
                    tablaRoles.row.add([cont, rol.rol, estadoColor(rol.estado)
                    ]);
                    cont++;
                });
                tablaRoles.draw(true);
            }
        });
       
    }

    window.onload = loadRoles;
</script>