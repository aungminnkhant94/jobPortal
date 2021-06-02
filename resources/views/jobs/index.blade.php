@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Profile Picture</th>
                <th>Position</th>
                <th>Address</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            @foreach($jobs as $job)
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
<style>
    .fa {
        color: blue;
    }
</style>