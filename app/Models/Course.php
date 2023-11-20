<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Other attributes and methods...

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
