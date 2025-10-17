<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Softrang Dashboard')</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('vendor/ecommerce-dashboard/images/favicon.png') }}">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('vendor/ecommerce-dashboard/css/style.css') }}">

    {{-- Additional Page Styles --}}
    @stack('styles')

   
</head>
<body>

    {{-- Sidebar --}}
    <aside class="sidebar">
        <h2>🧭 Softrang</h2>
        
    </aside>

    {{-- Main Content --}}
    <div class="main-content">
        <div class="topbar">
            <h1>@yield('page_title', 'Dashboard')</h1>
            <div class="user-info">
                <img src="{{ asset('vendor/ecommerce-dashboard/images/user.png') }}" alt="User">
                <span>{{ Auth::user()->name ?? 'Guest' }}</span>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>

        <footer>
            © {{ date('Y') }} Softrang — All Rights Reserved
        </footer>
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('vendor/ecommerce-dashboard/js/main.js') }}"></script>

    @stack('scripts')
</body>
</html>
