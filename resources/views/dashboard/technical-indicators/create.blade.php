@extends('dashboard.layout')

@section('title', 'إضافة مؤشر فني جديد - لوحة التحكم')
@section('page-title', 'إضافة مؤشر فني جديد')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">إضافة مؤشر فني جديد</h2>
                <p class="text-gray-600">أضف مؤشر فني جديد مع الفيديوهات التعليمية</p>
            </div>
            <a href="{{ route('dashboard.technical-indicators.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-lg hover:bg-gray-700 transition-colors">
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                العودة للقائمة
            </a>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('dashboard.technical-indicators.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="bg-white rounded-xl shadow-lg p-6">
            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">العنوان *</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-600 focus:border-transparent @error('title') border-red-500 @enderror"
                       placeholder="أدخل عنوان المؤشر الفني"
                       required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
                <textarea id="description" 
                          name="description" 
                          rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-600 focus:border-transparent @error('description') border-red-500 @enderror"
                          placeholder="أدخل وصف المؤشر الفني">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category Image -->
            <div class="mb-6">
                <label for="category_image" class="block text-sm font-medium text-gray-700 mb-2">صورة الفئة</label>
                
                <!-- Category Image Preview -->
                <div id="category-image-preview" class="mb-4 hidden">
                    <div class="relative inline-block">
                        <img id="category-preview-img" src="" alt="معاينة صورة الفئة" class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                        <button type="button" id="remove-category-image" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600 transition-colors" title="إزالة الصورة">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">معاينة صورة الفئة</p>
                </div>
                
                <label for="category_image" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors cursor-pointer">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <span class="relative bg-white rounded-md font-medium text-primary-600 hover:text-primary-500">
                                اختر صورة
                            </span>
                            <p class="pr-1">أو اسحب وأفلت</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF حتى 2MB</p>
                    </div>
                    <input id="category_image" name="category_image" type="file" class="sr-only" accept="image/*">
                </label>
                @error('category_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Videos -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">فيديوهات يوتيوب</label>
                <div id="videos-container">
                    <div class="video-input-group mb-3">
                        <div class="flex items-center space-x-reverse space-x-2">
                            <input type="url" 
                                   name="videos[]" 
                                   placeholder="https://www.youtube.com/watch?v=..." 
                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-600 focus:border-transparent @error('videos.*') border-red-500 @enderror">
                            <button type="button" onclick="removeVideoInput(this)" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <button type="button" onclick="addVideoInput()" class="inline-flex items-center px-3 py-2 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition-colors">
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    إضافة فيديو آخر
                </button>
                <p class="mt-2 text-sm text-gray-500">أدخل روابط فيديوهات يوتيوب التعليمية</p>
                @error('videos.*')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Published Date -->
            <div class="mb-6">
                <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">تاريخ النشر</label>
                <input type="datetime-local" 
                       id="published_at" 
                       name="published_at" 
                       value="{{ old('published_at') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-600 focus:border-transparent @error('published_at') border-red-500 @enderror">
                @error('published_at')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Active Status -->
            <div class="mb-6">
                <div class="flex items-center">
                    <input type="checkbox" 
                           id="is_active" 
                           name="is_active" 
                           value="1"
                           {{ old('is_active', true) ? 'checked' : '' }}
                           class="h-4 w-4 text-primary-600 focus:ring-primary-600 border-gray-300 rounded">
                    <label for="is_active" class="mr-2 block text-sm text-gray-900">
                        نشط
                    </label>
                </div>
                <p class="mt-1 text-sm text-gray-500">المؤشرات الفنية النشطة ستظهر في الموقع</p>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end space-x-reverse space-x-4">
            <a href="{{ route('dashboard.technical-indicators.index') }}" 
               class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                إلغاء
            </a>
            <button type="submit" 
                    class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                حفظ المؤشر الفني
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Make functions globally available
    window.addVideoInput = function() {
        console.log('addVideoInput called'); // Debug log
        const container = document.getElementById('videos-container');
        if (!container) {
            console.error('videos-container not found');
            return;
        }
        
        const newInput = document.createElement('div');
        newInput.className = 'video-input-group mb-3';
        newInput.innerHTML = `
            <div class="flex items-center space-x-reverse space-x-2">
                <input type="url" 
                       name="videos[]" 
                       placeholder="https://www.youtube.com/watch?v=..." 
                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-600 focus:border-transparent">
                <button type="button" onclick="removeVideoInput(this)" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors" title="حذف هذا الرابط">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `;
        container.appendChild(newInput);
        
        // Focus on the new input
        const newInputField = newInput.querySelector('input');
        if (newInputField) {
            newInputField.focus();
        }
        
        console.log('New video input added'); // Debug log
    };

    window.removeVideoInput = function(button) {
        console.log('removeVideoInput called'); // Debug log
        const container = document.getElementById('videos-container');
        const videoGroup = button.closest('.video-input-group');
        
        if (!container || !videoGroup) {
            console.error('Container or video group not found');
            return;
        }
        
        if (container.children.length > 1) {
            videoGroup.remove();
            console.log('Video input removed');
        } else {
            // If it's the last input, just clear it instead of removing
            const input = videoGroup.querySelector('input');
            if (input) {
                input.value = '';
                input.focus();
            }
            console.log('Last input cleared');
        }
    };

    // Initialize when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing video inputs'); // Debug log
        
        // Preview uploaded image
        const categoryImageInput = document.getElementById('category_image');
        const categoryImagePreview = document.getElementById('category-image-preview');
        const categoryPreviewImg = document.getElementById('category-preview-img');
        const removeCategoryImageBtn = document.getElementById('remove-category-image');
        
        if (categoryImageInput) {
            categoryImageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Validate file type
                    if (!file.type.startsWith('image/')) {
                        alert('يرجى اختيار ملف صورة صحيح');
                        this.value = '';
                        return;
                    }

                    // Validate file size (2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        alert('حجم الصورة يجب أن يكون أقل من 2MB');
                        this.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        categoryPreviewImg.src = e.target.result;
                        categoryImagePreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Remove category image functionality
        if (removeCategoryImageBtn) {
            removeCategoryImageBtn.addEventListener('click', function() {
                categoryImageInput.value = '';
                categoryImagePreview.classList.add('hidden');
                categoryPreviewImg.src = '';
            });
        }

        // Add YouTube URL validation to existing inputs
        const videoInputs = document.querySelectorAll('input[name="videos[]"]');
        videoInputs.forEach(input => {
            input.addEventListener('blur', function() {
                const url = this.value.trim();
                if (url && !isValidYouTubeUrl(url)) {
                    this.classList.add('border-red-500');
                    if (!this.nextElementSibling || !this.nextElementSibling.classList.contains('error-message')) {
                        const errorMsg = document.createElement('p');
                        errorMsg.className = 'error-message text-sm text-red-600 mt-1';
                        errorMsg.textContent = 'يرجى إدخال رابط يوتيوب صحيح';
                        this.parentNode.appendChild(errorMsg);
                    }
                } else {
                    this.classList.remove('border-red-500');
                    const errorMsg = this.parentNode.querySelector('.error-message');
                    if (errorMsg) {
                        errorMsg.remove();
                    }
                }
            });
        });
    });

    function isValidYouTubeUrl(url) {
        const youtubeRegex = /^(https?:\/\/)?(www\.)?(youtube\.com\/(watch\?v=|embed\/)|youtu\.be\/)[\w-]+/;
        return youtubeRegex.test(url);
    }
</script>
@endpush
