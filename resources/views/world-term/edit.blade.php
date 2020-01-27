@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Edit WorldTerm</title>

@endsection

@section('meta')

    <script src="/ckeditor/ckeditor.js"></script>

@endsection

@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Edit World Term</h1>

                <section class="mt-20">

                @include('world-term.edit-form')

                </section>

            </div>

    </div>

@endsection

