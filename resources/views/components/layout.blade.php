<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link rel="icon" href="{{ Vite::asset('resources/images/favicon.png') }}" />
    <title>Pixel Positions</title>
    {{-- font --}}
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link
        href='https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap'
        rel='stylesheet'>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class='pb-20 text-white bg-black font-hanken-grotesk'>
    <div class='px-10'>
        <nav class='flex items-center justify-between py-4 border-b border-white/10'>
            <div>
                <a href='/'>
                    {{-- Vite is a global alias of \Illuminate\Support\Facades\Vite --}}
                    <img src='{{ Vite::asset('resources/images/logo.svg') }}' alt='Pixel Position'>
                </a>
            </div>

            <div class='space-x-6 font-bold'>
                <a href='/'>Jobs</a>
                <a href='#'>Careers</a>
                <a href='#'>Salaries</a>
                <a href='#'>Companies</a>
            </div>

            @auth
                <div class="flex space-x-6 font-bold">
                    <a href="/jobs/create">Post a Job</a>

                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')

                        <button>Log Out</button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="space-x-6 font-bold">
                    <a href="/register">Sign Up</a>
                    <a href="/login">Log In</a>
                </div>
            @endguest
        </nav>

        <main class='mt-10 max-w-[986px] mx-auto'>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
