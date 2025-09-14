@extends('layouts.app')

@section('title', $recommendation->title . ' - تقارير استثمارية مدروسة - ' . ($settings['site_name'] ?? 'Profit Pocket'))
@section('description', Str::limit($recommendation->description ?? $recommendation->title, 160))

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
                    <a href="{{ route('recommendations.index') }}" class="text-gray-500 hover:text-primary-600">
                        تقارير استثمارية مدروسة
                    </a>
                </li>
                <li>
                    <i class="fas fa-chevron-left text-gray-400"></i>
                </li>
                <li class="text-gray-900 font-medium">
                    {{ $recommendation->title }}
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
                {{ $recommendation->title }}
            </h1>
            
            @if($recommendation->published_at)
                <div class="flex items-center justify-center text-gray-600 mb-6">
                    <i class="fas fa-calendar-alt ml-2"></i>
                    <span>{{ $recommendation->published_at->format('d F Y') }}</span>
                </div>
            @endif
            
            @if($recommendation->description)
                <p class="text-xl text-gray-700 leading-relaxed">
                    {{ $recommendation->description }}
                </p>
            @endif
        </div>
    </div>
</section>

<!-- Images Gallery -->
@if($recommendation->images && count($recommendation->images) > 0)
    <section class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">معرض الصور</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($recommendation->images as $image)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="aspect-w-16 aspect-h-12">
                            <img src="{{ asset('storage/' . $image) }}" 
                                 alt="{{ $recommendation->title }}" 
                                 class="w-full h-64 object-cover cursor-pointer hover:scale-105 transition-transform duration-300"
                                 onclick="openImageModal('{{ asset('storage/' . $image) }}')">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif


<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
    <div class="relative max-w-4xl max-h-full">
        <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white text-2xl hover:text-gray-300 z-10">
            <i class="fas fa-times"></i>
        </button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain">
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openImageModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    
    // Close modal when clicking outside the image
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeImageModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImageModal();
        }
    });
</script>
@endpush

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
        padding-bottom: 75%; /* 12/16 */
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
