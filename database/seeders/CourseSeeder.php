<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Sample course data
        $courses = [
            ['name' => 'Mathematics', 'description' => 'Basic mathematics course'],
            ['name' => 'Science', 'description' => 'General science course'],
            ['name' => 'History', 'description' => 'World history course'],
            
        ];

        // Insert sample courses into the database
        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}

