@extends('dashboard.layout')

@section('title', 'إضافة فيديو جديد - لوحة التحكم')
@section('page-title', 'إضافة فيديو جديد')

@section('content')
<!-- Page Header -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">إضافة فيديو جديد</h1>
            <p class="text-gray-600 mt-1">أضف فيديو جديد لقسم الفيديو في الصفحة الرئيسية</p>
        </div>
        <a href="{{ route('dashboard.video-section.index') }}" 
           class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
            <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            العودة
        </a>
    </div>
</div>

<!-- Form -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <form method="POST" action="{{ route('dashboard.video-section.store') }}">
        @csrf
        
        <!-- Title Field -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                عنوان الفيديو <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title') }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('title') border-red-500 @enderror"
                   placeholder="أدخل عنوان الفيديو"
                   required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- YouTube URL Field -->
        <div class="mb-6">
            <label for="youtube_url" class="block text-sm font-medium text-gray-700 mb-2">
                رابط اليوتيوب <span class="text-red-500">*</span>
            </label>
            <input type="url" 
                   id="youtube_url" 
                   name="youtube_url" 
                   value="{{ old('youtube_url') }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('youtube_url') border-red-500 @enderror"
                   placeholder="https://www.youtube.com/watch?v=..."
                   required>
            @error('youtube_url')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-gray-500 text-sm mt-2">
                يمكنك استخدام أي من هذه الصيغ:
                <br>• https://www.youtube.com/watch?v=VIDEO_ID
                <br>• https://youtu.be/VIDEO_ID
                <br>• https://www.youtube.com/embed/VIDEO_ID
            </p>
        </div>

        <!-- Preview Section -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                معاينة الفيديو
            </label>
            <div id="video-preview" class="bg-gray-100 rounded-lg p-4 hidden">
                <div class="relative w-full max-w-2xl mx-auto" style="padding-bottom: 56.25%;">
                    <iframe 
                        id="preview-iframe"
                        class="absolute top-0 left-0 w-full h-full rounded-lg shadow-lg"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
            <p id="preview-error" class="text-red-500 text-sm mt-2 hidden">رابط اليوتيوب غير صحيح</p>
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-end space-x-reverse space-x-4">
            <a href="{{ route('dashboard.video-section.index') }}" 
               class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-medium py-3 px-6 rounded-lg transition-colors duration-200">
                إلغاء
            </a>
            <button type="submit" 
                    class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium py-3 px-6 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                إضافة الفيديو
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlInput = document.getElementById('youtube_url');
    const previewDiv = document.getElementById('video-preview');
    const previewIframe = document.getElementById('preview-iframe');
    const previewError = document.getElementById('preview-error');
    
    function extractVideoId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url.match(regExp);
        return (match && match[2].length === 11) ? match[2] : null;
    }
    
    function updatePreview() {
        const url = urlInput.value.trim();
        if (!url) {
            previewDiv.classList.add('hidden');
            previewError.classList.add('hidden');
            return;
        }
        
        const videoId = extractVideoId(url);
        if (videoId) {
            previewIframe.src = `https://www.youtube.com/embed/${videoId}`;
            previewDiv.classList.remove('hidden');
            previewError.classList.add('hidden');
        } else {
            previewDiv.classList.add('hidden');
            previewError.classList.remove('hidden');
        }
    }
    
    urlInput.addEventListener('input', updatePreview);
    urlInput.addEventListener('paste', function() {
        setTimeout(updatePreview, 100);
    });
});
</script>
@endpush
@endsection
