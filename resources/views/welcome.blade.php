@extends('layouts.app')
@section('content')
            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name', 'Laravel') }}
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                @include('layouts.login')
            </div>
            <div class="col-sm-6">
                @include('layouts.register')
            </div>
        </div>
@endsection