@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Employee Detail
                            <a href="{{ url('employee') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        
                            <div class="mb-3">
                                <label>First Name</label>
                                <p>
                                    {{ $employee->first_name }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <p>
                                    {{ $employee->last_name }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Company Name</label>
                                <p>
                                    {{ $employee->company_id }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <p>
                                    {{ $employee->email }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Contact</label>
                                <p>
                                    {{ $employee->contact }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Profile Picture</label>
                                <p>
                                    {{ $employee->profile_picture }}
                                </p>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection