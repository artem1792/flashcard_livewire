<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['set_id', 'front_text', 'back_text'];

    public function set()
    {
        return $this->belongsTo(Set::class);
    }
}