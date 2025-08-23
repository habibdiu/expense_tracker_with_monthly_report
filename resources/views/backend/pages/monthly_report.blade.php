@extends('backend.includes.backend_layout')

@section('content')
<div class="page-content">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">{{ $data['page_title'] }}</h3>
                    <canvas id="monthlyChart" style="width:100%; height:400px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart(document.getElementById('monthlyChart'), {
        type: 'bar',
        data: {
            labels: @json($data['categories']),
            datasets: [{
                label: 'Total Expenses',
                data: @json($data['totals']), 
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
