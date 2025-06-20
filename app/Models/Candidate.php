<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name', 'party', 'symbol', 'slogan', 'image'];

    public function elections()
    {
        return $this->belongsToMany(Election::class)->withPivot('votes')->withTimestamps();
    }

}
