@extends('layouts.masters.master-landing')

@section('content')

    <div class="pimg1">

        <div class="ptext">

            <span class="border">

                @if(! Auth::check())

                    <a href="/login">Star Faer</a>

                @else

                    <a href="/home">Star Faer</a>

                @endif



            </span>

            <br>

            <div class="subtext">Galactic Adventures</div>


        </div>

    </div>

    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center bluish"><i class="large material-icons">brightness_5</i></h2>
                        <h5 class="center">1007 Stars</h5>

                        <p class="light">Over 1000 star systems, including star type, number of planets,
                            and more on the Kaedra Galaxy.
                        </p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center bluish"><i class="large material-icons">brightness_1</i></h2>
                        <h5 class="center">Over 12,000 Planets</h5>

                        <p class="light">Eplore these worlds that are full of life and adventure.
                         </p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center bluish"><i class="large material-icons">brightness_2</i></h2>
                        <h5 class="center">Over 43,000 Moons</h5>

                        <p class="light">Unprecendented attention to details, each system is loaded with information.




                            </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row center">


        <p>

            @if(! Auth::check())

                <a href="/login">Click here to login or join</a>.

            @else

                <a href="/home">Home</a>.

            @endif



        </p>



    </div>

    <div class="pimg2">
        <div class="ptext">
            <span class="border trans">

                The Kaedra Galaxy Is Full Of Life

            </span>
        </div>
    </div>

    <section class="section section-dark">
        
        <h2># Sci Fi Fans</h2>
        <p>
            Star Faer brings you epic advetures.

        </p>

    </section>

    <div class="pimg3">
        <div class="ptext">
            <span class="border trans">

                Life Started Out There

            </span>
        </div>
    </div>

    <section class="section section-dark">

        <h2># Now It's Here</h2>
        <p>

            The Milky Way is devoid of life.  Kaedra is full of life.

        </p>
        <p>

            @if(! Auth::check())

                <a href="/login">Take the tour now</a>.

            @else

                <a href="/home">Home</a>

            @endif

        </p>
    </section>

    <div class="pimg4">

        <div class="ptext">



            <span class="border">


               <a href="/register">Join Now Free</a>

            </span>

            <br>

            <div class="subtext">Start Your Adventure</div>


        </div>



    </div>

@endsection