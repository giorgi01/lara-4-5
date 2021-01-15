@extends('layouts.main')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>All Companies</h4>
        </div>
        <div class="card-body">


            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Employees quantity</th>
                    <th>Actions</th>
                </tr>

                <form action="{{ route('companies.add') }}" method="POST" >
                    @csrf
                    <tr>
                        <td>#</td>
                        <td><input class="form-control" type="text" name="name" placeholder="Enter Name"></td>
                        <td><input class="form-control" type="number" step="any" name="code" placeholder="Enter Code"></td>
                        <td><input class="form-control" type="text" step="any" name="address" placeholder="Enter Address"></td>
                        <td><input class="form-control" type="text" step="any" name="city" placeholder="Enter City"></td>
                        <td><input class="form-control" type="text" name="country" placeholder="Enter Country"></td>
                        <td>#</td>
                        <td><button class="btn btn-success"type="submit">Add</button></td>

                    </tr>
                </form>

                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->code }}</td>
                        <td>{{ $company->address }}</td>
                        <td>{{ $company->city }}</td>
                        <td>{{ $company->country }}</td>
                        <td>{{ sizeof($company->employees) }}</td>
                        <td>

                            <form action="{{ route('companies.delete') }}" method="post">
                                @csrf
                                <input type="hidden" name="company_id" value="{{ $company->id }}" />
                                <button class="btn btn-danger">Delete</button>
                            </form>

                            <a href="{{ route('companies.edit', ['id' => $company->id]) }}" class="btn btn-primary">Edit</a>

                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
    <a href="/">Back</a>
@endsection
