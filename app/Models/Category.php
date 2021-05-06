<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name', 'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
