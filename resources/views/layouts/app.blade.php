
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Service Motor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f3f5f9;
        }

        .sidebar {
            min-height: 100vh;
            background: #172554;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background: #2563eb;
        }

        .content {
            padding: 30px;
        }

        .card {
            border: none;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 sidebar p-3">
            <h4 class="text-white mb-4">🏍 Service Motor</h4>

            <a href="{{ route('crud.index','pelanggan') }}">
                Data Pelanggan
            </a>

            <a href="{{ route('crud.index','kendaraan') }}">
                Data Kendaraan
            </a>

            <a href="{{ route('crud.index','daftar-service') }}">
                Daftar Service
            </a>

            <a href="{{ route('crud.index','data-service') }}">
                Data Service
            </a>

            <a href="{{ route('crud.index','pembayaran') }}">
                Pembayaran
            </a>
        </div>

        <div class="col-md-10 content">

            <h3 class="mb-4">Aplikasi Service Motor</h3>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa kembali data:</strong>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

        </div>

    </div>
</div>

</body>
</html>
