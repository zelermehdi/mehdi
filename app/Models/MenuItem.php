<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['menu_category_id','name','price_text','sort_order','is_active'];

    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }
}
