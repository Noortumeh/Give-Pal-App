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
        'title',
        'subtitle',
        'description',
        'file_path',
        'file_type',
        'order',
        'address',
        'date',
        'active',
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
        return $this->children()->with('childrenRecursive')
            ->where('active', true);
    }
}