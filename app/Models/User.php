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
        'role', // ← add this
    ];


    protected $hidden = [
        'password',
    ];

    public function votedElections()
    {
        return $this->belongsToMany(Election::class);
    }

}
