<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="nav-buttons">
                <a href="{{ url('/slots') }}" class="btn">Slots</a>
                <a href="{{ url('/support') }}" class="btn">Support</a>
                @guest
                    <a href="{{ route('login') }}" class="btn">Login</a>
                    <a href="{{ route('register') }}" class="btn">Register</a>
                @else
                    <div class="profile-btn">
                        <a href="{{ route('profile.show') }}" class="btn">{{ Auth::user()->name }}</a>
                        <div class="balance-tooltip">Balance: ${{ number_format(Auth::user()->balance, 2) }}</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="btn">
                        @csrf
                        <button type="submit" class="btn">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
