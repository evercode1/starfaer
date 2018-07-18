@extends('layouts.masters.master-admin-dash')


@section('content')

    <div class="container ">


        <div class="row">

            <h1 class="flow-text grey-text text-darken-1">Create Topic</h1>

        <section>

            @include('contact-topic.create-form')

        </section>

        </div> <!-- end row -->


    </div> <!-- end container -->


@endsection