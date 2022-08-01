<script>
    let tituloUser = document.getElementById("tituloModal");
    let edit = false;
    //Cargar datos para la tabla
    let tablaUsers = $('#tablaUsers').DataTable({
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


    function loadUsers() {
        tablaUsers.row().clear();
        let Url = "<?php echo base_url('Users/select') ?>";

        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {
                let cont = 1;
                var temp = "";
                res['users'].forEach(user => {
                    console.log(user.estado)
                    let mensaje = estado(user.estado);
                    let btnColor = btnColorDelete(user.estado);
                    let accion = "<div class='btn-group'><a class='btn btn-outline-primary ' title='Actualizar' data-bs-toggle='modal' data-bs-target='#modalUser'  onclick='update(" +
                        user.id_user +
                        ")'><i class='fas fa-user-edit'></i></a> <a " + btnColor + " title='Eliminar'  onclick='deleteUsers(" +
                        user.id_user + "," + user.estado +
                        ")'>" + mensaje + "</a></div> ";
                    tablaUsers.row.add([cont, user.nombre, user.apellido, user.correo, user
                        .cedula, user.telefono, roles(user.id_rol), estadoColor(user.estado), accion
                    ]);
                    cont++;
                });
                tablaUsers.draw(true);
            }
        });

    }


    function selectRoles(aux) {

        let Url = "<?php echo base_url('Roles/select') ?>";
        let rol = document.getElementById("id_rol");

        let mensaje = "";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {

                res['roles'].forEach(roles => {
                    if (aux == roles.id_rol) {
                        mensaje += "<option  selected value='" + roles.id_rol + "'>" + roles.rol +
                            "</option>";
                    } else {
                        mensaje += "<option value='" + roles.id_rol + "'>" + roles.rol + "</option>";
                    }

                });
                rol.innerHTML = mensaje;
            }
        });

    }


    function roles(valor) {

        let rolmensaje = "";
        if (valor == 1) {
            return rolmesanje = "ADMIN";
        }

        if (valor == 2) {
            return rolmesanje = "PROFESIONAL";
        }

    }

 

    function titleCreate() {

        tituloUser.innerHTML = "<h5> Registrar Usuario</h5>";
        selectRoles(0);

    }


    function update(valor) {

        tituloUser.innerHTML = "<h5> Actualizar Usuario</h5>";

        let Url = "<?php echo base_url('Users/update/') ?>/" + valor;



        $.ajax({
            method: 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {
                res['user'].forEach(user => {


                    $('#id_user').val(user.id_user);
                    $('#nombre').val(user.nombre);
                    $('#apellido').val(user.apellido);
                    $('#cedula').val(user.cedula);
                    $('#telefono').val(user.telefono);
                    $('#correo').val(user.correo);
                    selectRoles(user.id_rol)

                });
                edit = true;
            }
        });
    }

    $("#btnUser").click(function(e) {
        e.preventDefault();
        clearErrors();

        let Url = edit === false ? '<?php echo base_url('Users/store') ?>' :
            '<?php echo base_url('Users/datoUpdate') ?>';


        $.ajax({
            type: "post",
            url: Url,
            data: $('#forUser').serialize(),
            dataType: "json",
            success: function(res) {

                if (res.success) {
                    edit = false;
                    $('#forUser').trigger('reset');
                    toastr["success"](res.success,"Usuario");
                    $('#modalUser').modal('hide');
                    loadUsers();
                } else {
                   
                    $.each(res.error, function(prefix, val) {
                        $('#forUser').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });


    })

    function clearErrors() {
        $('#forUser').find('span.nombre_error').text("");
        $('#forUser').find('span.apellido_error').text("");
        $('#forUser').find('span.cedula_error').text("");
        $('#forUser').find('span.telefono_error').text("");
        $('#forUser').find('span.correo_error').text("");
        $('#forUser').find('span.clave_error').text("");
        $('#forUser').find('span.cclave_error').text("");

    }

    function deleteUsers(id, estado) {

        let Url = "<?php echo base_url('Users/delete') ?>";
        if (estado == 1) {
            estado = 0;
        } else {
            estado = 1;
        }
        let mensaje =mensajeAlertEstado(estado,"Usuario");
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
                    method:'post',
                    url:Url,
                    data:{
                        'id_user':id,
                        'estado':estado
                    },
                    success:function(res){
                      
                        loadUsers();
                        if(res.estado==1){
                            toastr["success"](res.success,"Usuario");
                        }
                        if(res.estado==0){
                            toastr["error"](res.success,"Usuario");
                        }
                       
                       
                        
                    }

                });
             }
         });
    }



    function clearFormulario(){
        clearErrors();
        $('#forUser').trigger('reset');

    }


    window.onload = loadUsers;
</script>