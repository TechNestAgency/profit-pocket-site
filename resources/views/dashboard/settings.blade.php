@extends('dashboard.layout')

@section('title', 'إعدادات الموقع - Profit Pocket')
@section('page-title', 'إعدادات الموقع')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">إعدادات الموقع</h2>
        <p class="text-gray-600">إدارة المعلومات العامة وإعدادات الموقع</p>
    </div>

    <form class="space-y-8" method="POST" action="{{ route('dashboard.settings.update') }}">
        @csrf
        <!-- General Settings -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">الإعدادات العامة</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">اسم الموقع</label>
                    <input type="text" name="site_name" value="{{ $settings['site_name'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني</label>
                    <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">رقم الهاتف</label>
                    <input type="tel" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">العنوان</label>
                    <input type="text" name="address" value="{{ $settings['address'] ?? '' }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
            </div>
            
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">وصف الموقع</label>
                <textarea rows="3" name="site_description" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">{{ $settings['site_description'] ?? '' }}</textarea>
            </div>
        </div>

        <!-- SEO Settings -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">إعدادات SEO</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">عنوان الصفحة الرئيسية</label>
                    <input type="text" value="Profit Pocket - منصة التداول والاستثمار" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">وصف الصفحة الرئيسية</label>
                    <textarea rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">البوصلة التي توجه المستثمر من ضبابية السوق إلى وضوح النتائج المضمونة</textarea>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">الكلمات المفتاحية</label>
                    <input type="text" value="تداول, استثمار, أسواق مالية, توصيات, مؤشرات فنية, بورصة, أسهم, عملات رقمية" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
            </div>
        </div>

        <!-- Social Media -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">وسائل التواصل الاجتماعي</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">فيسبوك</label>
                    <input type="url" name="facebook_url" value="{{ $socialSettings['facebook_url'] ?? '' }}" placeholder="https://facebook.com/username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">تليجرام</label>
                    <input type="url" name="telegram_url" value="{{ $socialSettings['telegram_url'] ?? '' }}" placeholder="https://t.me/username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">سناب شات</label>
                    <input type="url" name="snapchat_url" value="{{ $socialSettings['snapchat_url'] ?? '' }}" placeholder="https://snapchat.com/add/username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">يوتيوب</label>
                    <input type="url" name="youtube_url" value="{{ $socialSettings['youtube_url'] ?? '' }}" placeholder="https://youtube.com/@username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">تويتر</label>
                    <input type="url" name="twitter_url" value="{{ $socialSettings['twitter_url'] ?? '' }}" placeholder="https://twitter.com/username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
            </div>
        </div>

        <!-- Admin Account Settings -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">إعدادات حساب المدير</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">البريد الإلكتروني الجديد</label>
                    <input type="email" name="new_email" placeholder="أدخل البريد الإلكتروني الجديد (اختياري)" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">كلمة المرور الجديدة</label>
                    <input type="password" name="new_password" placeholder="أدخل كلمة المرور الجديدة (اختياري)" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">تأكيد كلمة المرور الجديدة</label>
                    <input type="password" name="new_password_confirmation" placeholder="أعد إدخال كلمة المرور الجديدة" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
            </div>
        </div>

        <!-- Analytics -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">إعدادات التحليلات</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Google Analytics ID</label>
                    <input type="text" placeholder="GA-XXXXXXXXX-X" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Facebook Pixel ID</label>
                    <input type="text" placeholder="123456789012345" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-2 rounded-lg transition-colors duration-200">
                حفظ الإعدادات
            </button>
        </div>
    </form>
</div>
@endsection
