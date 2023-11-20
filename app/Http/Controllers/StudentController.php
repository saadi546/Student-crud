<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
{
    $students = Student::with('courses')->get();
    $courses = Course::all();

    return view('studentlisting', compact('students', 'courses'));
}

    public function create()
    {
        $courses = Course::all();
        return view('addstudent',compact('courses'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'courses'=>'required',
        ]);

        $student = Student::create($validatedData);
        $valuesArray = array_values($request->input('courses'));
        $student->courses()->sync($valuesArray);
        
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::all();
        $userCourses = $student->courses->pluck('id')->toArray();
        return view('studentedit', compact('student','userCourses', 'courses'));
    }

    public function update(Request $request, $id)
    {
        
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$id,
            'phone' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|in:Male,Female',
            
        ]);

        $student = Student::findOrFail($id);
        $student->update($validatedData);

        $valuesArray = array_values($request->input('courses'));
        $student->courses()->sync($valuesArray);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
