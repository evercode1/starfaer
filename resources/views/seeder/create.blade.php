@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Create Seeds</title>

@endsection


@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Create Seeds</h1>

                <ul class="collapsible popout">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">check</i>How It Works</div>
                        <div class="collapsible-body">
                            <span>

                                <p>The name field designates the config file name, so choose a name
                                    that corresponds to the seeds you are creating, ie planets, moons,
                                    etc.</p>


                                <p>
                                    Word length sets a target for the length of the words generated.  Because of
                                    the different lengths of the consonant and vowels, it is not a direct correlation
                                    to actual word length.  Use smaller lengths and use half the intended length.  An
                                    8 letter word would need to be entered as 4.

                                </p>

                                <p>Total names to generate represents the total number of records to generate.</p>

                                <p>Vowel group refers to the custom vowels that are added to the base set.</p>

                                <p>Consonant group refers to the custom consonants that are added to the base set.</p>

                                <p> Direction of seeds refers to the unique vowels and consonants groups that are used
                                    in combination with the base group.  Putting seed group first will
                                    result in the custom consonant or vowels ordered first in the list.  It makes
                                    a difference on the end result, so alternating between these choices will lead
                                    to different seeds being created.</p>

                            </span></div>
                    </li>

                </ul>

                <section class="mt-20">

                    @include('seeder.create-form')

                </section>

        </div>

    </div>

@endsection

