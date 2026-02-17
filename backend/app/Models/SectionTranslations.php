<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Sections;


class SectionTranslations extends Model
{
    use HasFactory;

    protected $table = 'section_translations';

    protected $fillable = [
        'section_id',
        'locale',
        'title',
        'subtitle',
        'description',
        'address',
        'date',
    ];

    public function section()
    {
        return $this->belongsTo(Sections::class);
    }
}
