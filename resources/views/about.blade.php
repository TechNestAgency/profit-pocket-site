@extends('layouts.app')

@section('title', 'من نحن - Profit Pocket')
@section('description', 'تعرف على فريق Profit Pocket وخبرتنا في الأسواق المالية والتداول')

@section('content')
<!-- Header Section -->
<section class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                من نحن
            </h1>
            <p class="text-xl text-primary-100 max-w-3xl mx-auto">
                فريق متخصص من الخبراء في الأسواق المالية والتداول
            </p>
        </div>
    </div>
</section>

<!-- Company Overview -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                نبذة عن الشركة
            </h2>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    رؤيتنا:
                </h3>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    أن نكون المرجع الأول والأكثر ثقة في مجال التحليل الاحترافي وصياغة الخطط المدروسة التي تُمكّن عملاءنا من تحقيق نتائج مضمونة ومستدامة.
                </p>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    نسعى إلى بناء بيئة استثمارية متكاملة تقوم على الدقة والشفافية، وتُعزز ثقة عملائنا بنا عبر تقديم خدمات تعتمد على أحدث الأدوات والتقنيات العالمية في الإدارة والتحليل المالي.
                </p>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    ونطمح لأن نكون الشريك الاستراتيجي الذي يفتح آفاقًا جديدة لعملائه، من خلال تقديم حلول عملية، واستراتيجيات مستقبلية مرنة تتكيف مع تغيرات الأسواق، لنصنع معًا قصص نجاح طويلة الأمد تعكس قوة خبرتنا وريادتنا في هذا المجال.
                </p>
            </div>
            <div>
                <img src="{{ asset('images/GettyImages-1503239849-0dc8617d35594774b51c998694997431.jpg') }}" alt="فريق Profit Pocket" class="w-full h-96 object-cover rounded-xl shadow-lg">
            </div>
        </div>

        <div class="bg-gray-50 rounded-xl p-8 mb-16">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">
                ✨ ما نقدمه
            </h3>
            <p class="text-lg text-gray-600 leading-relaxed text-center">
                نحن نُدرك أن الكثير من المستثمرين يدخلون سوق المال دون بوصلة واضحة، فيتوهون وسط تعقيداته ولا يحققون الفائدة المرجوة.
            </p>
            <p class="text-lg text-gray-600 leading-relaxed text-center mt-4">
                في مؤسستنا، نصنع الفارق من خلال تقديم الحل الأمثل لكل مستثمر تائه، عبر تحليل احترافي يكشف الطريق، وخطط مدروسة ترسم المسار، ونتائج مضمونة تعيد الثقة وتحوّل السوق من عائق إلى فرصة حقيقية للنمو والنجاح.
            </p>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                الخدمات التي نقدمها
            </h2>
            <p class="text-xl text-gray-600">
                نقدم خدماتنا إلى كل مستثمر في سوق المال
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    ما هو الاستثمار الآمن؟
                </h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    الاستثمار الآمن هو النهج الذي يحافظ على رأس المال ويحميه من تقلبات السوق، مع تحقيق عوائد مستقرة ومستدامة على المدى الطويل.
                </p>
                <p class="text-gray-600 leading-relaxed mb-4">
                    هو استثمار يقوم على الدراسة والتحليل العميق، واتباع خطط مدروسة تراعي إدارة المخاطر، بعيدًا عن القرارات العشوائية أو المجازفات غير المحسوبة.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    الاستثمار الآمن يعني أن يكون للمستثمر رؤية واضحة، وخطة محكمة، وشريك موثوق يساعده على تحويل التحديات إلى فرص، وضمان استقرار رحلته في سوق المال.
                </p>
            </div>
            
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    الخدمات التي نقدمها
                </h3>
                <ul class="space-y-4 text-gray-600">
                    <li class="flex items-start">
                        <span class="text-primary-600 mr-3">•</span>
                        <span>تحليل متعمّق يكشف فرص الاستثمار بدقة.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-primary-600 mr-3">•</span>
                        <span>خطط استراتيجية تناسب أهدافك وتطلعاتك.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-primary-600 mr-3">•</span>
                        <span>إدارة مخاطر تضمن أمان رأس المال.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-primary-600 mr-3">•</span>
                        <span>استشارات متخصصة بخبرة نخبة المحللين.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-primary-600 mr-3">•</span>
                        <span>تقارير دورية تمنحك وضوحًا وشفافية كاملة.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                أهمية الاستشارات المالية
            </h2>
            <p class="text-xl text-gray-600">
                تلعب الاستشارات المالية دوراً هاماً وحيوياً في قراراتك المستقبلية
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">التغلب على عدم التأكد</h3>
                <p class="text-gray-600">
                    تساعد الاستشارات المالية في التغلب على حالات عدم التأكد التي يمكن أن تتعرض لها عند اتخاذ القرارات المصيرية وتمنعك من تحقيق أهدافك فهي السبيل الذي يضمن لك الربح والاستقرار
                </p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">برامج النمو</h3>
                <p class="text-gray-600">
                    تستخدم الاستشارات المالية في وضع برامج تساعدك في الحفاظ على نجاح استثمارك لفترات طويلة
                </p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">مواجهة التغييرات</h3>
                <p class="text-gray-600">
                    تساهم الاستشارات المالية في تعزيز قدرتك على مواجهة التغيرات السياسية والاقتصادية السريعة من حولك
                </p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">إدارة المخاطر</h3>
                <p class="text-gray-600">
                    تضمن الاستشارات المالية حلول ذكية لمواجهة مخاطر الاستثمار والحفاظ على رأس المال وخطة النمو وتوفير الوقت والجهد
                </p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">ضمان الاستقرار</h3>
                <p class="text-gray-600">
                    تساعدك الاستشارات المالية في وضع خطة طويلة الأمد لاستقرار استثمارك بدون تخبط
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                فريق العمل
            </h2>
            <p class="text-xl text-gray-600">
                نخبة من أمهر الكوادر في مجال التحليل المالي والتداول
            </p>
        </div>
        
        <div class="bg-white rounded-xl p-8 mb-12 shadow-lg">
            <p class="text-lg text-gray-600 leading-relaxed text-center">
                تأسست شركتنا بواسطة نخبة من أمهر الكوادر من الإداريين والمحللين الفنيين والماليين ومحترفي التداول في الأسواق المختلفة وفريق خدمة العملاء الذي يدعم عملائنا 24 ساعة خلال اليوم وقسم خاص بإدارة المخاطر مما يجعل لدينا الميزة التنافسية في السوق ويزيد قدرتنا على اقتناص الفرص الاستثمارية وهو ما يرسخ العلاقة القوية بيننا وبين عملائنا ويعزز من ثقة عملائنا بنا.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center bg-white rounded-xl p-6 shadow-lg">
                <div class="w-32 h-32 mx-auto mb-6">
                    <img src="{{ asset('images/20241117131647_stock-market-forex-trading-graph.webp') }}" alt="المحللين الفنيين" class="w-full h-full object-cover rounded-full">
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">المحللين الفنيين</h3>
                <p class="text-primary-600 font-medium mb-3">خبراء التحليل الفني</p>
                <p class="text-gray-600 text-sm">
                    نخبة من أفضل المحللين في الشرق الأوسط متخصصين في التحليل الفني والأساسي للأسواق المالية
                </p>
            </div>
            
            <div class="text-center bg-white rounded-xl p-6 shadow-lg">
                <div class="w-32 h-32 mx-auto mb-6">
                    <img src="{{ asset('images/gradient-stock-market-concept_23-2149166910.jpg') }}" alt="محترفي التداول" class="w-full h-full object-cover rounded-full">
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">محترفي التداول</h3>
                <p class="text-primary-600 font-medium mb-3">خبراء الأسواق المختلفة</p>
                <p class="text-gray-600 text-sm">
                    فريق من محترفي التداول في الأسواق المختلفة مع سنوات من الخبرة في الأسهم والعملات والمعادن
                </p>
            </div>
            
            <div class="text-center bg-white rounded-xl p-6 shadow-lg">
                <div class="w-32 h-32 mx-auto mb-6">
                    <img src="{{ asset('images/istockphoto-1487894858-612x612.jpg') }}" alt="إدارة المخاطر" class="w-full h-full object-cover rounded-full">
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">إدارة المخاطر</h3>
                <p class="text-primary-600 font-medium mb-3">قسم إدارة المخاطر</p>
                <p class="text-gray-600 text-sm">
                    قسم خاص بإدارة المخاطر يعمل على حماية استثمارات العملاء وتقليل المخاطر المحتملة
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Company Goals Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                هدف الشركة
            </h2>
            <p class="text-xl text-gray-600">
                أهدافنا الرئيسية في تقديم الاستشارات المالية
            </p>
        </div>
        
        <div class="bg-gray-50 rounded-xl p-8 shadow-lg">
            <p class="text-lg text-gray-600 leading-relaxed text-center mb-8">
                تكمن أهدافنا الرئيسية في تقديم الاستشارات المالية في الأسواق المختلفة اعتماداً على أهم الكوادر وأمهرها للوصول إلى أفضل الفرص الاستثمارية وإرشاد ودعم عملائنا دائماً بالقرارات السليمة لتسهيل عملية تداول عملائنا وتحقيق أعلى عائد على استثماراتهم بدون قلق أو خوف من المخاطر الاستثمارية اعتماداً على فريق عملنا الذي تم اختياره بعناية فائقة.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">الاستشارات المالية للأفراد</h3>
                    <p class="text-gray-600 leading-relaxed">
                        الاستشارات المالية للأفراد هي الطريقة المثلى التي تضمن لك حياة أفضل بدون مفاجآت حيث تمنحك الاستشارات المالية فكرة شاملة ومتكاملة عن كيفية تحقيق أهدافك في الحياة بطريقة مثالية وبدون مشاكل.
                    </p>
                </div>
                
                <div class="bg-white rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">خدمة 24 ساعة</h3>
                    <p class="text-gray-600 leading-relaxed">
                        فريق خدمة العملاء الذي يدعم عملائنا 24 ساعة خلال اليوم لمساندتهم في كل خطوة ومساعدتهم على اقتناص الفرص الاستثمارية المناسبة في الوقت المناسب.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-primary-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            انضم إلى رحلتنا الاستثمارية
        </h2>
        <p class="text-xl mb-8 text-primary-100 max-w-3xl mx-auto">
            ابدأ رحلتك في عالم التداول والاستثمار مع فريقنا المتخصص
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 text-lg rounded-lg transition-colors">
                تواصل معنا
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-white text-white hover:bg-white hover:text-primary-600 font-bold py-3 px-8 text-lg rounded-lg transition-colors">
                تواصل معنا
            </a>
        </div>
    </div>
</section>
@endsection
