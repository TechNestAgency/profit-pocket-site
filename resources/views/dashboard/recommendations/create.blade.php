@extends('dashboard.layout')

@section('title', 'إضافة توصية جديدة - لوحة التحكم')
@section('page-title', 'إضافة توصية جديدة')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">إضافة توصية جديدة</h2>
                <p class="text-gray-600">أضف توصية جديدة مع الصور والتفاصيل</p>
            </div>
            <a href="{{ route('dashboard.recommendations.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-medium rounded-lg hover:bg-gray-700 transition-colors">
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                العودة للقائمة
            </a>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('dashboard.recommendations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
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
                       placeholder="أدخل عنوان التوصية"
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
                          placeholder="أدخل وصف التوصية">{{ old('description') }}</textarea>
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

            <!-- Multiple Images -->
            <div class="mb-6">
                <label for="images" class="block text-sm font-medium text-gray-700 mb-2">صور إضافية</label>
                
                <!-- Multiple Images Preview -->
                <div id="multiple-images-preview" class="mb-4 hidden">
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-3" id="images-preview-grid">
                            <!-- Preview images will be added here -->
                        </div>
                        <p class="text-sm text-gray-600 mt-3 text-center">معاينة الصور المحددة (<span id="image-count">0</span> صورة)</p>
                    </div>
                </div>
                
                <label for="images" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors cursor-pointer">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <span class="relative bg-white rounded-md font-medium text-primary-600 hover:text-primary-500">
                                اختر صور متعددة
                            </span>
                            <p class="pr-1">أو اسحب وأفلت</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF حتى 2MB لكل صورة</p>
                    </div>
                    <input id="images" name="images[]" type="file" class="sr-only" accept="image/*" multiple>
                </label>
                @error('images.*')
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
                <p class="mt-1 text-sm text-gray-500">التوصيات النشطة ستظهر في الموقع</p>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end space-x-reverse space-x-4">
            <a href="{{ route('dashboard.recommendations.index') }}" 
               class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                إلغاء
            </a>
            <button type="submit" 
                    class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                حفظ التوصية
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Category Image Preview
    const categoryImageInput = document.getElementById('category_image');
    const categoryImagePreview = document.getElementById('category-image-preview');
    const categoryPreviewImg = document.getElementById('category-preview-img');
    const removeCategoryImageBtn = document.getElementById('remove-category-image');

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

    removeCategoryImageBtn.addEventListener('click', function() {
        categoryImageInput.value = '';
        categoryImagePreview.classList.add('hidden');
        categoryPreviewImg.src = '';
    });

    // Multiple Images Preview - Enhanced version
    const multipleImagesInput = document.getElementById('images');
    const multipleImagesPreview = document.getElementById('multiple-images-preview');
    const imagesPreviewGrid = document.getElementById('images-preview-grid');
    
    // Store selected files globally for proper management
    let selectedFiles = [];

    multipleImagesInput.addEventListener('change', function(e) {
        const newFiles = Array.from(e.target.files);
        
        // Validate all files first
        const validFiles = [];
        for (let i = 0; i < newFiles.length; i++) {
            const file = newFiles[i];
            
            // Validate file type
            if (!file.type.startsWith('image/')) {
                alert(`الملف ${file.name} ليس صورة صحيحة`);
                continue;
            }

            // Validate file size (2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert(`حجم الصورة ${file.name} يجب أن يكون أقل من 2MB`);
                continue;
            }
            
            validFiles.push(file);
        }
        
        // Add valid files to selected files
        selectedFiles = [...selectedFiles, ...validFiles];
        
        // Update the file input with all selected files
        updateFileInput();
        
        // Update preview
        updatePreview();
    });

    function updateFileInput() {
        // Create a new DataTransfer object
        const dataTransfer = new DataTransfer();
        
        // Add all selected files to the DataTransfer object
        selectedFiles.forEach(file => {
            dataTransfer.items.add(file);
        });
        
        // Update the file input
        multipleImagesInput.files = dataTransfer.files;
    }

    function updatePreview() {
        // Clear previous previews
        imagesPreviewGrid.innerHTML = '';
        
        // Update image count
        const imageCountElement = document.getElementById('image-count');
        if (imageCountElement) {
            imageCountElement.textContent = selectedFiles.length;
        }
        
        if (selectedFiles.length > 0) {
            multipleImagesPreview.classList.remove('hidden');
            
            selectedFiles.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewDiv = document.createElement('div');
                    previewDiv.className = 'relative group bg-white rounded-lg overflow-hidden shadow-sm';
                    previewDiv.innerHTML = `
                        <img src="${e.target.result}" alt="معاينة الصورة ${index + 1}" class="w-full h-20 object-cover transition-transform group-hover:scale-105">
                        <button type="button" class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center hover:bg-red-600 transition-all duration-200 shadow-lg remove-preview-image" title="إزالة هذه الصورة" data-index="${index}">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 text-white text-xs p-1 opacity-0 group-hover:opacity-100 transition-opacity truncate">
                            ${file.name}
                        </div>
                    `;
                    imagesPreviewGrid.appendChild(previewDiv);
                };
                reader.readAsDataURL(file);
            });
        } else {
            multipleImagesPreview.classList.add('hidden');
        }
    }

    // Remove individual preview images
    imagesPreviewGrid.addEventListener('click', function(e) {
        if (e.target.closest('.remove-preview-image')) {
            const button = e.target.closest('.remove-preview-image');
            const index = parseInt(button.dataset.index);
            
            // Remove file from selectedFiles array
            selectedFiles.splice(index, 1);
            
            // Update file input
            updateFileInput();
            
            // Update preview
            updatePreview();
        }
    });

    // Add drag and drop functionality
    const dropZone = multipleImagesInput.closest('label');
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        dropZone.classList.add('border-blue-400', 'bg-blue-50');
    }

    function unhighlight(e) {
        dropZone.classList.remove('border-blue-400', 'bg-blue-50');
    }

    dropZone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = Array.from(dt.files);
        
        // Filter only image files
        const imageFiles = files.filter(file => file.type.startsWith('image/'));
        
        if (imageFiles.length > 0) {
            // Validate files
            const validFiles = [];
            for (let i = 0; i < imageFiles.length; i++) {
                const file = imageFiles[i];
                
                if (file.size > 2 * 1024 * 1024) {
                    alert(`حجم الصورة ${file.name} يجب أن يكون أقل من 2MB`);
                    continue;
                }
                
                validFiles.push(file);
            }
            
            // Add valid files to selected files
            selectedFiles = [...selectedFiles, ...validFiles];
            
            // Update the file input
            updateFileInput();
            
            // Update preview
            updatePreview();
        }
    }
});
</script>
@endpush
