<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->input('search');
        $students = Student::with('teacher')
            ->when($search, function ($query) use ($search) {
                return $query->where('student_name', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('student.index', compact('students', 'search'));
    }






    public function create()
    {
        $teachers = Teacher::all();
        return view('student.create', compact('teachers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'student_name' => 'required|string|max:255',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
            'contact_no' => 'required|string|size:10|unique:students,contact_no',
            'email' => 'required|email|max:255|unique:students,email',
        ], [
            'teacher_id.required' => 'Teacher name is required.', // Custom error message
        ]);

        Student::create($request->all());
        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }




    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }


    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view('student.edit', compact('student', 'teachers'));
    }



    public function update(Request $request, Student $student)
    {

        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'student_name' => 'required|string|max:255',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
            'contact_no' => 'required|string|size:10|unique:students,contact_no',
            'email' => 'required|email|max:255|unique:students,email',
        ], [
            'teacher_id.required' => 'Teacher name is required.', // Custom error message
        ]);


        $student->update($request->only([
            'teacher_id',
            'student_name',
            'admission_date',
            'yearly_fees',
            'contact_no',
            'email'
        ]));


        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }



    public function deleteStudent(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }


    public function restoreStudent($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->restore();

        return redirect()->route('student.index')->with('success', 'Student restored successfully.');
    }



}
