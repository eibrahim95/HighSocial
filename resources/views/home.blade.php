@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.tweetForm')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Feed</div>
                    @foreach ($user_tweets as $tweet)
                        @include('layouts.tweetView')
                    @endforeach
                    @if (count($user_tweets) == 0)
                        <div class="panel-body">
                            <br>
                            <p class="lead"> Nothing to view yet ! </p>
                            <br>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
