<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'لوحة التحكم - Profit Pocket')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Sidebar responsive styles */
        @media (max-width: 1023px) {
            #sidebar {
                transform: translateX(100%);
            }
            #sidebar.sidebar-open {
                transform: translateX(0);
            }
        }
        
        @media (min-width: 1024px) {
            #sidebar {
                transform: translateX(0) !important;
            }
        }
        
        /* Prevent body scroll when sidebar is open on mobile */
        body.sidebar-open {
            overflow: hidden;
        }
    </style>
</head>
<body class="font-arabic antialiased bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <div class="flex h-screen">
        <!-- Mobile Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>
        
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar-transition bg-gradient-to-b from-slate-900 to-slate-800 text-white w-72 flex-shrink-0 shadow-2xl fixed lg:relative inset-y-0 right-0 z-50 lg:translate-x-0 -translate-x-full">
            <!-- Logo Section -->
            <div class="flex items-center justify-between h-20 px-6 border-b border-slate-700/50">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <img class="h-6 w-6" src="{{ asset('logo.png') }}" alt="Profit Pocket">
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white">Profit Pocket</h1>
                        <p class="text-xs text-slate-400">لوحة التحكم</p>
                    </div>
                </div>
                <!-- Close button for mobile -->
                <button id="sidebar-close" class="lg:hidden p-2 text-slate-400 hover:text-white hover:bg-slate-700/50 rounded-lg transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-8 px-4">
                <div class="space-y-2">
                    <a href="{{ route('dashboard.index') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard.index') ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg shadow-blue-500/25' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg {{ request()->routeIs('dashboard.index') ? 'bg-white/20' : 'bg-slate-700/50 group-hover:bg-slate-600/50' }} transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                            </svg>
                        </div>
                        <span class="mr-3">الرئيسية</span>
                    </a>
                    
                    
                    <a href="{{ route('dashboard.contacts') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard.contacts') ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg shadow-blue-500/25' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg {{ request()->routeIs('dashboard.contacts') ? 'bg-white/20' : 'bg-slate-700/50 group-hover:bg-slate-600/50' }} transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="mr-3">استفسارات العملاء</span>
                    </a>
                    
                    <a href="{{ route('dashboard.recommendations.index') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard.recommendations.*') ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg shadow-blue-500/25' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg {{ request()->routeIs('dashboard.recommendations.*') ? 'bg-white/20' : 'bg-slate-700/50 group-hover:bg-slate-600/50' }} transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <span class="mr-3">تقارير استثمارية مدروسة</span>
                    </a>
                    
                    <a href="{{ route('dashboard.technical-indicators.index') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard.technical-indicators.*') ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg shadow-blue-500/25' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg {{ request()->routeIs('dashboard.technical-indicators.*') ? 'bg-white/20' : 'bg-slate-700/50 group-hover:bg-slate-600/50' }} transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                            </svg>
                        </div>
                        <span class="mr-3">مؤشرات فنية</span>
                    </a>
                    
                    <a href="{{ route('dashboard.services.index') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard.services.*') ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg shadow-blue-500/25' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg {{ request()->routeIs('dashboard.services.*') ? 'bg-white/20' : 'bg-slate-700/50 group-hover:bg-slate-600/50' }} transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2z"></path>
                            </svg>
                        </div>
                        <span class="mr-3">إدارة الخدمات</span>
                    </a>
                    
                    <a href="{{ route('dashboard.experts.index') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard.experts.*') ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg shadow-blue-500/25' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg {{ request()->routeIs('dashboard.experts.*') ? 'bg-white/20' : 'bg-slate-700/50 group-hover:bg-slate-600/50' }} transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span class="mr-3">إدارة الخبراء</span>
                    </a>
                    
                    <a href="{{ route('dashboard.settings') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard.settings') ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg shadow-blue-500/25' : 'text-slate-300 hover:bg-slate-700/50 hover:text-white' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg {{ request()->routeIs('dashboard.settings') ? 'bg-white/20' : 'bg-slate-700/50 group-hover:bg-slate-600/50' }} transition-colors duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="mr-3">الإعدادات</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden lg:mr-0 mr-0">
            <!-- Top Navigation -->
            <header class="glass-effect border-b border-gray-200/50 backdrop-blur-md">
                <div class="flex items-center justify-between h-20 px-8">
                    <div class="flex items-center space-x-4">
                        <button id="sidebar-toggle" class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-600">
                            <svg id="menu-icon" class="h-6 w-6 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'لوحة التحكم')</h1>
                            <p class="text-sm text-gray-500">مرحباً بك في لوحة التحكم</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-reverse space-x-6">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all duration-200">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4 19h6v-6H4v6zM4 5h6V1H4v4zM15 7h5l-5-5v5z"></path>
                            </svg>
                            <span class="absolute -top-1 -right-1 h-4 w-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                        </button>
                        
                        <!-- User Profile -->
                        <div class="flex items-center space-x-3">
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900">{{ session('admin_email') }}</p>
                                <p class="text-xs text-gray-500">مدير النظام</p>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-sm">{{ substr(session('admin_email'), 0, 1) }}</span>
                            </div>
                        </div>
                        
                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gradient-to-br from-gray-50 via-white to-gray-100">
                <div class="container mx-auto px-8 py-10">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        // Sidebar toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebarClose = document.getElementById('sidebar-close');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const menuIcon = document.getElementById('menu-icon');
            let isSidebarOpen = false;

            // Toggle sidebar
            function toggleSidebar() {
                isSidebarOpen = !isSidebarOpen;
                
                if (isSidebarOpen) {
                    sidebar.classList.add('sidebar-open');
                    sidebarOverlay.classList.remove('hidden');
                    document.body.classList.add('sidebar-open');
                    menuIcon.style.transform = 'rotate(90deg)';
                } else {
                    sidebar.classList.remove('sidebar-open');
                    sidebarOverlay.classList.add('hidden');
                    document.body.classList.remove('sidebar-open');
                    menuIcon.style.transform = 'rotate(0deg)';
                }
            }

            // Close sidebar
            function closeSidebar() {
                isSidebarOpen = false;
                sidebar.classList.remove('sidebar-open');
                sidebarOverlay.classList.add('hidden');
                document.body.classList.remove('sidebar-open');
                menuIcon.style.transform = 'rotate(0deg)';
            }

            // Toggle button event
            sidebarToggle.addEventListener('click', toggleSidebar);

            // Close button event
            sidebarClose.addEventListener('click', closeSidebar);

            // Overlay click event
            sidebarOverlay.addEventListener('click', closeSidebar);

            // Close sidebar on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && isSidebarOpen) {
                    closeSidebar();
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) { // lg breakpoint
                    // On desktop, always show sidebar and remove mobile classes
                    sidebar.classList.remove('sidebar-open');
                    sidebarOverlay.classList.add('hidden');
                    document.body.classList.remove('sidebar-open');
                    menuIcon.style.transform = 'rotate(0deg)';
                    isSidebarOpen = false;
                } else {
                    // On mobile, ensure sidebar is closed by default
                    if (!isSidebarOpen) {
                        sidebar.classList.remove('sidebar-open');
                        sidebarOverlay.classList.add('hidden');
                        document.body.classList.remove('sidebar-open');
                        menuIcon.style.transform = 'rotate(0deg)';
                    }
                }
            });

            // Initialize sidebar state based on screen size
            if (window.innerWidth < 1024) {
                sidebar.classList.remove('sidebar-open');
                sidebarOverlay.classList.add('hidden');
                menuIcon.style.transform = 'rotate(0deg)';
            }
        });
    </script>
</body>
</html>
