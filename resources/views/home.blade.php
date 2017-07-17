@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.tweetForm')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tweets</div>

                <div class="panel-body">
                    @foreach ($user_tweets as $tweet)
                        @include('layouts.tweetView')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
