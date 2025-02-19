<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Market</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* Custom styles for Market project */
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f8fafc;
                color: #333;
            }
            .header {
                background-color: #4a5568;
                color: #fff;
                padding: 1rem;
                text-align: center;
            }
            .content {
                padding: 2rem;
                text-align: center;
            }
            .footer {
                background-color: #4a5568;
                color: #fff;
                padding: 1rem;
                text-align: center;
                position: fixed;
                width: 100%;
                bottom: 0;
            }
            .links a {
                color: #fff;
                background-color: #4a5568;
                padding: 0.5rem 1rem;
                margin: 0 0.5rem;
                text-decoration: none;
                font-weight: 600;
                border-radius: 5px;
                transition: background-color 0.3s;
            }
            .links a:hover {
                background-color: #2d3748;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="header">
            <h1>Welcome to Market</h1>
        </div>

        <div class="content">
            <p>Your one-stop shop for all your market needs.</p>
        </div>

        <div class="footer">
            @if (Route::has('login'))
                <div class="links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>