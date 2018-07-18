@extends('layouts.masters.master-admin-dash')


@section('content')

    <div class="container">

                <h1 class="flow-text grey-text text-darken-1">Edit Video</h1>

        <div class="row">

        <section class="mt-20">


            @include('video.edit-form')


        </section>

        </div>  <!-- end row -->


    </div> <!-- end container -->




@endsection