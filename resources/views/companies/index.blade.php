@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="company-profile">
            <img src="{{ asset('cover/company-cover.jpeg') }}" alt=""style="width:100%;">
            <div class="company-desc">
                <img src="{{ asset('avatar/user-male.png') }}" alt=""width="100">
                <h1>Company Name</h1>
                <p>Slogan-&nbsp; Address-&nbsp; Phone-&nbsp; Website-</p>
            </div>
        </div>
    </div>
</div>
@endsection
