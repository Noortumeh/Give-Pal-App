<?php

namespace Database\Seeders;

use App\Models\Sections;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $media = Sections::create([
            'section' => 'media',
            'type' => 'section',
            'order' => 6,
            'items_count' => 6
        ]);

        $media->translations()->create([
            'locale' => 'ar',
            'title' => 'الميديا'
        ]);

        $media->translations()->create([
            'locale' => 'en',
            'title' => 'Media'
        ]);

        $items = [
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'date' => '2025/3/15', 'file_path' => 'media/0EjY9ybGIGjVfhAuk9XxCFP08s62fi8UdHauYP2I.png'],
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'date' => '2025/3/15', 'file_path' => 'media/78D8jN86m5xGhKZohA7NlPC6EiLN9YXvGrYTxCv7.png'],
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'date' => '2025/3/15', 'file_path' => 'media/A6lPz5nJaP11Oax2xvqZMBKpruKtlj5TrAhwCbZY.png'],
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'date' => '2025/3/15', 'file_path' => 'media/akMCzJ6dhijds4Tj91RSLiAasolhbcBGyo5krwkr.png'],
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'date' => '2025/3/15', 'file_path' => 'media/iObEUwYJAw87NuomOSkUF6mkYMBzgTOifpHRCSDk.png'],
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'date' => '2025/3/15', 'file_path' => 'media/JTqUuby1yVLRP4BAhcX8jbHPs3WZe7MJ6yB8E0Tl.png'],
        ];

        $items_en = [
            ['title' => 'Spaces that support learning', 'description' => 'Our main center provides an inspiring and comfortable environment for creativity.', 'date' => '2025/3/15'],
            ['title' => 'Spaces that support learning', 'description' => 'Our main center provides an inspiring and comfortable environment for creativity.', 'date' => '2025/3/15'],
            ['title' => 'Spaces that support learning', 'description' => 'Our main center provides an inspiring and comfortable environment for creativity.', 'date' => '2025/3/15'],
            ['title' => 'Spaces that support learning', 'description' => 'Our main center provides an inspiring and comfortable environment for creativity.', 'date' => '2025/3/15'],
            ['title' => 'Spaces that support learning', 'description' => 'Our main center provides an inspiring and comfortable environment for creativity.', 'date' => '2025/3/15'],
            ['title' => 'Spaces that support learning', 'description' => 'Our main center provides an inspiring and comfortable environment for creativity.', 'date' => '2025/3/15'],
        ];

        foreach ($items as $index => $item) {
            $media_item = Sections::create([
                'parent_id' => $media->id,
                'section' => 'media',
                'type' => 'item',
                'order' => $index + 1,
                'file_path' => $item['file_path'],
                'file_type' => 'image',
            ]);

            $media_item->translations()->create([
                'locale' => 'ar',
                'title' => $item['title'],
                'description' => $item['description'],
                'date' => $item['date'],
            ]);

            $media_item->translations()->create([
                'locale' => 'en',
                'title' => $items_en[$index]['title'],
                'description' => $items_en[$index]['description'],
                'date' => $items_en[$index]['date'],
            ]);
        }
    }
}
