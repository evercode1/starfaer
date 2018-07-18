@extends('layouts.masters.master-auth')

@section('meta')


    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.starfaer.com/all-videos" />
    <meta name="twitter:title" content="Star Faer Videos" />
    <meta name="twitter:description" content="All Star Faer Videos" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />

    <meta name="description" content="All Star Faer Videos">
    <meta name="keywords" content="star faer videos, sci fi videos, science fiction videos">
    <meta name="author" content="Star Faer">


    <title>Star Faer Videos</title>

    @endsection

@section('content')

    <div class="col-sm-8 blog-main">

        <div class="container">

            <div class="col-md-8 mt-25">

                <div class="blog-post">

                    <h2 class="blog-post-title">Videos</h2>

                    <p class="blog-post-meta">All Star Faer Videos</p>


                    <all-videos></all-videos>



                </div><!-- end blog-post -->

            </div> <!-- end column -->

        </div><!-- end container -->


    </div> <!--  end blog-main -->


    @endsection