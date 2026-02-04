<?php

namespace Database\Seeders;

use App\Models\Sections;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuccessPartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $successPartners = Sections::create([
            'section' => 'successPartners',
            'type' => 'section',
            'title' => 'شركاء النجاح',
            'order' => 8,
            'items_count' => 6
        ]);

        $items = [
            ['title' => 'شريك 1', 'file_path' => 'successPartners-icons/1XTaEBgVNcnYnoZZVSwAxaIsgGLDSLDbIGETEkNj.png'],
            ['title' => 'شريك 2', 'file_path' => 'successPartners-icons/8nY6ZLOaF8xxDtQuoDWivVLrtGDUMFvVjfTtEIsL.png'],
            ['title' => 'شريك 3', 'file_path' => 'successPartners-icons/A7Q1sfAncMBAjSS41nfOLhSsVRWt07nyLcR0nnfy.png'],
            ['title' => 'شريك 4', 'file_path' => 'successPartners-icons/MmfhjxPFKSWTV0DZc2eFPUdAWjI99U03405tZejG.png'],
            ['title' => 'شريك 5', 'file_path' => 'successPartners-icons/poKJuFgSQ0SGPbmffjP74qWLXtmR9a7Nva7OEu8L.png'],
            ['title' => 'شريك 6', 'file_path' => 'successPartners-icons/qk8vpcjDoToDBQYs8SAJ7SJWGJdlKTE0pzDexkCz.png'],
        ];

        foreach ($items as $index => $item) {
            Sections::create([
                'parent_id' => $successPartners->id,
                'section' => 'successPartners',
                'type' => 'item',
                'order' => $index + 1,
                ...$item,
            ]);
        }
    }
}
