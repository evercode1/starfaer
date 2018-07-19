@extends('layouts.masters.master-auth')

@section('meta')


    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.starfaer.com/all-articles" />
    <meta name="twitter:title" content="Star Faer Articles" />
    <meta name="twitter:description" content="All Star Faer Articles" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />

    <meta name="description" content="All Star Faer Articles">
    <meta name="keywords" content="star faer articles, sci fi articles, science fiction articles">
    <meta name="author" content="Star Faer">


    <title>Star Faer Articles</title>

    @endsection

@section('content')


        <div class="container">

            <div class="row">

                <div class="mt-20">

                    <all-articles></all-articles>

                </div>

            </div> <!-- end row -->

        </div><!-- end container -->





    @endsection