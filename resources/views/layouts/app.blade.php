<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', ($settings['site_name'] ?? 'Profit Pocket') . ' - منصة التداول والاستثمار')</title>
    <meta name="description" content="@yield('description', $settings['site_description'] ?? 'منصة متخصصة في التداول والاستثمار في الأسواق المالية مع توصيات حصرية ومؤشرات فنية متقدمة')">
    <meta name="keywords" content="تداول, استثمار, أسواق مالية, توصيات, مؤشرات فنية, بورصة, أسهم, عملات رقمية">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', ($settings['site_name'] ?? 'Profit Pocket') . ' - منصة التداول والاستثمار')">
    <meta property="og:description" content="@yield('description', $settings['site_description'] ?? 'منصة متخصصة في التداول والاستثمار في الأسواق المالية مع توصيات حصرية ومؤشرات فنية متقدمة')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('logo.png') }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', ($settings['site_name'] ?? 'Profit Pocket') . ' - منصة التداول والاستثمار')">
    <meta name="twitter:description" content="@yield('description', $settings['site_description'] ?? 'منصة متخصصة في التداول والاستثمار في الأسواق المالية مع توصيات حصرية ومؤشرات فنية متقدمة')">
    <meta name="twitter:image" content="{{ asset('logo.png') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cairo:200,300,400,500,600,700,800,900" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="font-arabic antialiased">
    <div id="app">
        <!-- Navigation -->
        <nav class="bg-primary-600 shadow-lg sticky top-0 z-50 py-2 border-b border-primary-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('home') }}" class="flex items-center">
                            <img class="h-16 w-auto" src="{{ asset('logo.png') }}" alt="Profit Pocket">
                            <span class="mr-3 text-xl font-bold text-white">{{ $settings['site_name'] ?? 'Profit Pocket' }}</span>
                        </a>
                    </div>
                    
                    <!-- Desktop Navigation -->
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-reverse space-x-4">
                            <a href="{{ route('home') }}" class="text-white hover:text-primary-200 px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'text-primary-200 bg-primary-700' : '' }}">
                                الرئيسية
                            </a>
                            <a href="{{ route('recommendations.index') }}" class="text-white hover:text-primary-200 px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('recommendations.*') ? 'text-primary-200 bg-primary-700' : '' }}">
                                تقارير استثمارية مدروسة
                            </a>
                            <a href="{{ route('technical-indicators.index') }}" class="text-white hover:text-primary-200 px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('technical-indicators.*') ? 'text-primary-200 bg-primary-700' : '' }}">
                                مؤشرات فنية
                            </a>
                            <a href="{{ route('services.index') }}" class="text-white hover:text-primary-200 px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('services.*') ? 'text-primary-200 bg-primary-700' : '' }}">
                                خدماتنا
                            </a>
                            <a href="{{ route('experts.index') }}" class="text-white hover:text-primary-200 px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('experts.*') ? 'text-primary-200 bg-primary-700' : '' }}">
                                خبراء Profit Pocket
                            </a>
                            <a href="{{ route('about') }}" class="text-white hover:text-primary-200 px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('about') ? 'text-primary-200 bg-primary-700' : '' }}">
                                من نحن
                            </a>
                            <a href="{{ route('contact') }}" class="text-white hover:text-primary-200 px-3 py-2 rounded-md text-sm font-medium transition-colors {{ request()->routeIs('contact') ? 'text-primary-200 bg-primary-700' : '' }}">
                                اتصل بنا
                            </a>
                        </div>
                    </div>
                    
                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button type="button" class="bg-primary-700 inline-flex items-center justify-center p-2 rounded-md text-white hover:text-primary-200 hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-300" aria-controls="mobile-menu" aria-expanded="false" onclick="toggleMobileMenu()">
                            <span class="sr-only">فتح القائمة الرئيسية</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div class="md:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-primary-700 border-t border-primary-800">
                    <a href="{{ route('home') }}" class="text-white hover:text-primary-200 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'text-primary-200 bg-primary-800' : '' }}">
                        الرئيسية
                    </a>
                    <a href="{{ route('recommendations.index') }}" class="text-white hover:text-primary-200 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('recommendations.*') ? 'text-primary-200 bg-primary-800' : '' }}">
                        تقارير استثمارية مدروسة
                    </a>
                    <a href="{{ route('technical-indicators.index') }}" class="text-white hover:text-primary-200 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('technical-indicators.*') ? 'text-primary-200 bg-primary-800' : '' }}">
                        مؤشرات فنية
                    </a>
                    <a href="{{ route('services.index') }}" class="text-white hover:text-primary-200 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('services.*') ? 'text-primary-200 bg-primary-800' : '' }}">
                        خدماتنا
                    </a>
                    <a href="{{ route('experts.index') }}" class="text-white hover:text-primary-200 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('experts.*') ? 'text-primary-200 bg-primary-800' : '' }}">
                        خبراء Profit Pocket
                    </a>
                    <a href="{{ route('about') }}" class="text-white hover:text-primary-200 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about') ? 'text-primary-200 bg-primary-800' : '' }}">
                        من نحن
                    </a>
                    <a href="{{ route('contact') }}" class="text-white hover:text-primary-200 block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('contact') ? 'text-primary-200 bg-primary-800' : '' }}">
                        اتصل بنا
                    </a>
                </div>
            </div>
        </nav>
        
        <!-- Main Content -->
        <main>
            @yield('content')
        </main>
        
        <!-- Footer -->
        <footer class="bg-primary-900 text-white">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center mb-4">
                            <img class="h-8 w-auto" src="{{ asset('logo.png') }}" alt="Profit Pocket">
                            <span class="mr-3 text-xl font-bold text-white">{{ $settings['site_name'] ?? 'Profit Pocket' }}</span>
                        </div>
                        <p class="text-gray-300 mb-4">
                            {{ $settings['site_description'] ?? 'منصة متخصصة في التداول والاستثمار في الأسواق المالية مع توصيات حصرية ومؤشرات فنية متقدمة لمساعدتك في اتخاذ قرارات استثمارية مدروسة.' }}
                        </p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-4">روابط سريعة</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition-colors">الرئيسية</a></li>
                            <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors">من نحن</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-4">تواصل معنا</h3>
                        <ul class="space-y-2">
                            <li class="text-gray-300">البريد الإلكتروني: {{ $settings['contact_email'] ?? 'info@profitpocket.com' }}</li>
                            <li class="text-gray-300">الهاتف: {{ $settings['contact_phone'] ?? '+966 50 123 4567' }}</li>
                            <li class="text-gray-300">{{ $settings['address'] ?? 'الرياض، المملكة العربية السعودية' }}</li>
                        </ul>
                        
                        <!-- Social Media Icons -->
                        <div class="mt-6">
                            <h4 class="text-sm font-semibold mb-3 text-gray-300">تابعنا على</h4>
                            <div class="flex flex-wrap gap-2">
                                @if($socialSettings['facebook_url'] ?? null)
                                <a href="{{ $socialSettings['facebook_url'] }}" target="_blank" class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition-colors">
                                    <svg class="w-4 h-4" fill="#1877F2" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                @endif
                                
                                @if($socialSettings['telegram_url'] ?? null)
                                <a href="{{ $socialSettings['telegram_url'] }}" target="_blank" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition-colors">
                                    <svg class="w-4 h-4" fill="#0088CC" viewBox="0 0 24 24">
                                        <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                                    </svg>
                                </a>
                                @endif
                                
                                @if($socialSettings['snapchat_url'] ?? null)
                                <a href="{{ $socialSettings['snapchat_url'] }}" target="_blank" class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600 transition-colors">
                                    <svg class="w-4 h-4" fill="#FFFC00" viewBox="0 0 24 24">
                                        <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                                    </svg>
                                </a>
                                @endif
                                
                                @if($socialSettings['youtube_url'] ?? null)
                                <a href="{{ $socialSettings['youtube_url'] }}" target="_blank" class="bg-red-600 text-white p-2 rounded-lg hover:bg-red-700 transition-colors">
                                    <svg class="w-4 h-4" fill="#FF0000" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                </a>
                                @endif
                                
                                @if($socialSettings['linkedin_url'] ?? null)
                                <a href="{{ $socialSettings['linkedin_url'] }}" target="_blank" class="bg-blue-700 text-white p-2 rounded-lg hover:bg-blue-800 transition-colors">
                                    <svg class="w-4 h-4" fill="#0077B5" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-primary-800 mt-8 pt-8 text-center">
                    <p class="text-gray-400">&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'Profit Pocket' }}. جميع الحقوق محفوظة.</p>
                </div>
            </div>
        </footer>
    </div>
    
    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        }
    </script>
    
    @stack('scripts')
</body>
</html>
