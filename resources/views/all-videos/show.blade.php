@extends('layouts.masters.master-auth')

@section('meta')

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.starfaer.com/all-videos/{{ $video->id }}-{{ $video->slug }}" />
    <meta name="twitter:title" content="{{ $video->title }}" />
    <meta name="twitter:description" content="{{ $video->description }}" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />

    <meta name="description" content="{{ $video->description }}">
    <meta name="keywords" content="{{ $video->title }} video">
    <meta name="author" content="Star Faer">


    <title>{{ $video->title }}</title>

    @endsection

@section('content')

    <div class="col-sm-8 blog-main">

        <div class="container">

            <div class="col-md-8 mt-25">

                <div class="blog-post">

                    <h2 class="blog-post-title">{{ $video->title }}</h2>

                    <p>by {{ $video->author }}</p>

                    <P>Added on {{ $video->created_at }}</P>

                    <p class="blog-post-meta">{{ $video->description }}</p>

                    <div>
                        <div class="video-container">

                            <iframe src="https://www.youtube.com/embed/{{ $video->embed_code }}" frameborder="0" allowfullscreen></iframe>

                        </div>

                    </div>

                    <div class="text-center mt-20 mb-40">

                        <a href="/all-videos"><i class="fa fa-video-camera" aria-hidden="true"></i>  Click here for all videos</a>

                    </div>

                    <br />



                    <warning :message="{{ json_encode($videoWarning)}}"></warning>

                </div><!-- end blog-post -->

            </div> <!-- end column -->

        </div><!-- end container -->


    </div> <!--  end blog-main -->


    @endsection

