<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $fillable =['name'];

    protected $dates=['deleted_at'];
}
