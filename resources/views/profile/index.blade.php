@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-3">

                @if(empty(Auth::user()->avatar))
                <img src="{{ asset('avatar/user-male.png') }}" alt=""style="width:100%;">
                @endif

                <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->avatar }}" alt=""style="width:100%">
                    <div class="card">
                        <div class="card-header">Update Photo</div>
                        <div class="card-body">
                            <form action="{{ route('profile.avatar') }}"method="POST"enctype="multipart/form-data">
                            @csrf
                            <input type="file"class="form-control"name="avatar">
                            @if($errors->has('avatar'))
                                <div class="error"style="color:red;">
                                    {{ $errors->first('avatar') }}
                                </div>
                            @endif
                            <br>
                            <button class="btn btn-success float-right"type="submit">Update</button>
                            </form>
                        </div>
                    </div>       
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update Your Profile</div>

                    <form action="{{ route('profile.store') }}"method="POST"enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text"class="form-control"name="address"value="{{ Auth::user()->address }}">
                                @if($errors->has('address'))
                                    <div class="error"style="color:red;">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text"class="form-control"name="phone_number"value="{{ Auth::user()->phone_number }}">
                                @if($errors->has('phone_number'))
                                    <div class="error"style="color:red;">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Experience</label>
                                <textarea name="experience"class="form-control"mx-auto>
                                    {{ Auth::user()->experience }}
                                </textarea>
                                @if($errors->has('experience'))
                                    <div class="error"style="color:red;">
                                        {{ $errors->first('experience') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Bio</label>
                                <textarea name="bio"class="form-control">
                                    {{ Auth::user()->bio }}
                                </textarea>
                                @if($errors->has('bio'))
                                    <div class="error"style="color:red;">
                                        {{ $errors->first('bio') }}
                                    </div>
                                @endif
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
                        <p>Phone Number: {{ Auth::user()->phone_number }}</p>
                        <p>Gender: {{ Auth::user()->gender }}</p>
                        <p>Experience: {{ Auth::user()->experience }}</p>
                        <p>Bio: {{ Auth::user()->bio }}</p>
                        <p>Since Member: {{ date('F d Y',strtotime(Auth::user()->created_at)) }}</p>
                        @if(!empty(Auth::user()->cover_letter))
                            <p><a href="{{ Storage::url(Auth::user()->cover_letter) }}">
                                Cover Letter
                            </a></p>
                        @else
                            <p>Please Upload cover letter.</p>
                        @endif
                        @if(!empty(Auth::user()->resume))
                            <p><a href="{{ Storage::url(Auth::user()->resume) }}">
                                Resume
                            </a></p>
                        @else
                            <p>Please Upload resume.</p>
                        @endif
                    </div>
                </div>
                <form action="{{ route('profile.coverletter') }}"method="POST"enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Your Cover Letter</div>
                        <div class="card-body">
                            <input type="file"class="form-control"name="cover_letter"value="{{ old('cover_letter') }}">
                            <br>
                            @if($errors->has('cover_letter'))
                                <div class="error"style="color:red;">
                                    {{ $errors->first('cover_letter') }}
                                </div>
                            @endif
                            
                            <button class="btn btn-success"type="submit">UPDATE</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('profile.resume') }}"method="POST"enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Your Resume</div>
                        <div class="card-body">
                            <input type="file"class="form-control"name="resume">
                            <br>
                            @if($errors->has('resume'))
                                <div class="error"style="color:red;">
                                    {{ $errors->first('resume') }}
                                </div>
                            @endif
                            <button class="btn btn-success"type="submit">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection