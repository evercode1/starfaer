@extends('layouts.masters.master-auth')

@section('content')





    <div class="container">

        <div class="row">



                <h1 class="flow-text grey-text text-darken-1">{{ $contact->contactTopic->name }}</h1>


                <p class="blog-post-meta">{{ $contact->created_at }} by <a href="#">{{ $contact->user->name }}</a></p>

                <span class="grey-text lighten-5">{{ $contact->user->name }} said:</span>

                <p class="grey-text text-darken-3">{{ $contact->message }}</p>

                <div class="mt-20">

                    @include('contact.reply-form', ['user_id' => $contact->user_id, 'contact_id' => $contact->id])


                </div>

                <div class="row mt-20">


                    <div>
                        <!-- Default panel contents -->
                        <div><h5 class="flow-text grey-text text-darken-1">Message History:</h5></div>
                        <div>
                            <!-- List group -->
                            <ul>

                                @foreach($messages as $message)

                                    @if( ! $message->reply)

                                        <span class="grey-text">{{ $message->created }} {{ $contact->user->name }} requested:</span>

                                <li>

                                  <p>"{{ $message->message }}"</p>

                                </li>

                                        @else

                                         <span class="grey-text mt-10">{{ $message->created }} {{ $contact->user->name }} requested:</span>

                                    <li><p>"{{ $message->message}}"</p></li>

                                    @endif




                                @if($message->reply)

                                    <li class="grey-text mt-10">Support replied on {{ $message->replied }}:</li>

                                        <li><p>"{{ $message->reply }}"</p></li>

                                    @else

                                        <li class="mt-10 mb-10">
                                            <a href="/contact/{{ $message->id }}">No Reply From Support yet.</a>
                                        </li>


                                    @endif



                                @endforeach

                            </ul>
                        </div>



                    </div>




                </div>



        </div> <!-- end column -->



    </div> <!-- end container -->


@endsection
