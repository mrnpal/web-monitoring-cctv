<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCTV Monitoring</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo asset('/css/cctv-monitoring.css')?>" type="text/css"> 
    {{-- @vite(['resources/css/cctv-monitoring.css', 'resources/js/app.js']) --}}

    
</head>
<body>
    {{-- <style>
        /* public/css/cctv-monitoring.css */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f8f9fa, #e2e8f0);
        color: #343a40;
        margin: 0;
        padding: 0;
    }

    h1 {
        font-size: 36px;
        font-weight: 600;
        color: #343a40;
        margin-bottom: 30px;
    }

    .form-container {
        background-color: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .form-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .btn-ping {
        background-color: #28a745;
        color: white;
        border-radius: 50px;
        padding: 12px 35px;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-ping:hover {
        background-color: #218838;
        transform: translateY(-3px);
    }

    .logo-container img {
        max-width: 180px; 
        height: auto;
        border-radius: 8px;
    }

    .container h3 {
        font-weight: 600;
        margin-bottom: 20px;
    }

    button {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .text-center button {
        background-color: #007bff;
        padding: 12px 40px;
        border-radius: 50px;
        color: white;
        transition: transform 0.3s ease;
    }

    .text-center button:hover {
        background-color: #0056b3;
        transform: translateY(-3px);
    }


    </style> --}}
    <!-- Bagian logo di kiri atas -->
    <div class="container mt-3">
        <div class="logo-container">
            <img src="{{ asset('img/logo1.png') }}" alt="logo">
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="text-center">CCTV Monitoring</h1>

        <!-- Form for IP Address and Port side by side -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h3 class="text-center">Ping IP Address</h3>
                    <form id="pingForm" action="{{ route('handlePingIp') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="ip_address">IP Address:</label>
                            <input type="text" name="ip_address" id="ip_address" class="form-control" placeholder="Masukkan IP Address" value="{{ old('ip_address') }}">
                            @error('ip_address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-ping">Ping IP</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-container">
                    <h3 class="text-center">Check Port</h3>
                    <form id="portForm" action="{{ route('handlePingPort') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="port">Port:</label>
                            <input type="text" name="port" id="port" class="form-control" placeholder="Masukkan Port" value="{{ old('port') }}">
                            @error('port')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-ping">Check Port</button>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-primary" onclick="window.location.href='{{ route('result-page') }}'">Result Page</button>
    </div>

    <footer>
        <p><a href="#"></a> &copy; 2024 mrnpal </p>
    </footer>
    
    


    <!-- Script untuk menangani alert berdasarkan status -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        // Cek apakah status dikirim dari server (PHP Laravel)
        @if(isset($status) && isset($ipAddress) && !isset($port))
            alert("{{ $status == 'success' ? 'Ping berhasil ke IP: ' . $ipAddress : 'Timeout: ' . $ipAddress }}");
        @endif
        
        @if(isset($status) && isset($port) && !isset($ipAddress))
            alert("{{ $status == 'success' ? 'Koneksi ke port ' . $port . ' berhasil!' : 'Gagal terkoneksi ke: ' . $port }}");
        @endif
    </script>
</body>
</html>
