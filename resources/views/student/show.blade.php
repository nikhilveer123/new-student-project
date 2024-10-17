@extends('layouts.admin')

@php
use Carbon\Carbon;
@endphp

@section('content')
    <div class="container my-4">
        <h4 class="mb-sm-5 font-size-14">View Student</h4>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Student Details</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="detail-item">
                            <strong>Student Name:</strong> {{ $student->student_name }}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="detail-item">
                            <strong>Assigned Teacher:</strong> {{ $student->teacher->teacher_name ?? 'N/A' }}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="detail-item">
                            <strong>Admission Date:</strong> {{ Carbon::parse($student->admission_date)->format('d-m-Y') }}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="detail-item">
                            <strong>Yearly Fees:</strong> {{ number_format($student->yearly_fees, 2) }}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="detail-item">
                            <strong>Contact Number:</strong> {{ $student->contact_no ?? 'N/A' }}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="detail-item">
                            <strong>Email:</strong> {{ $student->email ?? 'N/A' }}
                        </div>
                    </div>
                </div>
                <a href="{{ route('student.index') }}" class="btn btn-secondary">Back to Students</a>
            </div>
        </div>
    </div>
@endsection
