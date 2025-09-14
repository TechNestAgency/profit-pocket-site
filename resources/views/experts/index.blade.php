@extends('layouts.app')

@section('title', 'خبراء Profit Pocket - فريقنا المتخصص')
@section('description', 'تعرف على فريق خبرائنا المتخصصين في التداول والاستثمار')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary-600 to-primary-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                خبراء Profit Pocket
            </h1>
            <p class="text-xl text-primary-100 max-w-3xl mx-auto">
                فريق من الخبراء المتخصصين في التداول والاستثمار لمساعدتك في تحقيق أهدافك المالية
            </p>
        </div>
    </div>
</section>

<!-- Experts Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($experts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($experts as $expert)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        @if($expert->image)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset($expert->image) }}" 
                                     alt="{{ $expert->title }}" 
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                        @else
                            <!-- Placeholder image -->
                            <div class="h-48 bg-primary-100 flex items-center justify-center">
                                <svg class="w-16 h-16 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $expert->title }}</h3>
                            <p class="text-gray-600 mb-4 leading-relaxed">
                                {{ Str::limit($expert->description, 120) }}
                            </p>
                            <a href="{{ route('experts.show', $expert->id) }}" 
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">لا يوجد خبراء متاحون حالياً</h3>
                <p class="text-gray-600">سيتم إضافة الخبراء قريباً</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-primary-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            هل تريد الاستفادة من خبرة فريقنا؟
        </h2>
        <p class="text-xl text-primary-100 mb-8 max-w-3xl mx-auto">
            تواصل معنا للحصول على استشارة مخصصة من خبرائنا المتخصصين
        </p>
        <a href="{{ route('contact') }}" 
           class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-8 text-lg rounded-lg transition-colors">
            تواصل معنا الآن
        </a>
    </div>
</section>
@endsection
