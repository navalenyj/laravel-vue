<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'body',
        'price',
    ];


    public function images()
    {
        return $this->hasMany(PostImage::class);

    }


}
