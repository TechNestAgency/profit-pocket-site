@extends('dashboard.layout')

@section('title', 'إضافة شهادة جديدة - لوحة التحكم')
@section('page-title', 'إضافة شهادة جديدة')

@section('content')
<!-- Page Header -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
    <div class="flex items-center">
        <a href="{{ route('dashboard.testimonials.index') }}" 
           class="text-gray-500 hover:text-gray-700 transition-colors duration-200 ml-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">إضافة شهادة جديدة</h1>
            <p class="text-gray-600 mt-1">إضافة شهادة جديدة إلى الموقع</p>
        </div>
    </div>
</div>

<!-- Form -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <form method="POST" action="{{ route('dashboard.testimonials.store') }}" enctype="multipart/form-data" class="p-6">
        @csrf
        
        <!-- Name -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">اسم العميل *</label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   value="{{ old('name') }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('name') border-red-500 @enderror"
                   placeholder="أدخل اسم العميل"
                   required>
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Position -->
        <div class="mb-6">
            <label for="position" class="block text-sm font-medium text-gray-700 mb-2">المنصب *</label>
            <input type="text" 
                   name="position" 
                   id="position" 
                   value="{{ old('position') }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('position') border-red-500 @enderror"
                   placeholder="أدخل منصب العميل"
                   required>
            @error('position')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Opinion -->
        <div class="mb-6">
            <label for="opinion" class="block text-sm font-medium text-gray-700 mb-2">الشهادة *</label>
            <textarea name="opinion" 
                      id="opinion" 
                      rows="6"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('opinion') border-red-500 @enderror"
                      placeholder="أدخل نص الشهادة"
                      required>{{ old('opinion') }}</textarea>
            @error('opinion')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image -->
        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">صورة العميل</label>
            
            <!-- Image Preview -->
            <div id="image-preview" class="mb-4 hidden">
                <div class="relative inline-block">
                    <img id="preview-img" src="" alt="معاينة الصورة" class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                    <button type="button" id="remove-image" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600 transition-colors" title="إزالة الصورة">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-sm text-gray-600 mt-2">معاينة الصورة المحددة</p>
            </div>
            
            <label for="image" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors duration-200 cursor-pointer">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <span class="relative bg-white rounded-md font-medium text-blue-600 hover:text-blue-500">
                            ارفع صورة
                        </span>
                        <p class="pr-1">أو اسحب وأفلت</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF حتى 2MB</p>
                </div>
                <input id="image" name="image" type="file" class="sr-only" accept="image/*">
            </label>
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Sort Order -->
        <div class="mb-6">
            <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">ترتيب العرض *</label>
            <input type="number" 
                   name="sort_order" 
                   id="sort_order" 
                   value="{{ old('sort_order', 0) }}"
                   min="0"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('sort_order') border-red-500 @enderror"
                   placeholder="0"
                   required>
            @error('sort_order')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <p class="mt-1 text-sm text-gray-500">الرقم الأصغر يظهر أولاً</p>
        </div>

        <!-- Is Active -->
        <div class="mb-6">
            <div class="flex items-center">
                <input type="checkbox" 
                       name="is_active" 
                       id="is_active" 
                       value="1"
                       {{ old('is_active', true) ? 'checked' : '' }}
                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="is_active" class="mr-2 block text-sm text-gray-900">شهادة نشطة</label>
            </div>
            <p class="mt-1 text-sm text-gray-500">الشهادات النشطة فقط تظهر للزوار</p>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center justify-end space-x-reverse space-x-3 pt-6 border-t border-gray-200">
            <a href="{{ route('dashboard.testimonials.index') }}" 
               class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                إلغاء
            </a>
            <button type="submit" 
                    class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                حفظ الشهادة
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    const removeImageBtn = document.getElementById('remove-image');

    // Image preview functionality
    imageInput.addEventListener('change', function(e) {
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
                previewImg.src = e.target.result;
                imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Remove image functionality
    removeImageBtn.addEventListener('click', function() {
        imageInput.value = '';
        imagePreview.classList.add('hidden');
        previewImg.src = '';
    });
});
</script>
@endsection
