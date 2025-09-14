@extends('dashboard.layout')

@section('title', 'تعديل التوصية - لوحة التحكم')
@section('page-title', 'تعديل التوصية')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">تعديل التوصية</h2>
                <p class="text-gray-600">تعديل تفاصيل التوصية والصور</p>
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
    <form action="{{ route('dashboard.recommendations.update', $recommendation->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="bg-white rounded-xl shadow-lg p-6">
            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">العنوان *</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $recommendation->title) }}"
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
                          placeholder="أدخل وصف التوصية">{{ old('description', $recommendation->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Category Image -->
            @if($recommendation->category_image)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">الصورة الحالية</label>
                    <div class="flex items-center space-x-reverse space-x-4">
                        <img src="{{ asset('storage/' . $recommendation->category_image) }}" 
                             alt="{{ $recommendation->title }}" 
                             class="h-20 w-20 rounded-lg object-cover">
                        <div>
                            <p class="text-sm text-gray-600">الصورة الحالية</p>
                            <p class="text-xs text-gray-500">اختر صورة جديدة لاستبدالها</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Category Image -->
            <div class="mb-6">
                <label for="category_image" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ $recommendation->category_image ? 'استبدال صورة الفئة' : 'صورة الفئة' }}
                </label>
                
                <!-- New Category Image Preview -->
                <div id="new-category-image-preview" class="mb-4 hidden">
                    <div class="relative inline-block">
                        <img id="new-category-preview-img" src="" alt="معاينة الصورة الجديدة" class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                        <button type="button" id="remove-new-category-image" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600 transition-colors" title="إزالة الصورة">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">معاينة الصورة الجديدة</p>
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

            <!-- Current Images -->
            @if($recommendation->images && count($recommendation->images) > 0)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">الصور الحالية</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($recommendation->images as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image) }}" 
                                     alt="{{ $recommendation->title }}" 
                                     class="h-20 w-full rounded-lg object-cover">
                            </div>
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-500 mt-2">اختر صور جديدة لاستبدالها</p>
                </div>
            @endif

            <!-- Multiple Images -->
            <div class="mb-6">
                <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ ($recommendation->images && count($recommendation->images) > 0) ? 'استبدال الصور الإضافية' : 'صور إضافية' }}
                </label>
                
                <!-- New Multiple Images Preview -->
                <div id="new-multiple-images-preview" class="mb-4 hidden">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4" id="new-images-preview-grid">
                        <!-- Preview images will be added here -->
                    </div>
                    <p class="text-sm text-gray-600 mt-2">معاينة الصور الجديدة</p>
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
                       value="{{ old('published_at', $recommendation->published_at ? $recommendation->published_at->format('Y-m-d\TH:i') : '') }}"
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
                           {{ old('is_active', $recommendation->is_active) ? 'checked' : '' }}
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
                تحديث التوصية
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
    const categoryImagePreview = document.getElementById('new-category-image-preview');
    const categoryPreviewImg = document.getElementById('new-category-preview-img');
    const removeCategoryImageBtn = document.getElementById('remove-new-category-image');

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

    // Multiple Images Preview
    const multipleImagesInput = document.getElementById('images');
    const multipleImagesPreview = document.getElementById('new-multiple-images-preview');
    const imagesPreviewGrid = document.getElementById('new-images-preview-grid');

    multipleImagesInput.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);
        
        // Clear previous previews
        imagesPreviewGrid.innerHTML = '';
        
        if (files.length > 0) {
            multipleImagesPreview.classList.remove('hidden');
            
            files.forEach((file, index) => {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert(`الملف ${file.name} ليس صورة صحيحة`);
                    return;
                }

                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert(`حجم الصورة ${file.name} يجب أن يكون أقل من 2MB`);
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewDiv = document.createElement('div');
                    previewDiv.className = 'relative';
                    previewDiv.innerHTML = `
                        <img src="${e.target.result}" alt="معاينة الصورة ${index + 1}" class="w-full h-24 object-cover rounded-lg border border-gray-200">
                        <button type="button" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center hover:bg-red-600 transition-colors remove-preview-image" title="إزالة هذه الصورة" data-index="${index}">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    `;
                    imagesPreviewGrid.appendChild(previewDiv);
                };
                reader.readAsDataURL(file);
            });
        } else {
            multipleImagesPreview.classList.add('hidden');
        }
    });

    // Remove individual preview images
    imagesPreviewGrid.addEventListener('click', function(e) {
        if (e.target.closest('.remove-preview-image')) {
            const button = e.target.closest('.remove-preview-image');
            const index = parseInt(button.dataset.index);
            const previewDiv = button.closest('.relative');
            previewDiv.remove();
            
            // If no previews left, hide the preview container
            if (imagesPreviewGrid.children.length === 0) {
                multipleImagesPreview.classList.add('hidden');
                multipleImagesInput.value = '';
            }
        }
    });
});
</script>
@endpush
