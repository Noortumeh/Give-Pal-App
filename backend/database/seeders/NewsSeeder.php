<?php

namespace Database\Seeders;

use App\Models\Sections;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $news = Sections::create([
            'section' => 'news',
            'type' => 'section',
            'title' => 'الاخبار',
            'description' => 'تابع آخر أخبار وإنجازات جمعية عطاء فلسطين، من مبادرات إنسانية ومشاريع تنموية إلى قصص النجاح التي نصنعها معًا في الميدان. هنا نشارككم الأمل، التقدّم، وكل ',
            'order' => 5,
            'items_count' => 3
        ]);

        $items = [
            ['title' => 'احتفاء بالتراث والفنون الفلسطينية', 'description' => 'تستعد جمعية التراث الفلسطيني لإقامة مهرجان ثقافي يضم الفنون الشعبية والموسيقى، ويهدف إلى تعزيز الهوية الثقافية الفلسطينية وإبراز التراث الغني أطلقت جمعية البيئة الفلسطينية مبادرة لزراعة الأشجار في مختلف مناطق الضفة الغربية بهدف تحسين جودة الهواء ومكافحة التلوث، وتعزيز الوعي البيئي بين المجتمعات المحلية  معرفة المزيد.', 'file_path' => 'news-images/2Iqj06fq3RmBvI9c4dYsNju9nFq3nptVv2liBwWc.png', 'date' => '2025\11\11', 'address' => 'الضفه الغربية'],
            ['title' => 'تطوير مهارات النساء في المجتمع', 'description' => 'أعلنت جمعية النور عن بدء برنامج تأهيل مهني للنساء في المناطق الريفية، يستهدف تعزيز المهارات الحرفية والعمالية وتمكينهن اقتصادياً أطلقت جمعية البيئة الفلسطينية مبادرة لزراعة الأشجار في مختلف مناطق الضفة الغربية بهدف تحسين جودة الهواء ومكافحة التلوث، وتعزيز الوعي البيئي بين المجتمعات المحلية  معرفة المزيد', 'file_path' => 'news-images/anxI3hzYTgyZ2RbGkHBRkYqoUow0W1LwsqYkzE0Q.png', 'date' => '2025\11\11', 'address' => 'الضفه الغربية'],
            ['title' => 'إطلاق مشروع زراعة الأشجار للحد الأقصى من التلوث', 'description' => 'أطلقت جمعية البيئة الفلسطينية مبادرة لزراعة الأشجار في مختلف مناطق الضفة الغربية بهدف تحسين جودة الهواء ومكافحة التلوث، وتعزيز الوعي البيئي بين المجتمعات المحلية أطلقت جمعية البيئة الفلسطينية مبادرة لزراعة الأشجار ف معرفة المزيد.' ,'file_path' => 'news-images/B1Zw30n2CO0974u98cfuVYinOdUuca8z0WMM8Qg3.png', 'date' => '2025\11\11', 'address' => 'الضفه الغربية'],
        ];

        foreach ($items as $index => $item) {
            Sections::create([
                'parent_id' => $news->id,
                'section' => 'news',
                'type' => 'item',
                'order' => $index + 1,
                ...$item,
            ]);
        }
    }
}
