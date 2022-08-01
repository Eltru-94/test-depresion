<script>
    const colorFondo = [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)'
    ];
    const colorBoder = [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)'
    ];

  

   


    function Cargarfunciones() {
        totalGraficos()
        let Url = "<?php echo base_url('TestDetalleReporte') ?>";
        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {
                let currentTime = new Date();
                let mensajeTotalUsers = '<h2> <i class="fas fa-users"></i> &nbsp;' + parseFloat(res.total_users[0]['TOTAL'])+ '&nbsp;<h2><h5>TOTAL USUARIOS </h5>';
                let users = document.getElementById("total_users");
                users.innerHTML = mensajeTotalUsers;

                let mensajeTotalCitaMes = '<h2> <i class="fas fa-hospital-user"></i> &nbsp;' + parseFloat(res.total_pacientes[0]['TOTAL'])+ '&nbsp;<h2><h5>TOTAL PACIENTES </h5>';
                let citaMes = document.getElementById("total_citas_mes");
                citaMes.innerHTML = mensajeTotalCitaMes;


                let mensajeTotalCitaMesDia = '<h2> <i class="fas fa-file-alt"></i> &nbsp;' + parseFloat(res.total_test_pacientes[0]['TOTAL'])+ '&nbsp;<h2><h5>TOTAL TEST </h5>';
                let citaMesDias = document.getElementById("total_citas_dia");
                citaMesDias.innerHTML = mensajeTotalCitaMesDia;

            }
        });

    }


    function totalGraficos() {
        let Url = "<?php echo base_url('TestDetalleReporte/detalle') ?>";
        let ctx = document.getElementById('myAreaChart').getContext('2d');

        $.ajax({
            'type': 'get',
            url: Url,
            dataType: 'json',
            success: function(res) {
                let total = [];
                let labels = [];
                
                res['total_test'].forEach(tot => {
                
                    total.push(tot.TOTAL);
                    labels.push(tot.detalle);
                });
                total.push(0);
                new Chart(ctx, {
                    type: 'bar', // Tipo de gráfica
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Estadistica Test depresión geriátrica de Yesavage',
                            data: total,
                            backgroundColor: colorFondo,
                            borderColor: colorBoder,
                            borderWidth: 2
                        }]

                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        title: {
                            display: true,
                            text: "TEST DEPRESIÓN",
                        }
                    }
                });
            }
        });
    }


    window.onload = Cargarfunciones;
</script>