<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    
    protected $fillable = [
        'name', // Add 'name' to the $fillable array
        'email',
        'phone',
        'address',
        'gender',
        // Other attributes...
    ];


}
