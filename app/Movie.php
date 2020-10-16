<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // Relationships
    public function gender() {
        return $this->belongsTo('App\Gender');
    }
}
