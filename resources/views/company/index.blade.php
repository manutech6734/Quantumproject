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
                        <h4>Companies List
                            <a href="{{ url('account/dashboard') }}" class="btn btn-danger float-end">Back</a>
                            <a href="{{ url('company/create') }}" class="btn btn-primary float-end">Add Company</a>  
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company) 
                                <tr>
                                    <td>{{ $company->company_id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        <img src="{{ asset($company->image) }}" style="width:80px; height:80px;" 
                                        alt="Img" />
                                    </td>
                                    <td>
                                        <a href="{{ route('company.edit', $company->company_id ) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('company.show', $company->company_id ) }}" class="btn btn-info">Show</a>
                                        <form action="{{ route('company.destroy', $company->company_id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection