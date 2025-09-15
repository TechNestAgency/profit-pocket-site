<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'أحمد محمد',
                'position' => 'مستثمر',
                'opinion' => 'خدمة ممتازة وتوصيات دقيقة ساعدتني في تحقيق أرباح جيدة. فريق العمل محترف جداً والتحليلات موثوقة.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'فاطمة علي',
                'position' => 'متداولة',
                'opinion' => 'التحليلات الفنية متقدمة جداً والنتائج مذهلة. أنصح الجميع بالاستفادة من خدمات Profit Pocket.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'محمد السعيد',
                'position' => 'مستثمر',
                'opinion' => 'فريق الخبراء محترف جداً والتوصيات موثوقة. حققت أرباحاً ممتازة بفضل استراتيجياتهم المدروسة.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'سارة أحمد',
                'position' => 'متداولة',
                'opinion' => 'منصة رائعة وسهلة الاستخدام مع نتائج ممتازة. الدعم الفني متوفر دائماً والخدمة سريعة.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'خالد العلي',
                'position' => 'مدير محفظة استثمارية',
                'opinion' => 'أفضل منصة للتداول في المنطقة العربية. التحليلات دقيقة والتنبؤات صحيحة بنسبة عالية.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'نورا حسن',
                'position' => 'مستثمرة',
                'opinion' => 'خدمة متميزة وفريق عمل متخصص. ساعدوني في فهم السوق واتخاذ قرارات استثمارية صحيحة.',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
