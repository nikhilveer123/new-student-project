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



    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm" id="teachersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Teacher Name</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Email</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $index => $teacher)
                <tr>
                    <td>{{ $teachers->firstItem() + $index }}</td>
                    <td>{{ $teacher->teacher_name }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>{{ $teacher->contact_no }}</td>
                    <td>{{ $teacher->email }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $teachers->links('vendor.pagination.custom') }}
    </div>

</div>
@endsection
