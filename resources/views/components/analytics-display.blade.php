@props([
    'title' => 'Analytics Chart',
    'labels' => [],
    'data' => [],
    'chartType' => 'bar',
    'color' => ['rgba(54, 162, 235, 0.6)'],
    'axis' => 'x'
])
@php
    $uniqueId = uniqid(Str::slug($title, '-'));
@endphp

<div class="w-full max-w-2xl mx-auto bg-white rounded-xl p-4 overflow-x-auto h-full hide-scrollbar ">
    {{-- <h2 class="text-xl font-semibold text-center text-gray-800 mb-4">{{ $title }}</h2> --}}
    <canvas id="chart-{{ $uniqueId }}"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('chart-{{ $uniqueId }}').getContext('2d');
            new Chart(ctx, {
                type: '{{ $chartType }}',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: '{{ $title }}',
                        data: @json($data),
                        backgroundColor: @json($color),
                        borderColor: @json($color),
                    }]
                },
                options: {
                    indexAxis: '{{ $axis }}',
                    animation: false,
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            grid: {
                                display: true
                            }
                        },
                        y: {
                            
                            grid: {
                                display: true
                            }
                        }
                    }
                }
            });
        });
    </script>
</div>
