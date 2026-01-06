<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    protected $table = 'statistics';

    protected $fillable = [
        'projects_number',
        'beneficiaries_of_cultural_program',
        'beneficiaries_of_relief_program',
        'articles_number',
    ];
}
