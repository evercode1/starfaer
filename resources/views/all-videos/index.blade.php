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


        <div class="container">

            <div class="row">

                <div class="mt-20">

                    <all-videos></all-videos>

                </div>

            </div> <!-- end row -->

        </div><!-- end container -->





    @endsection