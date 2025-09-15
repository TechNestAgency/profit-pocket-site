@extends('layouts.app')

@section('title', 'Profit Pocket - منصة التداول والاستثمار')
@section('description', 'البوصلة التي توجه المستثمر من ضبابية السوق إلى وضوح النتائج المضمونة')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                مرحباً بك في <span class="text-primary-200">Profit Pocket</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-primary-100">
                منصة التداول والاستثمار الرائدة في المنطقة العربية
            </p>
            <p class="text-lg mb-10 text-primary-200 max-w-3xl mx-auto">
            رؤيتك للسوق مستقبل ارباحك
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('about') }}" class="btn-primary bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 text-lg">
                    تعرف علينا
                </a>
                <a href="{{ route('contact') }}" class="btn-secondary bg-white text-primary-600 hover:bg-gray-100 font-bold py-3 px-8 text-lg">
                    اتصل بنا
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                لماذا تختار Profit Pocket؟
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                نقدم لك أفضل الأدوات والتحليلات لتحقيق أهدافك الاستثمارية
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">تحليل احترافي 👨🏻‍💻</h3>
                <p class="text-gray-600">
                    تحليل المشكله و دراسه الحل
                </p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">خطه مدروسة 💪🏻</h3>
                <p class="text-gray-600">
                    وضع استراتيجية واضحة لحل المشكله
                </p>
            </div>
            
            <div class="text-center">
                <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">نتايج مضمونه ✅</h3>
                <p class="text-gray-600">
                    نتايج مضمونة لاستثمار آمن
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Video Section -->
@if($videoSection)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ $videoSection->title }}
            </h2>
        </div>
        
        <div class="max-w-4xl mx-auto">
            <div class="relative w-full" style="padding-bottom: 56.25%;">
                <iframe 
                    class="absolute top-0 left-0 w-full h-full rounded-lg shadow-lg"
                    src="{{ $videoSection->embed_url }}"
                    title="{{ $videoSection->title }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>
@endif

<!-- What Profit Pocket Offers Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                ما يقدمه Profit Pocket
            </h2>
            <p class="text-xl text-gray-600">
                خدمات متكاملة لتحقيق أهدافك الاستثمارية
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
            @forelse($services as $service)
                <div class="card card-hover text-center">
                    <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 overflow-hidden">
                        @if($service->image)
                            <img src="{{ asset($service->image) }}" 
                                 alt="{{ $service->title }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <!-- Placeholder image icon -->
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        @endif
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $service->title }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ Str::limit($service->description, 150) }}
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('services.show', $service->id) }}" 
                           class="inline-flex items-center text-primary-600 hover:text-primary-800 font-medium text-sm transition-colors">
                            تفاصيل أكثر
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                <!-- Fallback if no services are available -->
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-600">لم يتم إضافة خدمات بعد</p>
                </div>
            @endforelse
        </div>
        
        @if($services->count() > 0)
            <div class="text-center mt-12">
                <a href="{{ route('services.index') }}" 
                   class="inline-flex items-center bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-6 rounded-lg transition-colors">
                    استعرض جميع خدماتنا
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                آراء عملائنا
            </h2>
            <p class="text-xl text-gray-600">
                ما يقوله عملاؤنا عن خدماتنا
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($testimonials as $testimonial)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        @if($testimonial->image)
                            <div class="w-12 h-12 rounded-full overflow-hidden">
                                <img src="{{ asset($testimonial->image) }}" 
                                     alt="{{ $testimonial->name }}" 
                                     class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                                <span class="text-primary-600 font-bold text-lg">{{ mb_substr($testimonial->name, 0, 1) }}</span>
                            </div>
                        @endif
                        <div class="mr-3">
                            <h4 class="font-semibold text-gray-900">{{ $testimonial->name }}</h4>
                            <p class="text-sm text-gray-600">{{ $testimonial->position }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm">
                        "{{ $testimonial->opinion }}"
                    </p>
                </div>
            @empty
                <!-- Fallback testimonials if none are available -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                            <span class="text-primary-600 font-bold text-lg">أ</span>
                        </div>
                        <div class="mr-3">
                            <h4 class="font-semibold text-gray-900">أحمد محمد</h4>
                            <p class="text-sm text-gray-600">مستثمر</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm">
                        "خدمة ممتازة وتوصيات دقيقة ساعدتني في تحقيق أرباح جيدة"
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                            <span class="text-primary-600 font-bold text-lg">ف</span>
                        </div>
                        <div class="mr-3">
                            <h4 class="font-semibold text-gray-900">فاطمة علي</h4>
                            <p class="text-sm text-gray-600">متداولة</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm">
                        "التحليلات الفنية متقدمة جداً والنتائج مذهلة"
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                            <span class="text-primary-600 font-bold text-lg">م</span>
                        </div>
                        <div class="mr-3">
                            <h4 class="font-semibold text-gray-900">محمد السعيد</h4>
                            <p class="text-sm text-gray-600">مستثمر</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm">
                        "فريق الخبراء محترف جداً والتوصيات موثوقة"
                    </p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                            <span class="text-primary-600 font-bold text-lg">س</span>
                        </div>
                        <div class="mr-3">
                            <h4 class="font-semibold text-gray-900">سارة أحمد</h4>
                            <p class="text-sm text-gray-600">متداولة</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm">
                        "منصة رائعة وسهلة الاستخدام مع نتائج ممتازة"
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-primary-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            ابدأ رحلتك الاستثمارية اليوم
        </h2>
        <p class="text-xl mb-8 text-primary-100 max-w-3xl mx-auto">
            انضم إلى آلاف المستثمرين الذين يثقون في توصياتنا وتحليلاتنا المتخصصة
        </p>
        <div class="flex justify-center">
            <a href="{{ route('contact') }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 text-lg rounded-lg transition-colors">
                ابدأ الآن
            </a>
        </div>
    </div>
</section>

@push('styles')
<style>
.testimonials-slider {
    position: relative;
    width: 100%;
    overflow: hidden;
}

.testimonials-container {
    display: flex;
    transition: transform 0.5s ease-in-out;
    width: 300%;
}

.testimonial-slide {
    width: 33.333%;
    flex-shrink: 0;
    padding: 0 1rem;
}

@media (max-width: 768px) {
    .testimonial-slide {
        padding: 0 0.5rem;
    }
}

/* Ensure navigation buttons are visible */
#prevBtn, #nextBtn {
    z-index: 20;
    background: white;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    border: none;
    cursor: pointer;
}

