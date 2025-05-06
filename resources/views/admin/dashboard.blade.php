@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<div class="container">

   <h1>Under Development</h1>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        if($('#attendance-chartjs').length > 0) {
            var ctx = document.getElementById('attendance-chartjs').getContext('2d');
            var mySemiDonutChart = new Chart(ctx, {
                type: 'doughnut', // Chart type
                data: {
                    labels: ['Late','Present', 'Permission', 'Absent'],
                    datasets: [{
                        label: 'Semi Donut',
                        data: [40, 20, 30, 10],
                        backgroundColor: ['#0C4B5E', '#03C95A', '#FFC107', '#E70D0D'],
                        borderWidth: 5,
                        borderRadius: 10,
                        borderColor: '#fff', // Border between segments
                        hoverBorderWidth: 0,   // Border radius for curved edges
                        cutout: '60%',
                    }]
                },
                options: {
                    rotation: -100,
                    circumference: 200,
                    layout: {
                        padding: {
                            top: -20,    // Set to 0 to remove top padding
                            bottom: -20, // Set to 0 to remove bottom padding
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false // Hide the legend
                        }
                    },
                }
            });
        }
    });
</script>
@endpush
