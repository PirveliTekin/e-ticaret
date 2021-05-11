<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAbout extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title', 'short_dis','long_dis'
    ];
}
