<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Projects, Sections};

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Projects::factory()->count(10)->create();

        $projects = Sections::create([
            'section' => 'projects',
            'type' => 'section',
            'title' => 'مشاريع عطاء',
            'order' => 3,
            'items_count' => 4
        ]);

        $items = [
            ['title' => 'نبني الأثر الحقيقي', 'description' => 'مبادرات واقعية تسهم في تحسين حياة الأسر الفلسطينية وبناء مستقبل أكثر أمانًا.', 'file_path' => 'projects-images/30Ldq9OySLsW3C399u05Zepw2cainjOFIZR9VdRa.png'],
            ['title' => 'تمكين المجتمع', 'description' => 'توفير برامج تدريبية ومهنية لتعزيز مهارات الشباب وزيادة فرص العمل.', 'file_path' => 'projects-images/30Ldq9OySLsW3C399u05Zepw2cainjOFIZR9VdRa.png'],
            ['title' => 'تعزيز التعليم', 'description' => 'إنشاء مدارس جديدة وتوفير موارد تعليمية لتحسين جودة التعليم في المناطق المحرومة.', 'file_path' => 'projects-images/hwMD0BvKj7hvBiVlg2BH1FSIpAKJW3sU2Z99f7uw.png'],
            ['title' => 'الرعاية الصحية', 'description' => 'تقديم خدمات طبية مجانية وتحسين الوصول إلى الرعاية الصحية الأساسية للأسر المحتاجة.', 'file_path' => 'projects-images/hwMD0BvKj7hvBiVlg2BH1FSIpAKJW3sU2Z99f7uw.png'],
        ];

        foreach ($items as $index => $item) {
            Sections::create([
                'parent_id' => $projects->id,
                'section' => 'projects',
                'type' => 'item',
                'order' => $index + 1,
                ...$item,
            ]);
        }
    }
}
