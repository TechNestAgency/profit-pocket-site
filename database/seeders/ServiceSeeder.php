<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'توصيات إستثمارية',
                'description' => 'تشير التقارير المستقلة إلى أن المنصات عبر الإنترنت يمكن أن تضخم أرقام مبيعات الأعمال بنسبة 1250 في المائة تقريبًا، وهو رقم يقدم توصيات للمضارب الذي يفضل الحصول علي عائد إستثماري كبير علي إستثماراته بناءا علي اراء وتحليلات نخبة من أفضل المحللين في الشرق الأوسط ودعم من فريق عمل متخصص.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'التواصل مع الخبراء',
                'description' => 'بتتمكن من التواصل المباشر مع الخبراء والمستشارين علي مدار الجلسة لمناقشة وضع واستراتيجية إدارة المحفظة وكيفية الخروج من الأسهم المعلقة ومناقشة وضع القطاعات المختلفة وكيفية الاستفادة من الأوضاع السياسية والإقتصادية بالإستثمار في قطاع معين',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'تقارير فنية ومالية',
                'description' => 'يتم تقديم تحليلات للمؤشر العام وأداء السوق ونظرة عامة علي الأسواق الأخري بالأضافة للتحليلات اللحظية للأسهم والقطاعات من خلال مجموعة من المستشارين والمدققين والخبراء بالمجال.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'قسم لإدارة المخاطر',
                'description' => 'قسم خاص لتوجيه العميل في الأزمات لمعالجة اي خسارة محققة وإتباع الإستراتيجية الأنسب لتعويض الخسارة والبداية في تحقيق أرباح',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}