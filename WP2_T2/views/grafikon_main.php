<div style="width: 600px; height: 400px; margin: auto;">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Setup Block
    const park_names = <?php echo json_encode($viewData['uzenet']['park']) ?>;
    const park_count = <?php echo json_encode($viewData['uzenet']['darab']) ?>;
    const data = {
        labels: park_names,
        datasets: [{
            label: 'Tanösvények száma',
            data: park_count,
            borderWidth: 1,
            backgroundColor: '#FF6363CC',
        }]
    };

    // Config Block
    const config = {
        type: 'bar',
        data,
        options: {
            plugins: {
                legend: {
                    title: {
                        padding: 10
                    },
                    labels: {
                        color: '#F5DEB3FF',
                        font: {
                            size: 18
                        }
                    }
                }
            },
            scales: {
                y: {
                    ticks: {
                        color: '#F5DEB3FF',
                    },
                    beginAtZero: true,
                },
                x: {
                    ticks: {
                        color: '#F5DEB3FF',
                    }
                }
            }
        },
    }

    // Render Block
    const myChart = new Chart(
        $('#myChart'),
        config
    );
</script>