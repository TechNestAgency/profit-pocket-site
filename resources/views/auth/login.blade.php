<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول - لوحة التحكم</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            min-height: 100vh;
            font-family: 'Cairo', 'Tajawal', Arial, sans-serif;
        }
        .login-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .input-group {
            position: relative;
        }
        .input-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }
        .form-input {
            padding-right: 45px;
        }
    </style>
</head>
<body class="font-arabic antialiased">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-sm w-full">
            <!-- Login Card -->
            <div class="login-card rounded-2xl p-6 space-y-5">
                <!-- Header -->
                <div class="text-center">
                    <div class="mx-auto h-12 w-12 bg-primary-100 rounded-full flex items-center justify-center mb-3">
                        <img class="h-8 w-auto" src="{{ asset('logo.png') }}" alt="Profit Pocket">
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 mb-1">
                        تسجيل الدخول
                    </h2>
                    <p class="text-xs text-gray-600">
                        لوحة تحكم Profit Pocket
                    </p>
                </div>
                
                <!-- Login Form -->
                <form class="space-y-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="input-group">
                        <label for="email" class="block text-xs font-medium text-gray-700 mb-1">البريد الإلكتروني</label>
                        <div class="relative">
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                   class="form-input w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200" 
                                   placeholder="أدخل بريدك الإلكتروني" value="{{ old('email') }}">
                            <div class="input-icon">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="input-group">
                        <label for="password" class="block text-xs font-medium text-gray-700 mb-1">كلمة المرور</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" autocomplete="current-password" required 
                                   class="form-input w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200" 
                                   placeholder="أدخل كلمة المرور">
                            <div class="input-icon">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 px-3 py-2 rounded-lg">
                            <div class="flex">
                                <svg class="w-4 h-4 text-red-400 ml-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <p class="text-xs font-medium">خطأ في البيانات</p>
                                    <ul class="mt-1 text-xs list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Login Button -->
                    <button type="submit" 
                            class="w-full flex justify-center items-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-200 transform hover:scale-[1.02]">
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        تسجيل الدخول
                    </button>
                </form>

                <!-- Demo Credentials -->
                <div class="bg-primary-50 border border-primary-200 rounded-lg p-3">
                    <div class="flex items-start">
                        <svg class="w-4 h-4 text-primary-400 ml-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h4 class="text-xs font-medium text-primary-800 mb-1">بيانات الدخول التجريبية</h4>
                            <div class="text-xs text-primary-700 space-y-0.5">
                                <p><span class="font-medium">البريد:</span> admin@profitpocket.com</p>
                                <p><span class="font-medium">كلمة المرور:</span> admin123</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center pt-3 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        © {{ date('Y') }} Profit Pocket. جميع الحقوق محفوظة.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
