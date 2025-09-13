@extends('dashboard.layout')

@section('title', 'إدارة قسم الفيديو - لوحة التحكم')
@section('page-title', 'إدارة قسم الفيديو')

@section('content')
<!-- Success Message -->
@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
    {{ session('success') }}
</div>
@endif

<!-- Page Header -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">إدارة قسم الفيديو</h1>
            <p class="text-gray-600 mt-1">إدارة وتحرير قسم الفيديو في الصفحة الرئيسية</p>
        </div>
        @if(!$videoSection)
        <a href="{{ route('dashboard.video-section.create') }}" 
           class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium py-2 px-4 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
            <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            إضافة فيديو جديد
        </a>
        @endif
    </div>
</div>

<!-- Video Section Display -->
@if($videoSection)
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-8">
    <div class="p-6">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $videoSection->title }}</h2>
                <p class="text-gray-600">رابط اليوتيوب: <a href="{{ $videoSection->youtube_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">{{ $videoSection->youtube_url }}</a></p>
                <p class="text-sm text-gray-500 mt-2">تاريخ الإنشاء: {{ $videoSection->created_at->format('Y/m/d H:i') }}</p>
            </div>
            <div class="flex items-center space-x-reverse space-x-2">
                <a href="{{ route('dashboard.video-section.edit', $videoSection->id) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    تعديل
                </a>
                <form method="POST" action="{{ route('dashboard.video-section.destroy', $videoSection->id) }}" 
                      class="inline-block" 
                      onsubmit="return confirm('هل أنت متأكد من حذف قسم الفيديو؟')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        حذف
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Video Preview -->
        @if($videoSection->embed_url)
        <div class="bg-gray-100 rounded-lg p-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">معاينة الفيديو:</h3>
            <div class="relative w-full max-w-4xl mx-auto" style="padding-bottom: 56.25%;">
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
        @endif
    </div>
</div>
@else
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="text-center py-12">
        <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
        </svg>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">لا يوجد فيديو</h3>
        <p class="text-gray-600 mb-6">ابدأ بإضافة أول فيديو للصفحة الرئيسية</p>
        <a href="{{ route('dashboard.video-section.create') }}" 
           class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium py-2 px-4 rounded-lg transition-all duration-200">
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            إضافة فيديو جديد
        </a>
    </div>
</div>
@endif
@endsection
