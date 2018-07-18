@extends('layouts.masters.master-admin-dash')

@section('meta')

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.starfaer.com/videos-by-category/{{ $category }}" />
    <meta name="twitter:title" content="Star Faer Videos By Category: {{ $category }}" />
    <meta name="twitter:description" content="Star Faer Videos By Category: {{ $category }}" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />




    <meta name="description" content="{{ $category }} videos">
    <meta name="keywords" content="{{ $category }} videos">
    <meta name="author" content="Star Faer">
    <title>{{ $category }} Videos</title>

@endsection


@section('content')

        <div class="container">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">{{ ucfirst($category) }}</h1>


                <p>a list of videos in the {{ ucfirst($category) }} category</p>


                    <div class="row">

                        <videos-by-category-grid
                                :category="{{ json_encode($catId)}}">
                        </videos-by-category-grid>

                        <div class="right"><a href="/all-videos">all videos...</a></div>

                        <br/>
                        



                    </div><!-- end row -->



            </div> <!-- end row -->


    </div> <!-- end container -->




@endsection

