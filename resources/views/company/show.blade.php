@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Show Company Detail
                            <a href="{{ url('company') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        
                            <div class="mb-3">
                                <label>Name</label>
                                <p>
                                    {{ $company->name }}
                                </p>
                            
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <p>
                                    {{ $company->email }}
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Logo</label>
                                <p>
                                    {{ $company->image }}
                                </p>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection