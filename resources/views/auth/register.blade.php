@extends('layouts.masters.master-guest')

@section('content')

<div class="mt-20">

    <div class="container">

        <div>

            <h1 class="center flow-text grey-text text-darken-1">Join Star Faer's Reader Club</h1>
            <div>

                <div class="center">

                    <ul>
                        <li>Get Free Access to Bonus Material</li>
                        <li>New Release Notifications</li>
                        <li>Live Events Info</li>
                        <li>Merch and Collectibles Links</li>

                    </ul>

                </div>



            </div>
        </div>


      <div>

          @include('auth.register-form')

      </div>




    </div>

</div>

@endsection
