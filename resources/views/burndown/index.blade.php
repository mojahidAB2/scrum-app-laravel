@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-light mb-4">📉 Burndown Chart - Dernier Sprint</h2>

    <div class="bg-dark p-4 rounded shadow">
        <canvas id="burndownChart" height="100"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('burndownChart').getContext('2d');
    const burndownChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($dates) !!},
            datasets: [
                {
                    label: 'Idéal',
                    data: {!! json_encode($ideal) !!},
                    borderColor: '#38bdf8',
                    backgroundColor: '#38bdf8',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: false
                },
                {
                    label: 'Réalité',
                    data: {!! json_encode($actual) !!},
                    borderColor: '#f87171',
                    backgroundColor: '#f87171',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Tâches restantes',
                        color: '#fff'
                    },
                    ticks: { color: '#ccc' }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Dates',
                        color: '#fff'
                    },
                    ticks: { color: '#ccc' }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: '#fff'
                    }
                }
            }
        }
    });
</script>
@endsection
