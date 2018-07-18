@extends('layouts.masters.master-admin-dash')


@section('content')

    <div class="container ">




            <div class="col-md-8 col-md-offset-2">

        <h1 class="section-title">Create Video</h1>



        <section class="white-background rounded-corners-10 pad-20">


            @include('video.create-form')


        </section>

        </div>









    </div>




@endsection