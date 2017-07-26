@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6">
                <div style="text-align: center; font-size: 16px; font-weight: bold;margin-top:200px"><p>HighSocial</p>
                <p>Top Stories From Social Media</p>
                <p>&copy HighSocial 2017</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                @include('layouts.loginForm')
                @include('layouts.registerForm')
            </div>
        </div>
</div>
@endsection