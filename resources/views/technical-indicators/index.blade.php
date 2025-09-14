@extends('layouts.app')

@section('title', 'مؤشرات فنية - ' . ($settings['site_name'] ?? 'Profit Pocket'))
@section('description', 'تصفح أحدث المؤشرات الفنية والتحليلات المتقدمة للأسواق المالية من فريق Profit Pocket')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">مؤشرات فنية</h1>
            <p class="text-xl text-primary-100 max-w-3xl mx-auto">
                تصفح أحدث المؤشرات الفنية والتحليلات المتقدمة للأسواق المالية من فريقنا من الخبراء
            </p>
        </div>
    </div>
</section>

<!-- Technical Indicators Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($technicalIndicators->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($technicalIndicators as $indicator)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        @if($indicator->category_image)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset($indicator->category_image) }}" 
                                     alt="{{ $indicator->title }}" 
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                                {{ $indicator->title }}
                            </h3>
                            
                            @if($indicator->description)
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit($indicator->description, 120) }}
                                </p>
                            @endif
                            
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-500">
                                    @if($indicator->published_at)
                                        <i class="fas fa-calendar-alt ml-1"></i>
                                        {{ $indicator->published_at->format('Y-m-d') }}
                                    @endif
                                </div>
                                
                                <a href="{{ route('technical-indicators.show', $indicator->id) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-primary-600 text-white text-sm font-medium rounded-md hover:bg-primary-700 transition-colors">
                                    اقرأ المزيد
                                    <i class="fas fa-arrow-left mr-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <i class="fas fa-chart-bar text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">لا توجد مؤشرات فنية متاحة حالياً</h3>
                    <p class="text-gray-600">سيتم إضافة مؤشرات فنية جديدة قريباً. تابعونا للحصول على أحدث التحليلات.</p>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="bg-primary-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">هل تريد المزيد من المؤشرات الفنية؟</h2>
        <p class="text-xl text-primary-100 mb-8 max-w-2xl mx-auto">
            انضم إلى مجتمعنا واحصل على مؤشرات فنية حصرية وتحليلات متقدمة
        </p>
        <a href="{{ route('contact') }}" 
           class="inline-flex items-center px-8 py-3 bg-white text-primary-600 text-lg font-semibold rounded-lg hover:bg-gray-100 transition-colors">
            تواصل معنا
            <i class="fas fa-arrow-left mr-2"></i>
        </a>
    </div>
</section>
@endsection

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush
