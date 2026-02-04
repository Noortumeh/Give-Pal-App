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
            'title' => 'الميديا',
            'order' => 6,
            'items_count' => 6
        ]);

        $items = [
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'address' => '١٥ مارس ٢٠٢٥', 'file_path' => 'media/0EjY9ybGIGjVfhAuk9XxCFP08s62fi8UdHauYP2I.png'],
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'address' => '١٥ مارس ٢٠٢٥', 'file_path' => 'media/78D8jN86m5xGhKZohA7NlPC6EiLN9YXvGrYTxCv7.png'],
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'address' => '١٥ مارس ٢٠٢٥', 'file_path' => 'media/A6lPz5nJaP11Oax2xvqZMBKpruKtlj5TrAhwCbZY.png'],
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'address' => '١٥ مارس ٢٠٢٥', 'file_path' => 'media/akMCzJ6dhijds4Tj91RSLiAasolhbcBGyo5krwkr.png'],
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'address' => '١٥ مارس ٢٠٢٥', 'file_path' => 'media/iObEUwYJAw87NuomOSkUF6mkYMBzgTOifpHRCSDk.png'],
            ['title' => 'مساحات تدعم التعلم', 'description' => 'مركزنا الرئيسي يوفر بيئة ملهمة ومريحة للإبداع', 'address' => '١٥ مارس ٢٠٢٥', 'file_path' => 'media/JTqUuby1yVLRP4BAhcX8jbHPs3WZe7MJ6yB8E0Tl.png'],
        ];

        foreach ($items as $index => $item) {
            Sections::create([
                'parent_id' => $media->id,
                'section' => 'media',
                'type' => 'item',
                'order' => $index + 1,
                ...$item,
            ]);
        }
    }
}
