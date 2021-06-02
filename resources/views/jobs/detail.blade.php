@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $job->title  }}</div>

                <div class="card-body">
                    <h3> Description </h3>
                    <p>{{ $job->description }}</p> 

                    <p>
                        <h3>Duties</h3>
                        {{ $job->roles }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short Info</div>
                <div class="card-body">
                    <p> Company: <a href="{{ route('companies.detail',[$job->company->id]) }}">{{ $job->company->company_name }}</a> </p>
                    <p> Address: {{ $job->address }} </p>
                    <p> Employment Type: {{ $job->type }} </p>
                    <p> Position: {{ $job->position }} </p>
                    <p> Date: {{ $job->created_at->diffForHumans() }} </p>
                </div>
            </div>
            @auth
            <button class="btn btn-secondary mt-3"style="width:100%;">Apply</button>
            @endauth
        </div>
    </div>
    
</div>
@endsection
