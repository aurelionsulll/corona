<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/r-2.2.3/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .dataTables_wrapper .dataTables_filter input{
                border-radius: 10px;
                border: 1px solid #2c3e50;
            }
            label {
                color:#2c3e50 ;
                font-size: 17px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
    <div class="container">

        <table class="table  table-hover table-bordered" id="main" style="" >
            <thead>
                <tr>
                    <th>Province/State</th>
                    <th>Country/Region</th>
                    <th>Last Update</th>
                    <th>Confirmed</th>
                    <th>Deaths</th>
                    <th>Recovered</th>
                    <th>Latitude</th>
                </tr>
            </thead>
            <tbody>
                @for($i = 1 ; $i<259 ; $i++)
{{--                    @if($csv[$i][0] != "")--}}
                    <tr>
                        @for($j = 0 ; $j<7 ; $j++)
                            <td>{{$csv[$i][$j]}}</td>
                        @endfor
                    </tr>
{{--                    @endif--}}
                @endfor
            </tbody>
        </table>
        @php
            $x = 0;
        @endphp
        @for($i = 1 ; $i<259 ; $i++)
            @php
            $x = $x +  $csv[$i][3]
            @endphp
        @endfor
        <h3 class="text-center mt-50 mb-50">
           Total Confiremd  : <span style="color: red">{{$x}}</span>
        </h3>
    </div>
        <script>
            $(document).ready( function () {
                $('#main').DataTable();
            } );
        </script>
    <div class="container">
        <canvas id="myChart" width="400" height="400"></canvas>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    {{--labels: [ @for($j = 1 ; $j<249 ; $j++)@if($csv[$j][0] != "")'{{ $csv[$j][1] }}',@endif @endfor],--}}
                    labels: [ @for($j = 1 ; $j<259 ; $j++)'{{ $csv[$j][1] }}', @endfor],
                    datasets: [{
                        label: 'Corona data',
                        data: [ @for($j = 1 ; $j<259 ; $j++)'{{$csv[$j][4]}}',@endfor],
                        backgroundColor: [
                            @for($x = 1 ; $x<259 ; $x++)
                            'rgba({{rand(0, 255)}}, {{rand(0, 255)}}, {{rand(0, 255)}}, {{rand(0, 255)}})',
                            @endfor
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

    </div>
    </body>
</html>


