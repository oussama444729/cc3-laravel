<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Management System</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery UI CSS -->
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet">
    <!-- Custom CSS -->

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="min-vh-100 d-flex flex-column">
    <header class="bg-dark text-white shadow-sm">
        <nav class="container d-flex justify-content-between align-items-center py-3">
            <h1 class="h3 mb-0 fw-bold">Stock Management System</h1>

            <a href="{{ route('dashboard') }}" class="btn btn-outline-light">dashboard</a>

            {{-- button logout --}}

            <form method="POST" action="{{ route('logout') }}" >
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Se déconnecter</button>
             </form>

             {{-- button the profil  --}}
               <a href="{{ route('profile') }}" class="btn btn-primary me-2">Mon profil</a>
        </nav>
    </header>

    <main class="container flex-grow-1 py-4">
        @yield('content')
    </main>

   
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('scripts')

    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Stock Management System. All rights reserved.</p>
        </div>
    </footer>

    
    
</body>

</html>