<?php

namespace Database\Seeders;

use App\Models\Sections;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuccessStoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $successStories = Sections::create([
            'section' => 'successStories',
            'type' => 'section',
            'title' => 'قصص نجاح',
            'description' => 'تسعى "عطاء فلسطين” لتوفير مجتمع آمن وفعّال يتّسم بالإنتاجية، وقد انطلقت أولى مجتمعات "دار الرجاء"  تسعى "عطاء فلسطين” ',
            'order' => 4,
            'items_count' => 4
        ]);

        $items = [
            ['title' => 'مؤمن البسطامي', 'description' => 'في عام 2020، كانت مسابقة "أصوات جديدة" نقطة تحول في مسيرتي الأدبية. بعد أن حصلت على المركز الثالث على مستوى البلاد، شعرت بدفعة قوية من الحماس والطموح. بدأت أبحث عن مسابقات أدبية أخرى تتناسب عن مسابقات أدبية أخرى تتناسب عن مسابقات أدبية أخرى تتناسب ', 'address' => 'فلسطين - الخليل', 'file_path' => 'successStories-avatars/KdwC9kg8wbWHP4Dgmd6J0TrPcWUqzpQ2JjCISWMO.jpg'],
            ['title' => 'نيسان أبو القمصان', 'description' => 'ان حاجة المجتمع الفلسطيني للإغاثة تزداد مع الحصار وجدار الفصل العنصري وسرقة وتهويد المنازل والأرض . ان محدودية قدرات المؤسسات الفاعلة بهذا المجال  شكلت ضرورة', 'address' => 'فلسطين - الخليل', 'file_path' => 'successStories-avatars/sbYuGBZkLfePn3PHCb3xrAGguv2l0A6U8wp1DbHX.jpg'],
            ['title' => 'خالد البدوي', 'description' => 'تبنت جمعية عطاء فلسطين الخيرية مشاريع التنمية المستدامة بدءاً من العام 2011 وذلك بتأهيل منازل الفقراء بقطاع غزه الذين تعرضت بيوتهم للهدم الجزئي،  أنهينا إصلاح 200 منزل ', 'address' => 'فلسطين - الخليل', 'file_path' => 'successStories-avatars/vUpdkkDcmhFUJtJmM96gDQ0VMXUnI4hLcc1Ja8XT.jpg'],
            ['title' => 'نورا الجعبري', 'description' => 'تبنت جمعية عطاء فلسطين الخيرية مشاريع التنمية المستدامة بدءاً من العام 2011 وذلك بتأهيل منازل الفقراء بقطاع غزه الذين تعرضت بيوتهم للهدم الجزئي،  أنهينا إصلاح 200 منزل ', 'address' => 'فلسطين - الخليل', 'file_path' => 'successStories-avatars/YjXXlI8zoaoB9JVM0mnCAYPJRJWnFAzTG200PCYM.jpg'],
        ];

        foreach ($items as $index => $item) {
            Sections::create([
                'parent_id' => $successStories->id,
                'section' => 'successStories',
                'type' => 'item',
                'order' => $index + 1,
                ...$item,
            ]);
        }
    }
}
