<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','description','starts_at','ends_at','image_url','is_active'];
}
