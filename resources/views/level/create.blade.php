@extends('layouts.masters.master-admin-dash')


@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Create Level</h1>

                <section class="mt-20">

                    @include('level.create-form')

                </section>

        </div>

    </div>

@endsection