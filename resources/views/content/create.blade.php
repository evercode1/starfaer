@extends('layouts.masters.master-admin-dash')

@section('meta')

    <script src="/ckeditor/ckeditor.js"></script>

@endsection


@section('content')

    <div class="container">

        <div class="row">


            @include('content.create-form')


        </div>


    </div>



@endsection

@section('scripts')

    <script>
        CKEDITOR.replace( 'body' );
    </script>

@endsection