<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;
    
    protected $table = 'statistics';

    protected $fillable = [
        'icon',
        'statistic_title',
        'statistic',
    ];

    public static function getStatistcsHomePage(){
        return self::take(4)->get();
    }
}
