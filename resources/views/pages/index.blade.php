@extends('layouts.masters.master-landing')

@section('title')

    <title>Star Faer</title>

@endsection

@section('content')



    <div class="container">
        <div class="section">



            <div class="center black-background"><a href="/login"><img src="/imgs/home/logo.png"
                                                                       height="150"
                                                                       class="image-scale"
                                                                       alt="Star Faer"></a>
                <div class="center white-text">Max Vonne</div>
            </div>

            <div class="center">
                <a href=""><img src="/imgs/home/cartha-front.jpg" height="200px" class="mt-50" alt="Star Faer: C'artha's Kiss"></a>

                <a href=""><img src="/imgs/home/shadow-of-the-ring-front-cover.jpg" height="200px" class="mt-50" alt="Star Faer:  Shadow of the Ring"></a>

            </div>





            <div> <h3  class="center bluish"><a href="#">Read Book One Free (1/15/2020)</a></h3> </div>

            <div><h6 class="center bluish mb-20">Star Faer is a ten book series</h6></div>


            <div><a href="https://twitter.com/StarFaerSaga?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @StarFaerSaga</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

            </div>

            <div><h6 class="center bluish">Book covers by <a href="https://www.anacruz-arts.com" target="new">Ana Cruz Cover Art</a></h6></div>





            <div class="center">
                <img src="/imgs/home/me.jpg" height="200px" class="mt-50" alt="Max Vonne">

            </div>


            <div><h4 class="center bluish">Max Vonne</h4></div>






            <div><h1 class="center bluish"># Reader's club</h1></div>
            <div><h5 class="center bluish">Get Free Access to Bonus Material</h5></div>
            <div><h6 class="center bluish">New Release Notifications</h6></div>
            <div><h6 class="center bluish">Live Events</h6></div>
            <div><h6 class="center bluish">Merch and Collectibles</h6></div>
            <div><h6 class="center bluish">Free Access to the Worlds of Star Faer</h6></div>


            <div class="mt-20 mb-50"> <h4  class="center"><a href="/register"> <u>Join Free Now</u>  </a></h4> </div>








<section class="center">

    <div>


        <a class="twitter-timeline tw-align-center" href="https://twitter.com/StarFaerSaga?ref_src=twsrc%5Etfw"
                                                    data-tweet-limit="3"
                                                    width="300">Tweets by StarFaerSaga</a>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>



    </div>

</section>

    <section class="section section-dark">

        <h2># Organically Grown</h2>
        <p>

            Join the growing community of Star Faer fans.

        </p>
        <p>

            @if(! Auth::check())

                <a href="/login">Join the Reader's Club for Free Now</a>.

            @else

                <a href="/home">Home</a>

            @endif

        </p>
    </section>

    </div>



@endsection