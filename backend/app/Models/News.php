<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    
    protected $table = 'news';

    protected $fillable = [
        'image',
        'date',
        'address',
        'title',
        'description',
    ];

    public static function getNewsHomePage(){
        return self::take(4)->get();
    } 
}
