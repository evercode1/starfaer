@extends('layouts.masters.master-auth')

@section('meta')


    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.starfaer.com/all-videos" />
    <meta name="twitter:title" content="Star Faer Social" />
    <meta name="twitter:description" content="Star Faer Twitter" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />

    <meta name="description" content="Star Faer Twitter Feed>
    <meta name="keywords" content="star faer, sci fi, science fiction, twitter, max vonne, max vonne twitter">
    <meta name="author" content="Star Faer">


    <title>Star Faer Twitter</title>

@endsection


@section('content')
    <div class="mt-50"></div>

    <div class="container">

    <div class="mt-50">
        <a class="twitter-timeline"
           href="https://twitter.com/StarFaerSaga"
           data-chrome="nofooter noborders"
           data-tweet-limit="3"
           data-width="250"
           data-height="300">
            Tweets by @StarFaerSaga
        </a>



    </div>



    </div>





@endsection