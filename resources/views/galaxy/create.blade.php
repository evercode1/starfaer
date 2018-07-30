@extends('layouts.masters.master-admin-dash')

@section('meta')

    <script src="/ckeditor/ckeditor.js"></script>

@endsection

@section('title')

    <title>Create a Galaxy</title>

@endsection


@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Galaxy</h1>

                <section class="mt-20">

                    @include('galaxy.create-form')

                </section>

        </div>

    </div>

@endsection

