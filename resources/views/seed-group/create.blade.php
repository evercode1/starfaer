@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Create Seeds</title>

@endsection


@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Create Seed Group</h1>

                <ul class="collapsible popout">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">check</i>How It Works</div>
                        <div class="collapsible-body"><span>

                                <p>Group title is the name you want to give to the group.  It will
                                   appear in the dropdown list on the seeder form.</p>
                                <p>
                                    Config name refers to the config file you are adding to.  Choices
                                    vowels or consonants.

                                </p>
                                <p>The trim setting refer to stripping out the white space before the
                                    word.  Setting this to no means that multiple words will be created
                                    when the generator runs.
                                </p>

                                <p>The syllables field should contain a comma delimited list of words
                                    or vowel/consonant components.
                                </p>



                            </span></div>
                    </li>

                </ul>

                <section class="mt-20">

                    @include('seed-group.create-form')

                </section>

        </div>

    </div>

@endsection

