@extends('dashboard.layout')

@section('title', 'إدارة استفسارات العملاء - Profit Pocket')
@section('page-title', 'إدارة استفسارات العملاء')

@section('content')
<!-- Header Section -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">استفسارات العملاء</h2>
        <p class="text-gray-600 mt-1">إدارة استفسارات العملاء</p>
    </div>
</div>

<!-- Contacts List -->
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
        <h3 class="text-xl font-bold text-gray-900">قائمة الاستفسارات ({{ count($contacts) }})</h3>
    </div>
    
    <div class="divide-y divide-gray-100">
        @forelse($contacts as $contact)
        <div class="p-6 hover:bg-gray-50 transition-colors duration-200">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            {{ substr($contact->name, 0, 1) }}
                        </div>
                        <div class="mr-4 flex-1">
                            <h4 class="text-lg font-bold text-gray-900">{{ $contact->name }}</h4>
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                {{ $contact->email }}
                                @if($contact->phone)
                                <svg class="w-4 h-4 ml-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                {{ $contact->phone }}
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 rounded-xl p-4 mb-3">
                        <h5 class="text-sm font-semibold text-gray-900 mb-2">{{ $contact->subject }}</h5>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $contact->message }}</p>
                    </div>
                    
                    <div class="flex items-center text-xs text-gray-500">
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $contact->created_at->format('M d, Y - H:i') }}
                        <span class="mr-2">•</span>
                        {{ $contact->created_at->diffForHumans() }}
                    </div>
                </div>
                
                <div class="flex flex-col space-y-2 mr-6">
                    <button class="delete-contact-btn flex items-center px-4 py-2 text-sm font-medium text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition-all duration-200"
                            data-id="{{ $contact->id }}">
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        حذف
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="px-6 py-12 text-center">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <h3 class="text-lg font-medium text-gray-900 mb-2">لا توجد استفسارات</h3>
            <p class="text-gray-500">لم يتم إرسال أي استفسارات بعد</p>
        </div>
        @endforelse
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // Delete contact
    document.querySelectorAll('.delete-contact-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('هل أنت متأكد من حذف هذا الاستفسار؟')) {
                fetch(`/admin/contacts/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('حدث خطأ في حذف الاستفسار');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('حدث خطأ في حذف الاستفسار');
                });
            }
        });
    });
});
</script>
@endsection
