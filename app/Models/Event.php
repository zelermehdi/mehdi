<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Event extends Model
{
    protected $fillable = ['title','description','starts_at','ends_at','image_url','is_active'];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at'   => 'datetime',
        'is_active' => 'boolean',
    ];

    // (optionnel) url publique prête à afficher
    public function getImageSrcAttribute(): ?string
    {
        if (! $this->image_url) return null;

        // si tu stockes "events/xxx.jpg"
        return asset('storage/'.$this->image_url);
    }
}
