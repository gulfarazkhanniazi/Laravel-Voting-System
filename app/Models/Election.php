<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable = ['title', 'end_date'];

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class)->withPivot('votes')->withTimestamps();
    }

    public function voters()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
