@extends('layouts.app')

@section('title', 'خدماتنا - Profit Pocket')
@section('description', 'تعرف على خدماتنا المتنوعة في مجال التداول والاستثمار')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                خدماتنا المتميزة
            </h1>
            <p class="text-xl text-primary-100 max-w-3xl mx-auto">
                نقدم لك مجموعة شاملة من الخدمات المتخصصة في التداول والاستثمار
            </p>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($services->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        @if($service->image)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset($service->image) }}" 
                                     alt="{{ $service->title }}" 
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                        @else
                            <!-- Placeholder image -->
                            <div class="h-48 bg-primary-100 flex items-center justify-center">
                                <svg class="w-16 h-16 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $service->title }}</h3>
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                {{ Str::limit($service->description, 120) }}
                            </p>
                            <a href="{{ route('services.show', $service->id) }}" 
                               class="inline-flex items-center bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                                تفاصيل أكثر
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">لا توجد خدمات متاحة حالياً</h3>
                <p class="text-gray-600">سيتم إضافة الخدمات قريباً</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-primary-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            هل تحتاج إلى استشارة مخصصة؟
        </h2>
        <p class="text-xl text-primary-100 mb-8 max-w-3xl mx-auto">
            تواصل معنا للحصول على استشارة مخصصة تناسب احتياجاتك الاستثمارية
        </p>
        <a href="{{ route('contact') }}" 
           class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 text-lg rounded-lg transition-colors">
            تواصل معنا الآن
        </a>
    </div>
</section>
@endsection
