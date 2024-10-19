@extends('layouts.seller')


@section('title', 'Ad Performance')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper" style="background-color: #fff;">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <h3 class="">Performance for the Last 7 Days</h3>
                        <hr><br>

                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        console.log(@json($itemsListed));
        console.log(@json($itemClicks));
        console.log(@json($mobileViews));

        const ctx = document.getElementById('performanceChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json(array_keys($itemsListed->toArray())),  // X-axis labels (Dates)
                datasets: [
                    {
                        label: 'Items Listed',
                        data: @json(array_values($itemsListed->toArray())), // Y-axis data for Items listed
                        borderColor: '#dc3545',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.1,
                        pointBackgroundColor: '#dc3545',
                        pointRadius: 5,
                        pointHoverRadius: 7,
                    },
                    {
                        label: 'Item Clicks',
                        data: @json(array_values($itemClicks->toArray())), // Y-axis data for Item Clicks
                        borderColor: '#007bff',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.1,
                        pointBackgroundColor: '#007bff',
                        pointRadius: 5,
                        pointHoverRadius: 7,
                    },
                    {
                        label: 'Mobile Views',
                        data: @json(array_values($mobileViews->toArray())), // Y-axis data for Mobile Views
                        borderColor: '#343a40',
                        borderWidth: 2,
                        fill: false,
                        tension: 0.1,
                        pointBackgroundColor: '#343a40',
                        pointRadius: 5,
                        pointHoverRadius: 7,
                    }
                ]
            },
            options: {
                responsive: true,
                animation: {
                    duration: 2000, // Animation duration in milliseconds
                    easing: 'easeInOutQuart', // Easing function for the animation
                    onComplete: function() {
                        console.log('Animation complete!'); // Callback function after animation
                    }
                },
                // hover: {
                //     mode: 'nearest',  // Hover on the nearest point
                //     intersect: true   // Only show the tooltip when hovering directly over the point
                // },
                plugins: {
                    tooltip: {
                        enabled: false,
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                            },
                            // title: function(tooltipItems) {
                            //     return 'Date: ' + tooltipItems[0].label;
                            // }
                        }
                    }
                },
                interaction: {
                    mode: 'nearest', // Tooltip will be shown for all data points at the same x-axis point
                    intersect: false, // Display tooltips for nearby points, not just ones directly under the cursor
                },
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day',  // Sets unit to 'day'
                            tooltipFormat: 'YYYY-MM-DD'  // Tooltip format
                            // displayFormats: {
                            //     day: 'YYYY-MM-DD', // Format for labels on the x-axis
                            // }
                        },
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Count'
                        }
                    }
                }
            }
        });
    </script>

{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
@endsection
