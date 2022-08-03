<script>
    let tituloPaciente = document.getElementById("tituloModal");
    let edit = false;
    //Cargar datos para la tabla
    let tablaPaciente = $('#tablaPacientes').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ Pacientes",
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


    function loadPaciente() {
        tablaPaciente.row().clear();
        let Url = "<?php echo base_url('Paciente/allData') ?>";

        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {


                let cont = 1;
                var temp = "";
                res['pacientes'].forEach(paciente => {

                    let mensaje = estado(paciente.estado);
                    let btnColor = btnColorDelete(paciente.estado);
                    let accion = "<div class='btn-group'><a class='btn btn-outline-primary ' title='Actualizar' data-bs-toggle='modal' data-bs-target='#modalPaciente'  onclick='update(" +
                        paciente.id_paciente +
                        ")'><i class='fas fa-user-edit'></i></a> <a " + btnColor + " title='Test psicologia'  onclick='testpsicologia(" +
                        paciente.id_paciente +
                        ")'>" + mensaje + "</a></div> ";
                    tablaPaciente.row.add([cont, paciente.nombres, paciente.apellidos, paciente.cedula,calcularEdad(paciente
                        .fecha_nacimiento), paciente.sexo, paciente.provincia,paciente.ciudad, accion
                    ]);
                    cont++;
                });
                tablaPaciente.draw(true);
            }
        });

    }






    function titleCreate() {

        tituloPaciente.innerHTML = "<h5> Registrar Paciente</h5>";

    }


    function update(valor) {

        tituloPaciente.innerHTML = "<h5> Actualizar Paciente</h5>";

        let Url = "<?php echo base_url('Paciente/update/') ?>/" + valor;
        $.ajax({
            method: 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {
                res['paciente'].forEach(pac => {
                    $('#id_paciente').val(pac.id_paciente);
                    $('#nombres').val(pac.nombres);
                    $('#apellidos').val(pac.apellidos);
                    $('#cedula').val(pac.cedula);
                    $('#ciudad').val(pac.ciudad);
                    $('#provincia').val(pac.provincia);
                    $('#sexo').val(pac.sexo).change();
                    $('#fecha_nacimiento').val(pac.fecha_nacimiento);
                });
                edit = true;
            }
        });
    }

    $("#btnPaciente").click(function(e) {
        e.preventDefault();
        var yearSelect = document.querySelector("#fecha_nacimiento");
        let edad=calcularEdad($('#fecha_nacimiento').val())
        if(edad>=65){
        clearErrors();
        let Url = edit === false ? '<?php echo base_url('Paciente/store') ?>' :
            '<?php echo base_url('Paciente/datoUpdate') ?>';
        $.ajax({
            type: "post",
            url: Url,
            data:  $('#forPaciente').serialize(),
            dataType: "json",
            success: function(res) {

                if (res.success) {

                    edit = false;
                    $('#forPaciente').trigger('reset');
                    toastr["success"](res.success,"Paciente");
                    $('#modalPaciente').modal('hide');
                    loadPaciente();

                } else {

                    $.each(res.error, function(prefix, val) {
                        $('#forPaciente').find('span.' + prefix + '_error').text(val);
                    });
                }
            }
        });}
        else{
            Swal.fire({
                title: "No se permiten realizar el test a pesonas menores de 65 años",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar'
            })
        }
    })

    function clearErrors() {
        $('#forPaciente').find('span.nombres_error').text("");
        $('#forPaciente').find('span.apellidos_error').text("");
        $('#forPaciente').find('span.cedula_error').text("");
        $('#forPaciente').find('span.fecha_nacimiento_error').text("");
        $('#forPaciente').find('span.sexo_error').text("");
        $('#forPaciente').find('span.provincia_error').text("");
        $('#forPaciente').find('span.ciudad_error').text("");

    }

    function testpsicologia(id) {



        let mensaje ="Esta seguro de completar el test..";
        Swal.fire({
            title: mensaje,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((result) => {

            if (result.isConfirmed){
                window.location.href = "<?php echo base_url('Test') ?>"+"/"+id;
            }

        });
    }



    function clearFormulario(){
        clearErrors();
        $('#forPaciente').trigger('reset');

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


    window.onload = loadPaciente;
</script>
