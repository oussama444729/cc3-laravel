<div class="card mt-4">
    <div class="card-header">
        Products per Store
    </div>
    <div class="card-body">
        <canvas id="storeChart"></canvas>
    </div>
</div>

@push('scripts')
<script>
    const ctxStore = document.getElementById('storeChart').getContext('2d');
    const storeChart = new Chart(ctxStore, {
        type: 'pie',
        data: {
            labels: {!! json_encode($storeLabels) !!},
            datasets: [{
                data: {!! json_encode($storeCounts) !!},
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
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
</script>
@endpush