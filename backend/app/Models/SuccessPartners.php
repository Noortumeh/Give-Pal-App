<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessPartners extends Model
{
    use HasFactory;
    
    protected $table = 'success_partners';

    protected $fillable = [
        'icon',
    ];
}
