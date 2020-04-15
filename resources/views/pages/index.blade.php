@extends('layouts.masters.master-landing')

@section('meta')

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.starfaer.com" />
    <meta name="twitter:title" content="Star Faer" />
    <meta name="twitter:description" content="Official Star Faer Site" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />

    <meta name="description" content="Official Star Faer Site.  Star Faer books by Max Vonne.  C'artha's Kiss, Shadow of the Ring, Infinity Flower.  Bonus material by Max Vonne.  Star Faer merchandise.">
    <meta name="keywords" content="star faer, cosmic fantasy, epic fantasy, science fantasy, science fiction, Max Vonne">
    <meta name="author" content="Max Vonne">
    <title>Star Faer</title>

@endsection



@section('content')



    <div class="container">

        <div class=" mt-20 mb-20">

            @if(! Auth::check())

        <row class="row right"><a href="/login">Login</a> | <a href="/register">Register</a> | <a href="/auth/facebook">FB</a></row>

                @else

                <row class="row right"><a href="/home">Members Page</a></row>

                @endif

        </div>


        <div class="section">



            <div class="center black-background"><a href="/login"><img src="/imgs/home/logo.png"

                                                                       class="image-scale"
                                                                       alt="Star Faer"></a>
            </div>

            <div class="center">
                <a href="https://www.amazon.com/dp/B084SRGXHM"><img src="/imgs/home/cartha-low-res-cover.jpg" width="200px" class="mt-50" alt="Star Faer: C'artha's Kiss"></a>

                <a href="https://www.amazon.com/dp/B084WTGCP9"><img src="/imgs/home/shadow-low-res-cover.jpg" width="200px" class="mt-50" alt="Star Faer:  Shadow of the Ring"></a>

                <a href="https://www.amazon.com/dp/B084XB8TCZ"><img src="/imgs/home/infinity-low-res-cover.jpg" width="200px" class="mt-50" alt="Star Faer: Inifnity Flower"></a>

            </div>





            <div> <h3  class="center bluish"><a href="https://www.amazon.com/dp/B084SRGXHM">Read Book One Free</a></h3> </div>

            <div><h6 class="center bluish mb-20">Star Faer is a fantasy series</h6></div>

            <div><h6 class="center bluish mb-20">Faer is an old English word that means 'traveling, a journey or expedition'</h6></div>


            <div><a href="https://twitter.com/StarFaerSaga?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @StarFaerSaga</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

            </div>

            <div> <h6  class="center bluish mt-20">Help Us Give Away</h6></div>
            <div> <h6  class="center bluish mt-20  mb-20"><u><a href="https://www.amazon.com/dp/B084SRGXHM">1 Million Free Books</a></u></h6> </div>
            <div><h6 class="center bluish mb-20">Download, Review, and Recommend</h6></div>

            <h1 class="flow-text bluish"><a href="https://teespring.com/stores/star-faer-merch">Star Faer Merch</a></h1>


            <div class="center">

                <a href="https://teespring.com/stores/star-faer-merch" target="_blank"><img src="/imgs/home/blue-t.png" alt="blue t-shirt" width="200"></a>

                <a href="https://teespring.com/stores/star-faer-merch" target="_blank"><img src="/imgs/home/black-t.png" alt="back t-shirt" width="200"></a>

            </div>

            <div><h6 class="center bluish">Logo and Book Covers by <a href="https://www.anacruz-arts.com" target="new">Ana Cruz Cover Art</a></h6></div>





            <div class="center">
                <img src="/imgs/home/me.jpg" height="200px" class="mt-50" alt="Max Vonne">

            </div>


            <div><h4 class="center bluish">Max Vonne</h4></div>


            <div><h1 class="center bluish"># Bonuses</h1></div>
            <div><h5 class="center bluish">Get Free Access to Bonus Material</h5></div>
            <div><h6 class="center bluish">Glossary of World Terms</h6></div>
            <div><h6 class="center bluish">New Release Notifications</h6></div>
            <div><h6 class="center bluish">Live Events</h6></div>
            <div><h6 class="center bluish">Merch and Collectibles</h6></div>
            <div><h6 class="center bluish">Free Access to the Worlds of Star Faer</h6></div>


            <div class="mt-20"> <h4  class="center"><a href="/register"> <u>Join Free Now</u>  </a></h4> </div>

            <div class="mt-50">
                <a class="twitter-timeline"
                   href="https://twitter.com/StarFaerSaga"
                   data-chrome="nofooter noborders"
                   data-width="450"
                   data-height="450"
                   data-tweet-limit="3">
                    Tweets by @TwitterDev
                </a>



            </div>













    </div>



@endsection