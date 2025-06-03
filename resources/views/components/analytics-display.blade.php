@props([
    'title' => 'Analytics Chart',
    'labels' => [],
    'data' => [],
    'chartType' => 'bar',
    'color' => ['rgba(54, 162, 235, 0.6)']
])

<div class="w-full max-w-2xl mx-auto bg-white p-4 rounded-xl shadow-md overflow-auto h-full hide-scrollbar  ">
    {{-- <h2 class="text-xl font-semibold text-center text-gray-800 mb-4">{{ $title }}</h2> --}}
    <canvas id="chart-{{ Str::slug($title, '-') }}"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const ctx = document.getElementById('chart-{{ Str::slug($title, '-') }}').getContext('2d');
            new Chart(ctx, {
                type: '{{ $chartType }}',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: '{{ $title }}',
                        data: @json($data),
                        backgroundColor: @json($color),
                        borderColor: @json($color),
                        borderWidth: 1
                    }]
                },
                options: {
                    animation: false,
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</div>
