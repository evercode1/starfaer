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



        <div class="container">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">{{ ucfirst($levelName ) }}</h1>



                <p>List of videos at the {{ ucfirst($levelName ) }} level.</p>



                    <div class="row">

                        <videos-by-level-grid
                                :level="{{ json_encode($levelId) }}">
                        </videos-by-level-grid>

                        <div class="right"><a href="/all-videos">all videos...</a></div>

                        <br/>




                    </div><!-- end row -->



            </div> <!-- end row -->


    </div> <!-- end container -->




@endsection

