@extends('layouts.masters.master-landing')

@section('title')

    <title>Star Faer</title>

@endsection

@section('content')



    <div class="container">
        <div class="section">



            <div class="center black-background"><a href="/login"><img src="/imgs/home/logo.png" width="200px" class="center" alt="Star Faer"></a></div>

            <div class="center">
                <a href=""><img src="/imgs/home/cartha-front.jpg" height="200px" class="mt-50" alt="Star Faer: C'artha's Kiss"></a>

                <a href=""><img src="/imgs/home/shadow-of-the-ring-front-cover.jpg" height="200px" class="mt-50" alt="Star Faer:  Shadow of the Ring"></a>

            </div>





            <div> <h3  class="center bluish"><a href="#">Read Book One Free (1/15/2020)</a></h3> </div>

            <div><h6 class="center bluish">Star Faer is a ten book series</h6></div>
            <div class="mb-20"><h6 class="center bluish">by Max Vonne</h6></div>

            <div><h5 class="center bluish">C'artha's Kiss</h5></div>

            <p>C’artha is a teenage Elf with a secret.  She can talk to dragons.  It’s an unusual talent, hinting at her emerging magical
                abilities.  With her older sister destined for the throne, C’artha carefully avoids doing anything to spoil the wedding.
                Little does she know that war is coming, along with palace intrigues that will shake her world to the core.
                Can she overcome the expectations of those around her?  C’artha’s journey is one of self-discovery against
                the wishes of those who would have her be subservient to the Elvish monarchy and its interests.</p>




            <div><h5 class="center bluish">Shadow of the Ring</h5></div>

            <div>
                <p class="left">C’artha’s adventures continue on Tyra, a world with a planetary ring around it.
                    The ring has left debris on the planet in the form of crystals with unusual properties.
                    The Tyrans mine the crystals to trade for gold.  Business is booming but they have to burn the
                    Great Forest to clear the trees, killing all Munks, Squirks, and other native life in the process.</p>

                <p>C’artha is only a visitor on Trya, but can she stay neutral while so much life is lost?  Conflicts involving
                    life and death touch her in more ways than one as she continues her quest to find the whereabouts of her one
                    true love, Captain T’olkane Sol.</p>


            </div>


            <div><h5 class="center bluish">Infinity Flower</h5></div>

            <div class="mt-20"><h6 class="center bluish">coming early 2020</h6></div>

            <div class="center">
                <img src="/imgs/home/me.jpg" height="200px" class="mt-50" alt="Max Vonne">

            </div>


            <div><h4 class="center bluish">Max Vonne</h4></div>






            <div><h1 class="center bluish"># Reader's club</h1></div>
            <div><h5 class="center bluish">Get Free Access to Bonus Material</h5></div>
            <div><h6 class="center bluish">New Release Notifications</h6></div>
            <div><h6 class="center bluish">Live Events</h6></div>
            <div><h6 class="center bluish">Merch and Collectibles</h6></div>

            <div class="mt-20"> <h4  class="center"><a href="/register"> <u>Join Free Now</u>  </a></h4> </div>




            <div class="mt-50"><h5 class="center bluish">Max Vonne's Cosmic Fantasy Features Rich Worlds</h5></div>


            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">



                    <div class="icon-block">
                        <h2 class="center bluish"><i class="large material-icons">brightness_5</i></h2>
                        <h5 class="center">1007 Stars</h5>

                        <p class="light">Over 1000 star systems, including star type, number of planets,
                            and more in the Kaedra Galaxy.
                        </p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center bluish"><i class="large material-icons">brightness_1</i></h2>
                        <h5 class="center">Over 12,000 Planets</h5>

                        <p class="light">Explore these worlds that are full of life and adventure.
                         </p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center bluish"><i class="large material-icons">brightness_2</i></h2>
                        <h5 class="center">Over 43,000 Moons</h5>

                        <p class="light">Unprecedented attention to details, each system is loaded with information.




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


    <div><h6 class="center bluish">Book cover by <a href="https://www.anacruz-arts.com" target="new">Ana Cruz Cover Art</a></h6></div>



    <div class="pimg2">


        <div class="ptext-black">
            <span class="border trans">

                <div><h2 >Epic Stories</h2></div>

                <div class="subtext-dark">War. Glory. Love.  Betrayal.</div>

                Max Vonne



            </span>
        </div>
    </div>

    <section class="section section-dark">
        
        <h2># Science Fantasy Fans</h2>

        <p>
            Max Vonne's Star Faer brings you a blend of Sci Fi and Fantasy.

        </p>

    </section>

    <div class="pimg3">
        <div class="ptext">
            <span class="border trans">



            </span>
        </div>
    </div>

    <section class="section section-dark">

        <h2># Fantasy Meets Sci Fi</h2>
        <p>

            Queens.  Slaves.  Barbarians.  Elves.  Magic. Tech.

        </p>
        <p>

            @if(! Auth::check())

                <a href="/login">Join the Mailing List for Free Now</a>.

            @else

                <a href="/home">Home</a>

            @endif

        </p>
    </section>

    <div class="pimg1">

        <div class="ptext">

            <span class="">

                <div class="">

                     @if(! Auth::check())

                        <a href="/login"><img src="/imgs/home/logo.png" width="200px" class="mt-50" alt="Max Vonne"></a>

                    @else

                        <a href="/home"><img src="/imgs/home/logo.png" width="200px" class="mt-50" alt="Max Vonne"></a>

                    @endif


                </div>





            </span>




        </div>

    </div>

@endsection