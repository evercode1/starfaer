@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Create Seeds</title>

@endsection


@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Create Seeds</h1>

                <section class="mt-20">

                    @include('seeder.create-form')

                </section>

        </div>

    </div>

@endsection

