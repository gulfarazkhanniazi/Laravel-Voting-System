<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CandidateElection extends Pivot
{
    protected $table = 'candidate_election';
    
    protected $fillable = [
        'election_id',
        'candidate_id',
        'votes'
    ];
    
    public $incrementing = true;
    
    protected $casts = [
        'votes' => 'integer'
    ];
}