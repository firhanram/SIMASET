( function($){
    var charts  = {
        runChart : function(){
            this.ajaxGetData();
        },

        ajaxGetData : function(){
            // var urlPath = 'http://'+ window.location.hostname + '/chartJurusan';
            var urlPath = 'http://127.0.0.1:8000/chartJurusan';
            var request = $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method : 'GET',
                url : urlPath
            });

            request.done(function(response){
                console.log(response.Total);
                charts.createChart(response);
            });
        },

        createChart : function(response){
            var ctx = document.getElementById('myAreaChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Sistem Informasi', 'Sistem Komputer', 'Teknologi Informasi', 'Teknik Elektro'],
                    datasets: [{
                        label: 'Total Mahasiswa Di Setiap Jurusan',
                        data: response.Total,
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
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                min : 0,
                                max : 10
                            }
                        }]
                    },
                    layout: {
                        padding:{
                            left:10,
                            right:25,
                            top:0,
                            bottom:0
                        }
                    }
                }
            });
        }

    };

    charts.runChart();
})( jQuery );