@extends('layouts.app')

@section('content')
<div class="container mt-5">
    {{-- <h1>Employee List</h1> --}}
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <form class="d-inline-block" method="GET" action="{{ route('employees.index') }}">
            <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control d-inline-block" placeholder="Search by Name" style="width: auto;">
            <button type="submit" class="btn btn-primary mt-2">Search</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-2">Reset</a>
        </form>
        
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
    </div>
    

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ \Carbon\Carbon::parse($employee->dob)->format('d-m-Y') }}</td>
                    <td>
                        @if($employee->image_path)
                            <img src="{{ asset('storage/' . $employee->image_path) }}" alt="{{ $employee->name }}" width="50">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->employee_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->employee_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" align="center">No Employees Found!</td></tr>
            @endforelse
        </tbody>
    </table>
    {{ $employees->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
