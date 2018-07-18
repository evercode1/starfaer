@extends('layouts.masters.master-admin-dash')


@section('content')

    <div class="container ">

            <div class="col-md-8 col-md-offset-2">

        <h1 class="section-title">Edit Video</h1>

        <section class="row">


            @include('video.edit-form')


        </section>

        </div>  <!-- end column -->


    </div> <!-- end container -->




@endsection