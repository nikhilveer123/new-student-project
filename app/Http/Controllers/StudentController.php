<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    public function index(Request $request)
    {

        $students = Student::with('teacher')->orderBy('created_at', 'desc')->paginate(5);

        return view('student.index', compact('students'));
    }




    public function create()
    {
        $teachers = Teacher::all();
        return view('student.create', compact('teachers'));
    }


    public function createStudent(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'student_name' => 'required|string|max:255',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
            'contact_no' => 'required|string|size:10|unique:students,contact_no',
            'email' => 'required|email|max:255|unique:students,email',
        ], [
            'teacher_id.required' => 'Teacher name is required.',
        ]);

        Student::create($request->all());
        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }




    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view('student.edit', compact('student', 'teachers'));
    }



    public function updateStudent(Request $request, Student $student)
    {

        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'student_name' => 'required|string|max:255',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
            'contact_no' => 'required|string|size:10',
            'email' => 'required|email',
        ], [
            'teacher_id.required' => 'Teacher name is required.',
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


    public function viewStudent(Student $student)
    {
        return view('student.show', compact('student'));
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
