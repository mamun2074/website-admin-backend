<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'service_category_id',
        'title',
        'service_content',
        'slug',
        'author_id'
    ];
    protected $dates = ['deleted_at'];
}
