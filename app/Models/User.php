<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cnic',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function elections()
    {
        return $this->belongsToMany(Election::class, 'election_user')->withTimestamps();
    }

    public function hasVotedIn($electionId)
    {
        return $this->elections()->where('election_id', $electionId)->exists();
    }
}