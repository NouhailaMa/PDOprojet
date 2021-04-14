
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js"></script>

<div class="content">
    <div class="row header-container justify-content-center">
        <div class="header">
            <h1>Les statistiques</h1>
        </div>
    </div>

    <canvas id="myChart"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        $.ajax({
            url:'Controller/statistiqueController.php',
            data:{op: 'countClasse'},
            dataType: 'JSON',
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                var x = Array();
                var y = Array();
                data.forEach(function (e) {
                    x.push(e.filiere);
                    y.push(e.nombre);
                });
                showGraph(x,y);
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log(textStatus);  
            }
            
        });
        function showGraph(x,y){
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: x,
                datasets: [{
                        data: y,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Nombre de classes par filiere'
                    }
                },
                scales: {
                    x: {
                        tittle:{
                        display: true,
                        text: 'Filieres'
                    }
                    },
                    y: {
                        title:{
                        display: true,
                        text: 'Classes'
                    }
                }
                }
            }
        });
    }
    </script>



</div>