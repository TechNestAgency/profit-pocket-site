@extends('layouts.app')

@section('title', $technicalIndicator->title . ' - مؤشرات فنية - ' . ($settings['site_name'] ?? 'Profit Pocket'))
@section('description', Str::limit($technicalIndicator->description ?? $technicalIndicator->title, 160))

@section('content')
<!-- Breadcrumb -->
<section class="bg-gray-100 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-reverse space-x-2">
                <li>
                    <a href="{{ route('home') }}" class="text-gray-500 hover:text-primary-600">
                        الرئيسية
                    </a>
                </li>
                <li>
                    <i class="fas fa-chevron-left text-gray-400"></i>
                </li>
                <li>
                    <a href="{{ route('technical-indicators.index') }}" class="text-gray-500 hover:text-primary-600">
                        مؤشرات فنية
                    </a>
                </li>
                <li>
                    <i class="fas fa-chevron-left text-gray-400"></i>
                </li>
                <li class="text-gray-900 font-medium">
                    {{ $technicalIndicator->title }}
                </li>
            </ol>
        </nav>
    </div>
</section>

<!-- Article Header -->
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ $technicalIndicator->title }}
            </h1>
            
            @if($technicalIndicator->published_at)
                <div class="flex items-center justify-center text-gray-600 mb-6">
                    <i class="fas fa-calendar-alt ml-2"></i>
                    <span>{{ $technicalIndicator->published_at->format('d F Y') }}</span>
                </div>
            @endif
            
            @if($technicalIndicator->description)
                <p class="text-xl text-gray-700 leading-relaxed">
                    {{ $technicalIndicator->description }}
                </p>
            @endif
        </div>
    </div>
</section>

<!-- Videos Section -->
@if($technicalIndicator->videos && count($technicalIndicator->videos) > 0)
    <section class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">فيديوهات تعليمية</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach($technicalIndicator->videos as $index => $videoUrl)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe 
                                src="{{ $videoUrl }}" 
                                title="{{ $technicalIndicator->title }} - فيديو {{ $index + 1 }}"
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen
                                class="w-full h-64">
                            </iframe>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Related Technical Indicators -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">مؤشرات فنية أخرى</h2>
        
        @php
            $relatedIndicators = \App\Models\TechnicalIndicator::active()
                ->published()
                ->where('id', '!=', $technicalIndicator->id)
                ->latest('published_at')
                ->limit(3)
                ->get();
        @endphp
        
        @if($relatedIndicators->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedIndicators as $related)
                    <div class="bg-gray-50 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        @if($related->category_image)
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $related->category_image) }}" 
                                     alt="{{ $related->title }}" 
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-3 line-clamp-2">
                                {{ $related->title }}
                            </h3>
                            
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-500">
                                    @if($related->published_at)
                                        {{ $related->published_at->format('Y-m-d') }}
                                    @endif
                                </div>
                                
                                <a href="{{ route('technical-indicators.show', $related->id) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-primary-600 text-white text-sm font-medium rounded-md hover:bg-primary-700 transition-colors">
                                    اقرأ المزيد
                                    <i class="fas fa-arrow-left mr-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
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
    
    .aspect-w-16 {
        position: relative;
        padding-bottom: 56.25%; /* 9/16 */
    }
    
    .aspect-w-16 > * {
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
@endpush
