<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800">

    @include('components.navbar')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('components.footer')
    <div id="cookie-banner"
        class="fixed bottom-0 left-0 w-full bg-white border-t shadow-lg p-4 flex justify-between items-center">

        <p class="text-sm text-gray-600">
        Ta strona używa plików cookies w celu poprawy działania serwisu.
        </p>

        <button onclick="acceptCookies()"
        class="bg-blue-500 text-white px-4 py-2 rounded">
        Akceptuję
        </button>

        </div>

        <script>

        if(localStorage.getItem("cookiesAccepted")){
            document.getElementById("cookie-banner").style.display = "none";
        }

        function acceptCookies(){
            localStorage.setItem("cookiesAccepted", true);
            document.getElementById("cookie-banner").style.display = "none";
        }

        </script>
</body>
</html>