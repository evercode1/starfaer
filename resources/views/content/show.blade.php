@extends('layouts.masters.master-guest')

@section('meta')




    <title>{{ ucwords($content->name) }}</title>

@endsection

@section('content')


    <div class="col-sm-8 blog-main">


    <div class="container">




            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">{{ ucwords($content->name) }}</h1>

                @if(ucwords($content->name) == 'About')
                    <img src="/imgs/home/me.jpg" width="200" alt="Max Vonne">

                    @endif

                <div class="row">

                {!! $content->body !!}

                </div>

            </div><!-- end row -->



    </div><!--  end blog-main -->

    </div> <!-- end container -->



@endsection

