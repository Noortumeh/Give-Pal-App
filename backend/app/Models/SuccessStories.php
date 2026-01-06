<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessStories extends Model
{
    protected $table = 'success_stories';

    protected $fillable = [
        'avatar',
        'name',
        'address',
        'description',
    ];
}
