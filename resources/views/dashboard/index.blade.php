@extends('dashboard.layout')

@section('title', 'لوحة التحكم الرئيسية - Profit Pocket')
@section('page-title', 'لوحة التحكم الرئيسية')

@section('content')
<!-- Welcome Section -->
<div class="mb-8">
    <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 rounded-2xl p-8 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative z-10">
            <h2 class="text-3xl font-bold mb-2">مرحباً بك في لوحة التحكم</h2>
            <p class="text-primary-100 text-lg">إدارة منصة Profit Pocket</p>
        </div>
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white/5 rounded-full"></div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

    <div class="bg-white rounded-2xl shadow-lg p-6 card-hover border border-gray-100">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <div class="mr-4">
                <p class="text-sm font-medium text-gray-600">استفسارات العملاء</p>
                <p class="text-3xl font-bold text-gray-900">{{ $stats['total_contacts'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6 card-hover border border-gray-100">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mr-4">
                <p class="text-sm font-medium text-gray-600">رسائل جديدة</p>
                <p class="text-3xl font-bold text-gray-900">{{ $stats['new_contacts'] }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Contacts -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-gray-900">آخر استفسارات العملاء</h3>
                    <a href="{{ route('dashboard.contacts') }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium flex items-center">
                        عرض الكل
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse($recent_contacts as $contact)
                <div class="px-6 py-5 hover:bg-gray-50 transition-colors duration-200">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center mb-2">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                    {{ substr($contact->name, 0, 1) }}
                                </div>
                                <div class="mr-3">
                                    <h4 class="text-sm font-semibold text-gray-900">{{ $contact->name }}</h4>
                                    <p class="text-xs text-gray-500">{{ $contact->email }}</p>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $contact->status === 'new' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $contact->status === 'new' ? 'جديد' : 'تم الرد' }}
                                </span>
                            </div>
                            <h5 class="text-sm font-medium text-gray-900 mb-1">{{ $contact->subject }}</h5>
                            <p class="text-sm text-gray-600 leading-relaxed">{{ Str::limit($contact->message, 120) }}</p>
                        </div>
                        <div class="text-left mr-4">
                            <p class="text-xs text-gray-500 mb-1">{{ $contact->created_at->format('M d') }}</p>
                            <p class="text-xs text-gray-400">{{ $contact->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="px-6 py-8 text-center">
                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-gray-500">لا توجد استفسارات حالياً</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="space-y-6">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">الإجراءات السريعة</h3>
            <div class="space-y-3">

                <a href="{{ route('dashboard.contacts') }}" class="flex items-center p-3 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="mr-3">
                        <h4 class="text-sm font-semibold text-gray-900">إدارة الاستفسارات</h4>
                        <p class="text-xs text-gray-500">عرض والرد على الاستفسارات</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
