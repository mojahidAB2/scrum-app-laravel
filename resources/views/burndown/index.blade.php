<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Burndown Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Burndown Chart</h2>
    <canvas id="burndownChart" width="600" height="400"></canvas>

    <script>
        const ctx = document.getElementById('burndownChart').getContext('2d');
        const burndownChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5'], // Customize these
                datasets: [{
                    label: 'Remaining Tasks',
                    data: [10, 8, 6, 3, 0], // Example data
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Tasks Left'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Sprint Days'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
