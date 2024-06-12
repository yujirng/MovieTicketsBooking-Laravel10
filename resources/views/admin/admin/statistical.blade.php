@extends('layouts.admin.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.statistical') }}" method="GET">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="year">Year:</label>
                                <select name="year" id="year" class="form-control">
                                    @for ($i = date('Y'); $i >= date('Y') - 10; $i--)
                                        <option value="{{ $i }}" {{ old('year') == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="start_month">From Month:</label>
                                <select name="start_month" id="start_month" class="form-control">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}"
                                            {{ old('start_month') == $i ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="end_month">To Month:</label>
                                <select name="end_month" id="end_month" class="form-control">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}"
                                            {{ old('end_month') == $i ? 'selected' : ($i == 12 ? 'selected' : '') }}>
                                            {{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <div class="d-flex align-items-end h-100">
                                    <button type="submit" class="btn btn-primary">View Revenue</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <section class="col-lg-4 connectedSortable">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                Report
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <h4 class="text-center font-weight-bold">Year: <span
                                    class="text-primary">{{ $year }}</span></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Total Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($revenueByMonth as $month => $revenue)
                                        <tr>
                                            <td>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</td>
                                            <td>{{ $revenue }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <section class="col-lg-8 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Sales
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" href="#sales-chart" data-toggle="tab">Donut</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                    style="position: relative; height: 300px;">
                                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        /* Chart.js Charts */
        // Sales chart
        var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');

        var salesChartData = {
            labels: Object.values(@json($monthNames)),
            datasets: [{
                label: 'Monthly Revenue',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: Object.values(@json($revenueByMonth))
            }]
        };

        var salesChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        min: 0
                    }
                }]
            }
        }


        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas, {
            type: 'line',
            data: salesChartData,
            options: salesChartOptions
        });
    </script>
@endsection
