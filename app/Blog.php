<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Blog extends Model
{

    use SoftDeletes;
    use Notifiable;

    protected $fillable = [
        'category_id',
        'title',
        'post_content',
        'author_id',
        'featured',
        'thumbnail',
        'slug',
    ];
    protected $dates = ['deleted_at'];

    public function Author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function User()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

}
