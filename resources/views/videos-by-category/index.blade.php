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



    <div class="col-sm-8 blog-main">


        <div class="container">

            <div class="col-md-8 mt-25">

                <h2 class="blog-post-title">{{ ucfirst($category) }}</h2>

                <p class="blog-post-meta">a list of videos in the {{ ucfirst($category) }} category</p>

                <br/>


                    <div class="blog-post">

                        <videos-by-category-grid
                                :category="{{ json_encode($catId)}}">
                        </videos-by-category-grid>

                        <div class="pull-right"><a href="/all-videos">all videos...</a></div>

                        <br/>
                        



                    </div><!-- end blog-post -->



            </div> <!-- end column -->


    </div> <!-- end container -->

    </div><!--  end blog-main -->



@endsection