#prevBtn:hover, #nextBtn:hover {
    background: #f9fafb;
    transform: scale(1.05);
}

/* Dot indicators */
[data-slide] {
    cursor: pointer;
    transition: all 0.3s ease;
}

[data-slide]:hover {
    transform: scale(1.2);
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('testimonialsContainer');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dots = document.querySelectorAll('[data-slide]');
    
    if (!container || !prevBtn || !nextBtn) {
        console.error('Slider elements not found');
        return;
    }
    
    let currentSlide = 0;
    const totalSlides = 3; // Number of testimonials
    
    function updateSlider() {
        // Calculate the translateX value (each slide is 33.333% of the container width)
        const translateX = -currentSlide * (100 / totalSlides);
        container.style.transform = `translateX(${translateX}%)`;
        
        // Update dots
        dots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.remove('bg-gray-300', 'hover:bg-gray-400');
                dot.classList.add('bg-primary-600');
            } else {
                dot.classList.remove('bg-primary-600');
                dot.classList.add('bg-gray-300', 'hover:bg-gray-400');
            }
        });
        
        console.log(`Slide ${currentSlide + 1} of ${totalSlides}, translateX: ${translateX}%`);
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
    }
    
    function goToSlide(slideIndex) {
        if (slideIndex >= 0 && slideIndex < totalSlides) {
            currentSlide = slideIndex;
            updateSlider();
        }
    }
    
    // Event listeners
    nextBtn.addEventListener('click', function(e) {
        e.preventDefault();
        nextSlide();
    });
    
    prevBtn.addEventListener('click', function(e) {
        e.preventDefault();
        prevSlide();
    });
    
    dots.forEach((dot, index) => {
        dot.addEventListener('click', function(e) {
            e.preventDefault();
            goToSlide(index);
        });
    });
    
    // Auto-play functionality
    let autoPlayInterval = setInterval(nextSlide, 5000);
    
    // Pause auto-play on hover
    const slider = document.querySelector('.testimonials-slider');
    if (slider) {
        slider.addEventListener('mouseenter', () => {
            clearInterval(autoPlayInterval);
        });
        
        slider.addEventListener('mouseleave', () => {
            autoPlayInterval = setInterval(nextSlide, 5000);
        });
    }
    
    // Initialize
    updateSlider();
    
    // Add keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            prevSlide();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
        }
    });
});
</script>
@endpush
@endsection
