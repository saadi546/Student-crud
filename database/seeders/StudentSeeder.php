<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Sample student data
        $students = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '1234567890',
                'address' => '123 Main St, City',
                'gender' => 'Male',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '9876543210',
                'address' => '456 Elm St, Town',
                'gender' => 'Female',
            ],
           
        ];

       
        foreach ($students as $student) {
            Student::create($student);
        }
        $courses = Course::all();
        // Populate the pivot table
        Student::all()->each(function ($student) use ($courses) { 
    $student->courses()->sync(
        $courses->random(rand(1, 3))->pluck('id')->toArray()
    ); 
});
    }
}
