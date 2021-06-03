@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('avatar/user-male.png') }}" alt=""width="100">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Update Your Profile</div>
                    <form action="{{ route('profile.store') }}"method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text"class="form-control"name="address">
                            </div>
                            <div class="form-group">
                                <label for="">Experience</label>
                                <textarea name="experience"class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Bio</label>
                                <textarea name="bio"class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success"type="submit">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Your Information</div>
                    <div class="card-body">
                        <p>Name: {{ Auth::user()->name }}</p>
                        <p>Email: {{ Auth::user()->email }}</p>
                        <p>Address: {{ Auth::user()->address }}</p>
                        <p>Gender: {{ Auth::user()->gender }}</p>
                        <p>Experience: {{ Auth::user()->experience }}</p>
                        <p>Bio: {{ Auth::user()->bio }}</p>
                        <p>Since Member: {{ Auth::user()->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Update Your Cover Letter</div>
                    <div class="card-body">
                        <input type="file"class="form-control"name="cover_letter">
                        <br>
                        <button class="btn btn-success"type="submit">UPDATE</button>
                    </div>
                    <div class="card-header">Update Your Resume</div>
                    <div class="card-body">
                        <input type="file"class="form-control"name="resume">
                        <br>
                        <button class="btn btn-success"type="submit">UPDATE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection