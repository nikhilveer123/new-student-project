@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <!-- Display Validation Errors -->
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->

    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
        </div>
    @endif

    <!-- Form for Editing Student -->
    <form action="{{ route('student.updateStudent', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="student_name">Student Name</label>
                <input type="text" class="form-control" id="student_name" name="student_name" value="{{ old('student_name', $student->student_name) }}">
                @error('student_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="teacher_id">Assigned Teacher</label>
                <select id="teacher_id" name="teacher_id" class="form-control">
                    <option value="">Select Teacher</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ (old('teacher_id', $student->teacher_id) == $teacher->id) ? 'selected' : '' }}>
                            {{ $teacher->teacher_name }}
                        </option>
                    @endforeach
                </select>
                @error('teacher_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="admission_date">Admission Date</label>
                <input type="date" class="form-control" id="admission_date" name="admission_date" value="{{ old('admission_date', $student->admission_date) }}">
                @error('admission_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="yearly_fees">Yearly Fees</label>
                <input type="number" step="0.01" class="form-control" id="yearly_fees" name="yearly_fees" value="{{ old('yearly_fees', $student->yearly_fees) }}">
                @error('yearly_fees')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="contact_no">Contact Number</label>
                <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{ old('contact_no', $student->contact_no) }}">
                @error('contact_no')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
        <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
