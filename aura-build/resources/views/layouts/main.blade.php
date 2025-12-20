<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi, Neighbor. Need a hand around the house? | Neighborly</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    @stack('header_scripts')
</head>

<body class="antialiased bg-white">

    <x-header />

    <main>
        @yield('content')
    </main>

    <x-footer />

    {{-- Global Scripts --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            const menuIcon = document.getElementById('menuIcon');
            const closeIcon = document.getElementById('closeIcon');
            const isOpen = mobileMenu.style.maxHeight !== '0px';

            if (isOpen) {
                mobileMenu.style.maxHeight = '0px';
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            } else {
                mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            }
        }
    </script>
    
    @stack('footer_scripts')
</body>

</html>