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

        <div class="container">

            <div class="row">

                <div class="mt-20">

                    <h1 class="flow-text grey-text text-darken-1">{{ $video->title }}</h1>


                    <p><strong>By:</strong> {{ $video->author }}</p>

                    <P><strong>Added on:</strong> {{ $video->created_at }}</P>

                    <p><strong>Title:</strong>  {{ $video->description }}</p>

                    <div>
                        <div class="video-container">

                            <iframe src="https://www.youtube.com/embed/{{ $video->embed_code }}" frameborder="0" allowfullscreen></iframe>

                        </div>

                    </div>

                    <div class="center mt-20">

                        <a href="/all-videos"><i class="fa fa-video-camera" aria-hidden="true"></i>  Click here for all videos</a>

                    </div>


                </div><!-- end blog-post -->

            </div> <!-- end column -->

        </div><!-- end container -->



    @endsection

