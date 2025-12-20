<!-- Sticky Header -->
<header class="fixed z-50 bg-white/80 border-slate-200 border-b top-0 right-0 left-0 backdrop-blur-md">
    <div class="fixed z-50 w-full top-0 left-0">
    <!-- Secondary Top Header -->
    <div class="bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between py-2 text-xs sm:text-sm">
            <div class="flex items-center gap-2">
            <div class="w-5 h-5 bg-white rounded-full flex items-center justify-center">
                <span class="text-slate-900 text-xs font-bold">N</span>
            </div>
            <span class="text-slate-400">Your Hub for Home Services</span>
            </div>
            <div class="flex items-center gap-4">
            <a href="https://www.neighborlybrands.com/careers/" target="_blank" class="hidden md:inline hover:text-blue-400 transition-colors">
                Apply Locally
            </a>
            <a href="/contact-us" class="hidden md:inline hover:text-blue-400 transition-colors">
                Contact Us
            </a>
            <a href="https://franchise.neighborly.com/" target="_blank" class="hidden sm:inline hover:text-blue-400 transition-colors">
                Own a Franchise
            </a>
            <button class="text-slate-400 hover:text-white transition-colors">
                Sign In
            </button>
            </div>
        </div>
        </div>
    </div>

    <!-- Island Style Navigation -->
    <div class="transition-all duration-300 pt-3 px-4">
        <div class="sm:px-6 sm:py-4 bg-white/90 max-w-7xl border-slate-200 border rounded-full mr-auto ml-auto pt-3 pr-4 pb-3 pl-4 shadow-lg backdrop-blur-md">
        <div class="flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
            <img src="{{ asset('images/logo.svg') }}" alt="Neighborly Logo" class="h-8 w-auto">
            </a>

            <div class="hidden lg:flex gap-8 items-center">
            <a href="#services" class="text-sm font-medium text-slate-700 hover:text-blue-600 transition-colors">
                Services
            </a>
            <a href="/neighborly-done-right-promise" class="text-sm font-medium text-slate-700 hover:text-blue-600 transition-colors">
                Done Right Promise®
            </a>
            <a href="#about" class="text-sm font-medium text-slate-700 hover:text-blue-600 transition-colors">
                About
            </a>
            <a href="#expert-tips" class="text-sm font-medium text-slate-700 hover:text-blue-600 transition-colors">
                Expert Tips
            </a>
            </div>

            <a href="tel:18552178437" class="flex items-center gap-2 px-4 sm:px-6 py-2 sm:py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-full text-sm font-medium transition-all hover:shadow-lg hover:scale-105 group relative overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 relative z-10">
                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
            </svg>
            <span class="hidden lg:inline relative z-10">
                1-855-217-8437
            </span>
            <span class="lg:hidden relative z-10">Call</span>
            <div class="absolute inset-0 bg-yellow-400 transform scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-300"></div>
            </a>

            <button class="lg:hidden pt-2 pr-2 pb-2 pl-2" id="mobileMenuToggle" onclick="toggleMobileMenu()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6" id="menuIcon">
                <path d="M4 5h16"></path>
                <path d="M4 12h16"></path>
                <path d="M4 19h16"></path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 hidden" id="closeIcon">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="lg:hidden overflow-hidden transition-all duration-300 ease-in-out" style="max-height: 0px;">
            <div class="bg-white rounded-2xl mt-4 py-4 px-4 shadow-lg border border-slate-200">
            <!-- Main Nav Links -->
            <div class="flex flex-col gap-3 pb-4 border-b border-slate-200">
                <a href="#services" class="text-base font-medium py-2 transition-colors" style="color: #012552;">
                Services
                </a>
                <a href="/neighborly-done-right-promise" class="text-base font-medium py-2 transition-colors" style="color: #012552;">
                Done Right Promise®
                </a>
                <a href="#about" class="text-base font-medium py-2 transition-colors" style="color: #012552;">
                About
                </a>
                <a href="#expert-tips" class="text-base font-medium py-2 transition-colors" style="color: #012552;">
                Expert Tips
                </a>
            </div>
            <!-- Secondary Nav Links -->
            <div class="flex flex-col gap-2 pt-4">
                <a href="https://www.neighborlybrands.com/careers/" target="_blank" class="text-sm py-1.5 transition-colors" style="color: #012552;">
                Apply Locally
                </a>
                <a href="/contact-us" class="text-sm py-1.5 transition-colors" style="color: #012552;">
                Contact Us
                </a>
                <a href="https://franchise.neighborly.com/" target="_blank" class="text-sm py-1.5 transition-colors" style="color: #012552;">
                Own a Franchise
                </a>
                <button class="text-sm py-1.5 text-left transition-colors" style="color: #012552;">
                Sign In
                </button>
            </div>
            </div>
        </div>

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
        </div>
    </div>
    </div>
</header>