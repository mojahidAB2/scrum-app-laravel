@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10 px-4">
    <h2 class="text-2xl font-bold text-white mb-6">📉 Burndown Chart - Dernier Sprint</h2>

    <div class="bg-gray-800 p-6 rounded-lg shadow-md">
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
                    borderColor: '#38bdf8', // cyan-400
                    backgroundColor: '#38bdf8',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: false
                },
                {
                    label: 'Réalité',
                    data: {!! json_encode($actual) !!},
                    borderColor: '#f87171', // red-400
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
                        color: '#f3f4f6' // gray-100
                    },
                    ticks: { color: '#d1d5db' } // gray-300
                },
                x: {
                    title: {
                        display: true,
                        text: 'Dates',
                        color: '#f3f4f6'
                    },
                    ticks: { color: '#d1d5db' }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: '#f9fafb' // gray-50
                    }
                }
            }
        }
    });
</script>
@endsection
