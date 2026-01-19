<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStories extends Model
{
    use HasFactory;
    
    protected $table = 'success_stories';

    protected $fillable = [
        'avatar',
        'name',
        'address',
        'description',
    ];

    public static function getSuccessStoriesHomePage(){
        return self::take(4)->get();
    }
}
