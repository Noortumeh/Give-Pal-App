<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    
    protected $table = 'media';

    protected $fillable = [
        'date',
        'title',
        'dsecription',
        'media',
    ];

    public static function getMediaHomePage(){
        return self::take(6)->get();
    }
}
