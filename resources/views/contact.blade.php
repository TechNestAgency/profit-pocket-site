@extends('layouts.app')

@section('title', 'اتصل بنا - ' . ($settings['site_name'] ?? 'Profit Pocket'))
@section('description', 'تواصل مع فريق Profit Pocket للحصول على استشارات استثمارية مخصصة')

@section('content')
<!-- Header Section -->
<section class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                اتصل بنا
            </h1>
            <p class="text-xl text-primary-100 max-w-3xl mx-auto">
                نحن هنا لمساعدتك في رحلتك الاستثمارية
            </p>
        </div>
    </div>
</section>

<!-- Contact Form & Info -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    أرسل لنا رسالة
                </h2>
                
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                        <div class="flex">
                            <svg class="w-5 h-5 text-green-400 ml-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <form class="space-y-6" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">الاسم</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('name') border-red-500 @enderror" placeholder="اسمك الكامل" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني (اختياري)</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('email') border-red-500 @enderror" placeholder="example@email.com">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('phone') border-red-500 @enderror" placeholder="+966 50 123 4567">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">الموضوع</label>
                        <select id="subject" name="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('subject') border-red-500 @enderror" required>
                            <option value="">اختر الموضوع</option>
                            <option value="استشارة استثمارية" {{ old('subject') == 'استشارة استثمارية' ? 'selected' : '' }}>استشارة استثمارية</option>
                            <option value="طلب توصيات" {{ old('subject') == 'طلب توصيات' ? 'selected' : '' }}>طلب توصيات</option>
                            <option value="تحليل فني" {{ old('subject') == 'تحليل فني' ? 'selected' : '' }}>تحليل فني</option>
                            <option value="استفسار عام" {{ old('subject') == 'استفسار عام' ? 'selected' : '' }}>استفسار عام</option>
                            <option value="شراكة" {{ old('subject') == 'شراكة' ? 'selected' : '' }}>شراكة</option>
                        </select>
                        @error('subject')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">الرسالة</label>
                        <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('message') border-red-500 @enderror" placeholder="اكتب رسالتك هنا..." required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" class="w-full btn-primary text-lg py-3">
                        إرسال الرسالة
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    معلومات التواصل
                </h2>
                
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="bg-primary-100 p-3 rounded-lg ml-4">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">الهاتف</h3>
                            <p class="text-gray-600">{{ $settings['contact_phone'] ?? '+966 50 123 4567' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-primary-100 p-3 rounded-lg ml-4">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">البريد الإلكتروني</h3>
                            <p class="text-gray-600">{{ $settings['contact_email'] ?? 'info@profitpocket.com' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-primary-100 p-3 rounded-lg ml-4">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">العنوان</h3>
                            <p class="text-gray-600">{{ $settings['address'] ?? 'الرياض، المملكة العربية السعودية' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-primary-100 p-3 rounded-lg ml-4">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">ساعات العمل</h3>
                            <p class="text-gray-600">الأحد - الخميس: 9:00 ص - 6:00 م</p>
                            <p class="text-gray-600">الجمعة - السبت: مغلق</p>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">تابعنا على</h3>
                    <div class="flex flex-wrap gap-3">
                        @if($socialSettings['facebook_url'] ?? null)
                        <a href="{{ $socialSettings['facebook_url'] }}" target="_blank" class="bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition-colors">
                            <svg class="w-5 h-5" fill="#1877F2" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        @endif
                        
                        @if($socialSettings['telegram_url'] ?? null)
                        <a href="{{ $socialSettings['telegram_url'] }}" target="_blank" class="bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="#0088CC" viewBox="0 0 24 24">
                                <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                            </svg>
                        </a>
                        @endif
                        
                        @if($socialSettings['snapchat_url'] ?? null)
                        <a href="{{ $socialSettings['snapchat_url'] }}" target="_blank" class="bg-yellow-500 text-white p-3 rounded-lg hover:bg-yellow-600 transition-colors">
                            <svg class="w-5 h-5" fill="#FFFC00" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                            </svg>
                        </a>
                        @endif
                        
                        @if($socialSettings['youtube_url'] ?? null)
                        <a href="{{ $socialSettings['youtube_url'] }}" target="_blank" class="bg-red-600 text-white p-3 rounded-lg hover:bg-red-700 transition-colors">
                            <svg class="w-5 h-5" fill="#FF0000" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                        @endif
                        
                        @if($socialSettings['linkedin_url'] ?? null)
                        <a href="{{ $socialSettings['linkedin_url'] }}" target="_blank" class="bg-blue-700 text-white p-3 rounded-lg hover:bg-blue-800 transition-colors">
                            <svg class="w-5 h-5" fill="#0077B5" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                الأسئلة الشائعة
            </h2>
            <p class="text-xl text-gray-600">
                إجابات على أكثر الأسئلة شيوعاً
            </p>
        </div>
        
        <div class="max-w-3xl mx-auto space-y-6">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">هل التقارير الاستثمارية المدروسة مجانية؟</h3>
                <p class="text-gray-600">
                    نعم، جميع التقارير الاستثمارية المدروسة والمؤشرات الفنية متاحة مجاناً على موقعنا. نحن نؤمن بتوفير المعرفة المالية للجميع.
                </p>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">كم مرة يتم تحديث التقارير الاستثمارية المدروسة؟</h3>
                <p class="text-gray-600">
                    نقوم بتحديث التقارير الاستثمارية المدروسة يومياً بناءً على تحليل الأسواق والأخبار المالية. كما نقدم تحليلات فورية للأحداث المهمة.
                </p>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">هل تقدمون استشارات شخصية؟</h3>
                <p class="text-gray-600">
                    نعم، نقدم استشارات استثمارية شخصية للعملاء. يمكنك التواصل معنا عبر النموذج أعلاه أو الهاتف.
                </p>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">ما هي الأسواق التي تغطونها؟</h3>
                <p class="text-gray-600">
                    نغطي الأسهم السعودية، العملات الرقمية، السلع، والأسهم العالمية. نركز بشكل خاص على السوق السعودي.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
