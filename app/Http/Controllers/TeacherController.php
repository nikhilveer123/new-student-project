<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
class TeacherController extends Controller
{

    public function index()
    {
        $teachers = Teacher::paginate(6);
        return view('teacher.index', compact('teachers'));
    }

}
