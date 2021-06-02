@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="company-profile">
                <img src="{{ asset('cover/company-cover.jpeg') }}" alt=""style="width:100%;">
                <div class="company-desc">
                    <img src="{{ asset('avatar/user-male.png') }}" alt=""width="100">
                    <p>{{ $company->description }}</p>
                    <h1>{{ $company->company_name }}</h1>
                    <p>
                        <strong>Slogan</strong> -{{ $company->slogan }}&nbsp; 
                        Address-{{ $company->address }}&nbsp; 
                        Phone-{{ $company->phone }}&nbsp; 
                        Website-{{ $company->website }}
                    </p>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            @foreach($company->job as $job)
                <tr>
                    <td><img src="{{ asset('avatar/user-male.png') }}"width="80"></td>
                    <td>{{ $job->position }}
                        <br>
                        <i class="fa fa-clock"aria-hidden="true"></i>
                        &nbsp; {{ $job->type }}
                    </td>
                    <td>
                        <i class="fa fa-map-marker"aria-hidden="true"></i>
                        &nbsp;{{ $job->address }}
                    </td>
                    <td>
                        <i class="fa fa-globe"aria-hidden="true"></i>
                        &nbsp;{{ $job->created_at->diffForHumans() }}
                    </td>
                    <td>
                        <a href="{{ url("/jobs/detail/$job->id") }}">
                            <button class="btn btn-success btn-sm"> Apply </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
