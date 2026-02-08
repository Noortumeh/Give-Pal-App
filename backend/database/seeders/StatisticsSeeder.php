<?php

namespace Database\Seeders;

use App\Models\Sections;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statistics = Sections::create([
            'section' => 'statistics',
            'type' => 'section',
            'order' => 7,
            'items_count' => 4
        ]);

        $statistics->translations()->create([
            'locale' => 'ar',
            'title' => 'الاحصائيات',
            'description' => 'نحن في جمعية عطاء فلسطين، نؤمن بقوة العطاء وأثره. على مدار سنوات من العمل الميداني، قدمنا مبادرات إنسانية وثقافية وتعليمية تساهم في بناء مستقبل أكثر أمانًا لأطفال فلسطين نحن في جمعية عطاء فلسطين، ',
        ]);

        $statistics->translations()->create([
            'locale' => 'en',
            'title' => 'Statistics',
            'description' => 'At Ata`a Palestine Association, we believe in the power and impact of giving. Through years of fieldwork, we have delivered humanitarian, cultural, and educational initiatives that contribute to building a safer future for the children of Palestine.',
        ]);
        $items = [
            ['title' => 'عدد المشاريع المنفذة', 'description' => '115', 'file_path' => 'statistics-icons/4os64Ik5og7yYEhM91076UhhU2toTBaInD8lWjFm.png'],
            ['title' => 'مستفيدين من البرنامج الثقافي','description' => '92%', 'file_path' => 'statistics-icons/CvjEFbXA6hEmHaNV6zuFiFei4cBKIzrPGJJIVhvB.png'],
            ['title' => 'مستفيدين من البرنامج الاغاثي','description' => '45%', 'file_path' => 'statistics-icons/Rb3UtNXzD9WEZXGKXqcem3R1MgqJpgknHBe3BzEa.png'],
            ['title' => 'عدد المقالات','description' => '70', 'file_path' => 'statistics-icons/scm1vak1pBTmrgQFv25ND8tGt7ZUTajWLu8wMUDY.png'],
        ];
        
        $items_en = [
            ['title' => 'عدد المشاريع المنفذة', 'description' => '115'],
            ['title' => 'مستفيدين من البرنامج الثقافي','description' => '92%'],
            ['title' => 'مستفيدين من البرنامج الاغاثي','description' => '45%'],
            ['title' => 'عدد المقالات','description' => '70'],
        ];

        foreach ($items as $index => $item) {
            $statistic_item = Sections::create([
                'parent_id' => $statistics->id,
                'section' => 'statistics',
                'type' => 'item',
                'order' => $index + 1,
                'file_path' => $item['file_path'],
                'file_type' => 'icon'
            ]);

            $statistic_item->translations()->create([
                'locale' => 'ar',
                'title' => $item['title'],
                'description' => $item['description'],
            ]);

            $statistic_item->translations()->create([
                'locale' => 'en',
                'title' => $items_en[$index]['title'],
                'description' => $items_en[$index]['description'],
            ]);
        }
    }
}
