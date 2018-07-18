@extends('layouts.masters.master-admin-dash')

@section('meta')

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.starfaer.com/videos-by-level/{{ $levelName }}" />
    <meta name="twitter:title" content="Star Faer Videos By Level {{ ucfirst($levelName) }}" />
    <meta name="twitter:description" content="Star Faer Videos By Level: {{ ucfirst($levelName) }}" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />


    <meta name="description" content="{{ ucfirst($levelName) }} star faer videos">
    <meta name="keywords" content="{{ ucfirst($levelName) }} star faer videos">
    <meta name="author" content="Star Faer">
    <title>{{ ucfirst($levelName) }} Star Faer Videos</title>

@endsection



@section('content')



    <div class="col-sm-8 blog-main">


        <div class="container">

            <div class="col-md-8 mt-25">

                <h2 class="blog-post-title">{{ ucfirst($levelName ) }}</h2>

                <p class="blog-post-meta">List of videos at the {{ ucfirst($levelName ) }} level.</p>

                <br/>


                    <div class="blog-post">

                        <videos-by-level-grid
                                :level="{{ json_encode($levelId) }}">
                        </videos-by-level-grid>

                        <div class="pull-right"><a href="/all-videos">all videos...</a></div>

                        <br/>




                    </div><!-- end blog-post -->



            </div> <!-- end column -->


    </div> <!-- end container -->

    </div><!--  end blog-main -->



@endsection

