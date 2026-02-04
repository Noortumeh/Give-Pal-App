<?php

namespace Database\Seeders;

use App\Models\Sections;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $services = Sections::create([
            'section' => 'services',
            'type' => 'section',
            'title' => 'خدمات عطاء',
            'order' => 2,
            'items_count' => 3
        ]);

        $items = [
            ['title' => 'دار الرجاء', 'description' => 'تسعى "عطاء فلسطين” لتوفير مجتمع آمن وفعّال يتّسم بالإنتاجية، وقد انطلقت أولى مجتمعات "دار الرجاء" كفكرة رائدة تساهم في تخفيف أعباء الحرب على قطاع غزة، حيث يقع', 'file_path' => 'services-icons/7pS5ybGFv5qAJxfVgRP1hjSEGy3QJ9EYLZpGRHz6.png'],
            ['title' => 'البرنامج الاغاثي وكفالة الأيتام', 'description' => 'ان حاجة المجتمع الفلسطيني للإغاثة تزداد مع الحصار وجدار الفصل العنصري وسرقة وتهويد المنازل والأرض . ان محدودية قدرات المؤسسات الفاعلة بهذا المجال  شكلت ضرورة', 'file_path' => 'services-icons/LvmXSbMhwVDNuW3maQ3iElmEDTLNCmYE4CFeg8Po.png'],
            ['title' => 'أنا المبدع', 'description' => 'تبنت جمعية عطاء فلسطين الخيرية مشاريع التنمية المستدامة بدءاً من العام 2011 وذلك بتأهيل منازل الفقراء بقطاع غزه الذين تعرضت بيوتهم للهدم الجزئي،  أنهينا إصلاح 200 منزل ' ,'file_path' => 'services-icons/lYmdbvbII3nJxpCzwsgslJUZjq1Byy9PUyZYXm6Q.png'],
        ];

        foreach ($items as $index => $item) {
            Sections::create([
                'parent_id' => $services->id,
                'section' => 'services',
                'type' => 'item',
                'order' => $index + 1,
                ...$item,
            ]);
        }
    }
}
