<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recommendation;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recommendations = [
            [
                'title' => 'تحليل السوق السعودي - يناير 2024',
                'description' => 'تحليل شامل لأداء السوق السعودي خلال شهر يناير مع توصيات استثمارية مدروسة',
                'category_image' => null,
                'images' => null,
                'is_active' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'توصيات العملات الرقمية - الأسبوع الحالي',
                'description' => 'أحدث التوصيات للعملات الرقمية الرئيسية مع تحليل فني متقدم',
                'category_image' => null,
                'images' => null,
                'is_active' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'تحليل قطاع البنوك السعودية',
                'description' => 'دراسة مفصلة لأداء قطاع البنوك السعودية مع توقعات الربع الأول',
                'category_image' => null,
                'images' => null,
                'is_active' => true,
                'published_at' => now()->subDays(1),
            ],
        ];

        foreach ($recommendations as $recommendation) {
            Recommendation::create($recommendation);
        }
    }
}