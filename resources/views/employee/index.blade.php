@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">


                @session('status')
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endsession




                <div class="card">
                    <div class="card-header">
                        <h4>Employees List
                            <a href="{{ url('account/dashboard') }}" class="btn btn-danger float-end">Back</a>
                            <a href="{{ url('employee/create') }}" class="btn btn-primary float-end">Add Employee</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Profile Picture</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee) 
                                <tr>
                                    <td>{{ $employee->employee_id }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->company_id }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->contact }}</td>
                                    <td>
                                        <img src="{{ asset($employee->profile_picture) }}" style="width:80px; height:80px;" 
                                        alt="Img" />
                                    </td>
                                    <td>
                                        <a href="{{ route('employee.edit', $employee->employee_id ) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('employee.show', $employee->employee_id ) }}" class="btn btn-info">Show</a>
                                        <form action="{{ route('employee.destroy', $employee->employee_id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection