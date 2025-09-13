<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TechnicalIndicator;

class TechnicalIndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technicalIndicators = [
            [
                'title' => 'مؤشر RSI - التحليل الفني المتقدم',
                'description' => 'تعلم كيفية استخدام مؤشر RSI في التحليل الفني مع أمثلة عملية',
                'category_image' => null,
                'videos' => [
                    'https://www.youtube.com/embed/dQw4w9WgXcQ',
                    'https://www.youtube.com/embed/dQw4w9WgXcQ'
                ],
                'is_active' => true,
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => 'مؤشر MACD - دليل شامل',
                'description' => 'فهم مؤشر MACD وكيفية استخدامه في تحديد نقاط الدخول والخروج',
                'category_image' => null,
                'videos' => [
                    'https://www.youtube.com/embed/dQw4w9WgXcQ'
                ],
                'is_active' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'مؤشرات البولينجر باند',
                'description' => 'استخدام مؤشرات البولينجر باند في تحليل التقلبات السعرية',
                'category_image' => null,
                'videos' => [
                    'https://www.youtube.com/embed/dQw4w9WgXcQ',
                    'https://www.youtube.com/embed/dQw4w9WgXcQ',
                    'https://www.youtube.com/embed/dQw4w9WgXcQ'
                ],
                'is_active' => true,
                'published_at' => now(),
            ],
        ];

        foreach ($technicalIndicators as $indicator) {
            TechnicalIndicator::create($indicator);
        }
    }
}