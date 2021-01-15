@extends('layouts.main')


@section('content')
    <form action="{{ route('companies.update', ['id' => $company->id]) }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Edit Company</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $company->name }}">
                </div>
                <div class="form-group">
                    <label for="name">Code</label>
                    <input type="number" class="form-control" name="code" id="code" value="{{ $company->code }}">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ $company->address }}">
                </div>
                <div class="form-group">
                    <label for="name">City</label>
                    <input type="text" class="form-control" name="city" id="city" value="{{ $company->city }}">
                </div>
                <div class="form-group">
                    <label for="name">City</label>
                    <input type="text" class="form-control" name="country" id="country" value="{{ $company->country }}">
                </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='/companies/all'">Cancel</button>
            </div>
        </div>
    </form>

    <br>
    Company employees:
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Lastname</th>
            <th>Personal ID</th>
        </tr>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->lastname }}</td>
                <td>{{ $employee->personal_id }}</td>
                <td>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
