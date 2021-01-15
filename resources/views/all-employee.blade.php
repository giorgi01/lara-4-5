@extends('layouts.main')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Company IDs</h4>
        </div>
        <div class="card-body">
            @foreach($companies as $company)
                {{ $company->name }} | ID: {{ $company->id }} <br>
            @endforeach
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>All Employees</h4>
        </div>
        <div class="card-body">


            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Birthdate</th>
                    <th>Personal ID</th>
                    <th>Salary</th>
                    <th>Company</th>
                    <th>Actions</th>
                </tr>

                <form action="{{ route('employees.store') }}" method="POST" >
                    @csrf
                    <tr>
                        <td>#</td>
                        <td><input class="form-control" type="text" name="name" placeholder="Enter Name"></td>
                        <td><input class="form-control" type="text" step="any" name="lastname" placeholder="Enter Lastname"></td>
                        <td><input class="form-control" type="date" step="any" name="birthdate" placeholder="Enter Birthdate"></td>
                        <td><input class="form-control" type="number" step="any" name="personal_id" placeholder="Enter Personal ID"></td>
                        <td><input class="form-control" type="number" name="salary" placeholder="Enter Salary"></td>
                        <td><input class="form-control" type="number" name="company_id" placeholder="Enter ID"></td>
                        <td><button class="btn btn-success"type="submit">Add</button></td>

                    </tr>
                </form>

                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->lastname }}</td>
                        <td>{{ $employee->birthdate}}</td>
                        <td>{{ $employee->personal_id }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td>

                            <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="employee_id" value="{{ $employee->id }}" />
                                <button class="btn btn-danger">Delete</button>
                            </form>

                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>

                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

    <a href="/">Back</a>
@endsection
