@extends('dashboard.layout')

@section('title', 'تحرير الخبير - لوحة التحكم')
@section('page-title', 'تحرير الخبير')

@section('content')
<!-- Page Header -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
    <div class="flex items-center">
        <a href="{{ route('dashboard.experts.index') }}" 
           class="text-gray-500 hover:text-gray-700 transition-colors duration-200 ml-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">تحرير الخبير</h1>
            <p class="text-gray-600 mt-1">تحرير بيانات الخبير: {{ $expert->title }}</p>
        </div>
    </div>
</div>

<!-- Form -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <form method="POST" action="{{ route('dashboard.experts.update', $expert->id) }}" enctype="multipart/form-data" class="p-6">
        @csrf
        @method('PUT')
        
        <!-- Title -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">اسم الخبير *</label>
            <input type="text" 
                   name="title" 
                   id="title" 
                   value="{{ old('title', $expert->title) }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('title') border-red-500 @enderror"
                   placeholder="أدخل اسم الخبير"
                   required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">نبذة عن الخبير *</label>
            <textarea name="description" 
                      id="description" 
                      rows="6"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('description') border-red-500 @enderror"
                      placeholder="أدخل نبذة تفصيلية عن الخبير وخبراته"
                      required>{{ old('description', $expert->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Current Image -->
        @if($expert->image)
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">الصورة الحالية</label>
            <div class="w-32 h-32 rounded-lg overflow-hidden border border-gray-200">
                <img src="{{ asset('storage/' . $expert->image) }}" 
                     alt="{{ $expert->title }}" 
                     class="w-full h-full object-cover">
            </div>
        </div>
        @endif

        <!-- New Image -->
        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                {{ $expert->image ? 'تغيير الصورة' : 'إضافة صورة' }}
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors duration-200">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                            <span>ارفع صورة</span>
                            <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                        </label>
                        <p class="pr-1">أو اسحب وأفلت</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF حتى 2MB</p>
                </div>
            </div>
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
                   value="{{ old('sort_order', $expert->sort_order) }}"
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
                       {{ old('is_active', $expert->is_active) ? 'checked' : '' }}
                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="is_active" class="mr-2 block text-sm text-gray-900">خبير نشط</label>
            </div>
            <p class="mt-1 text-sm text-gray-500">الخبراء النشطين فقط يظهرون للزوار</p>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center justify-end space-x-reverse space-x-3 pt-6 border-t border-gray-200">
            <a href="{{ route('dashboard.experts.index') }}" 
               class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                إلغاء
            </a>
            <button type="submit" 
                    class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                تحديث الخبير
            </button>
        </div>
    </form>
</div>
@endsection
