@extends('layouts.app')

@section('title', $service->title . ' - خدماتنا - Profit Pocket')
@section('description', Str::limit($service->description, 160))

@section('content')
<!-- Hero Section with Background Image -->
<section class="relative bg-primary-600 text-white py-20">
    @if($service->image)
        <div class="absolute inset-0 overflow-hidden">
            <img src="{{ asset('storage/' . $service->image) }}" 
                 alt="{{ $service->title }}" 
                 class="w-full h-full object-cover opacity-20">
        </div>
    @endif
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <nav class="mb-6">
                <ol class="flex items-center justify-center space-x-reverse space-x-2 text-primary-200">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-white transition-colors">الرئيسية</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-primary-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="hover:text-white transition-colors">خدماتنا</a>
                    </li>
                    <li>
                        <svg class="w-4 h-4 text-primary-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </li>
                    <li class="text-primary-100">{{ $service->title }}</li>
                </ol>
            </nav>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                {{ $service->title }}
            </h1>
        </div>
    </div>
</section>

<!-- Service Details -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Service Image -->
            <div class="order-2 lg:order-1">
                @if($service->image)
                    <div class="rounded-lg overflow-hidden shadow-xl">
                        <img src="{{ asset('storage/' . $service->image) }}" 
                             alt="{{ $service->title }}" 
                             class="w-full h-auto">
                    </div>
                @else
                    <!-- Placeholder for when image is not available -->
                    <div class="bg-primary-100 rounded-lg flex items-center justify-center h-64 shadow-xl">
                        <svg class="w-24 h-24 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
            </div>
            
            <!-- Service Content -->
            <div class="order-1 lg:order-2">
                <div class="prose prose-lg max-w-none">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">تفاصيل الخدمة</h2>
                    <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $service->description }}
                    </div>
                </div>
                
                <!-- Action Button -->
                <div class="mt-8">
                    <a href="{{ route('contact') }}" 
                       class="inline-flex items-center justify-center bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-bold py-4 px-8 text-lg rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                        ابدأ الآن
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Services or CTA -->
<section class="py-16 bg-primary-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">
            خدمات أخرى قد تهمك
        </h2>
        <p class="text-xl text-gray-600 mb-8">
            استكشف باقي خدماتنا المتميزة في مجال التداول والاستثمار
        </p>
        <a href="{{ route('services.index') }}" 
           class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-8 text-lg rounded-lg transition-colors">
            استعرض جميع الخدمات
        </a>
    </div>
</section>
@endsection
