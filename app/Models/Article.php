<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'monotag',
        'ditag',
        'tritag',
        'slug',
        'image',
        'category_id',
        'full_text',
    ];
}
