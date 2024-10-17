@extends('layouts.admin')

@section('content')
<div class="container mt-4">


        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif



    <div class="d-flex justify-content-between mb-3">
      <a href="{{ route('student.create') }}" class="btn btn-primary">Add New Student</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm" id="studentsTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Teacher Name</th>
                    <th>Contact No</th>
                    <th>Admission Date</th>
                    <th>Yearly Fees</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($students as $index => $student)
                <tr>
                <td>{{ $students->firstItem() + $index }}</td>
                <td>{{ $student->student_name }}</td>
                <td>{{ $student->teacher ? $student->teacher->teacher_name : 'N/A' }}</td>
                <td>{{ $student->contact_no }}</td>
                <td>{{ \Carbon\Carbon::parse($student->admission_date)->format('d-m-Y') }}</td>
                <td>{{ $student->yearly_fees }}</td>
                <td>
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm" title="Edit Student">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('student.show', $student->id) }}" class="btn btn-info btn-sm" title="View Student">
                        <i class="fas fa-eye"></i>
                    </a>
                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?');">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    @if ($student->trashed())
                        <form action="{{ route('student.restore', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to restore this student?');">
                                <i class="fas fa-undo"></i> Restore
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach

            </tbody>
        </table>
        {{ $students->links('vendor.pagination.custom') }}
    </div>

</div>
@endsection
