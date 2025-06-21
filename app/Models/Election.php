<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Candidate;
use App\Models\User;

class Election extends Model
{
    protected $fillable = ['title', 'end_date'];

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class)
                    ->withPivot('votes')
                    ->using(CandidateElection::class);
    }

    public function voters()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
