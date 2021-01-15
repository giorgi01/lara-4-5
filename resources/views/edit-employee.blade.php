@extends('layouts.main')


@section('content')
    <form action="{{ route('employees.update', $employee->id) }}" method="put">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Edit Employee</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $employee->name }}">
                </div>
                <div class="form-group">
                    <label for="name">Lastname</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $employee->lastname }}">
                </div>
                <div class="form-group">
                    <label for="name">Birthdate</label>
                    <input type="date" class="form-control" name="birthdate" id="birthdate" value="{{ $employee->birthdate }}">
                </div>
                <div class="form-group">
                    <label for="name">Personal ID</label>
                    <input type="number" class="form-control" name="personal_id" id="personal_id" value="{{ $employee->personal_id }}">
                </div>
                <div class="form-group">
                    <label for="name">Salary</label>
                    <input type="number" class="form-control" name="salary" id="salary" value="{{ $employee->salary }}">
                </div>
                <div class="form-group">
                    <label for="name">Company ID</label>
                    <input type="number" class="form-control" name="company_id" id="company_id" value="{{ $employee->company->id }}">
                </div>
                Current company name: {{ $employee->company->name }}
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='/employees'">Cancel</button>
            </div>
        </div>
    </form>

@endsection
