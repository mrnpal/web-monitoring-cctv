<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeout Logs - CCTV Monitoring</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo asset('css/result-page.css')?>" type="text/css"> 
    {{-- <style>
        .logo-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            max-width: 200px; 
            height: auto; 
        }
    </style> --}}
    {{-- @vite(['resources/css/result.css', 'resources/js/app.js']) --}}

</head>
<body>
    <header>

        <div class="container mt-3">
            <div class="logo-container">
                <img src="{{ asset('img/logo1.png') }}" alt="logo">
            </div>
        </div>
        
    </header>
    <div class="container mt-40">
        <h1>Result</h1>
        
        <div class="row justify-content-center">
            <!-- Table for IP Address Logs -->
            <div class="col-md-6">
                <h3>IP Address</h3>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>IP Address</th>
                            <th>Status</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $ipCounter = 1; @endphp
                        @foreach($logs as $log)
                            @if($log->ip_address && !$log->port)
                            <tr>
                                <td>{{ $ipCounter++ }}</td>
                                <td>{{ $log->ip_address }}</td>
                                <td>{{ $log->status }}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Table for Port Logs -->
            <div class="col-md-6">
                <h3>Port</h3>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Port</th>
                            <th>Status</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $portCounter = 1; @endphp
                        @foreach($logs as $log)
                            @if($log->port)
                            <tr>
                                <td>{{ $portCounter++ }}</td> <!-- Increment Port counter -->
                                <td>{{ $log->port }}</td>
                                <td>{{ $log->status }}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center mt-4 ">
        <button class="btn-back btn-primary" onclick="window.location.href='{{ route('monitoring-form') }}'">Kembali</button>
    </div>
    <footer>
        <p><a href="#"></a> &copy; 2024 mrnpal </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>
