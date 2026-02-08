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
            'order' => 4,
            'items_count' => 4
        ]);

        $successStories->translations()->create([
            'locale' => 'ar',
            'title' => 'قصص نجاح',
            'description' => 'تسعى "عطاء فلسطين” لتوفير مجتمع آمن وفعّال يتّسم بالإنتاجية، وقد انطلقت أولى مجتمعات "دار الرجاء"  تسعى "عطاء فلسطين” ',
        ]);

        $successStories->translations()->create([
            'locale' => 'en',
            'title' => 'Success Stories',
            'description' => '"Ataa Palestine" seeks to provide a safe, effective, and productive community, and the first "Dar Al Raja" community has been launched. "Ataa Palestine" seeks',
        ]);

        $items = [
            ['title' => 'مؤمن البسطامي', 'description' => 'في عام 2020، كانت مسابقة "أصوات جديدة" نقطة تحول في مسيرتي الأدبية. بعد أن حصلت على المركز الثالث على مستوى البلاد، شعرت بدفعة قوية من الحماس والطموح. بدأت أبحث عن مسابقات أدبية أخرى تتناسب عن مسابقات أدبية أخرى تتناسب عن مسابقات أدبية أخرى تتناسب ', 'address' => 'فلسطين - الخليل', 'file_path' => 'successStories-avatars/KdwC9kg8wbWHP4Dgmd6J0TrPcWUqzpQ2JjCISWMO.jpg'],
            ['title' => 'نيسان أبو القمصان', 'description' => 'ان حاجة المجتمع الفلسطيني للإغاثة تزداد مع الحصار وجدار الفصل العنصري وسرقة وتهويد المنازل والأرض . ان محدودية قدرات المؤسسات الفاعلة بهذا المجال  شكلت ضرورة', 'address' => 'فلسطين - الخليل', 'file_path' => 'successStories-avatars/sbYuGBZkLfePn3PHCb3xrAGguv2l0A6U8wp1DbHX.jpg'],
            ['title' => 'خالد البدوي', 'description' => 'تبنت جمعية عطاء فلسطين الخيرية مشاريع التنمية المستدامة بدءاً من العام 2011 وذلك بتأهيل منازل الفقراء بقطاع غزه الذين تعرضت بيوتهم للهدم الجزئي،  أنهينا إصلاح 200 منزل ', 'address' => 'فلسطين - الخليل', 'file_path' => 'successStories-avatars/vUpdkkDcmhFUJtJmM96gDQ0VMXUnI4hLcc1Ja8XT.jpg'],
            ['title' => 'نورا الجعبري', 'description' => 'تبنت جمعية عطاء فلسطين الخيرية مشاريع التنمية المستدامة بدءاً من العام 2011 وذلك بتأهيل منازل الفقراء بقطاع غزه الذين تعرضت بيوتهم للهدم الجزئي،  أنهينا إصلاح 200 منزل ', 'address' => 'فلسطين - الخليل', 'file_path' => 'successStories-avatars/YjXXlI8zoaoB9JVM0mnCAYPJRJWnFAzTG200PCYM.jpg'],
        ];

        $items_en = [
            ['title' => 'Momen Al-Bastami', 'description' => 'In 2020, the "New Voices" competition was a turning point in my literary career. After achieving third place nationally, I felt a powerful surge of enthusiasm and ambition. I began searching for other literary competitions that suited my interests.', 'address' => 'Palestine - Hebron'],
            ['title' => 'Nissan Abu Al-Qumsan', 'description' => 'The Palestinian community`s need for aid is increasing due to the siege, the apartheid wall, and the theft and Judaization of homes and land. The limited capacity of organizations operating in this field has created a necessity.', 'address' => 'Palestine - Hebron'],
            ['title' => 'Khaled Al-Badawi', 'description' => 'The Ata`a Palestine Charity Association adopted sustainable development projects starting in 2011 by rehabilitating the homes of the poor in the Gaza Strip whose homes were partially destroyed. We have completed the repair of 200 homes.', 'address' => 'Palestine - Hebron'],
            ['title' => 'Noura Al-Ja`bari', 'description' => 'The Ata`a Palestine Charity Association adopted sustainable development projects starting in 2011 by rehabilitating the homes of the poor in the Gaza Strip whose homes were partially destroyed. We have completed the repair of 200 homes.', 'address' => 'Palestine - Hebron'],
        ];
        foreach ($items as $index => $item) {
            $successStorie_item = Sections::create([
                'parent_id' => $successStories->id,
                'section' => 'successStories',
                'type' => 'item',
                'order' => $index + 1,
                'file_path' => $item['file_path'],
                'file_type' => 'avatar',
            ]);

            $successStorie_item->translations()->create([
                'locale' => 'ar',
                'title' => $item['title'],
                'description' => $item['description'],
                'address' => $item['address'],
            ]);

            $successStorie_item->translations()->create([
                'locale' => 'en',
                'title' => $items_en[$index]['title'],
                'description' => $items_en[$index]['description'],
                'address' => $items_en[$index]['address'],
            ]);
        }
    }
}
