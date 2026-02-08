<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Sections extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'sections';

    protected $fillable = [
        'parent_id',
        'section',
        'type',
        'file_path',
        'file_type',
        'order',
        'active',
        'items_count',
    ];

    public function children()
    {
        return $this->hasMany(Sections::class, 'parent_id')->orderBy('order');
    }

    public function parent()
    {
        return $this->belongsTo(Sections::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with([
            'translation',
            'childrenRecursive'
        ])
            ->where('active', true);
    }

    public function translations()
    {
        return $this->hasMany(SectionTranslations::class, 'section_id');
    }

    public function translation($locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        return $this->hasOne(SectionTranslations::class, 'section_id')
            ->where('locale', $locale);
    }
}
