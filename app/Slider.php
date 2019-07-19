<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Notifiable;

    use SoftDeletes;

    protected $fillable = ['title','description','link'];

    protected $dates=['deleted_at'];
}
