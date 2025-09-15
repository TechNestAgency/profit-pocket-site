<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recommendation;
use App\Models\TechnicalIndicator;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Settings
        Setting::set('site_name', 'Profit Pocket', 'text', 'general', 'اسم الموقع');
        Setting::set('site_description', 'البوصلة التي توجه المستثمر من ضبابية السوق إلى وضوح النتائج المضمونة', 'textarea', 'general', 'وصف الموقع');
        Setting::set('contact_email', 'info@profitpocket.com', 'email', 'general', 'البريد الإلكتروني للتواصل');
        Setting::set('contact_phone', '+966501234567', 'text', 'general', 'رقم الهاتف');
        Setting::set('address', 'الرياض، المملكة العربية السعودية', 'text', 'general', 'العنوان');
        
        // Social Media Settings
        Setting::set('facebook_url', 'https://facebook.com/profitpocket', 'url', 'social', 'رابط فيسبوك');
        Setting::set('telegram_url', 'https://t.me/profitpocket', 'url', 'social', 'رابط تليجرام');
        Setting::set('snapchat_url', 'https://snapchat.com/add/profitpocket', 'url', 'social', 'رابط سناب شات');
        Setting::set('youtube_url', 'https://youtube.com/@profitpocket', 'url', 'social', 'رابط يوتيوب');
        Setting::set('twitter_url', 'https://twitter.com/profitpocket', 'url', 'social', 'رابط تويتر');
        Setting::set('tiktok_url', 'https://tiktok.com/@profitpocket', 'url', 'social', 'رابط تيك توك');

        // Seed Recommendations, Technical Indicators, Services, Experts, and Testimonials using dedicated seeders
        $this->call([
            RecommendationSeeder::class,
            TechnicalIndicatorSeeder::class,
            ServiceSeeder::class,
            ExpertSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}