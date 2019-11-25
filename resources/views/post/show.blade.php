@extends('layouts.masters.master-auth')

@section('meta')

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.starfaer.com/post/{{$post->id}}-{{ $post->slug }}" />
    <meta name="twitter:title" content="{{ $post->title }}" />
    <meta name="twitter:description" content="{{ \App\Utilities\Summarize::summaryWithoutTags($post->body) }}" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />

    <meta name="description" content="{{ $post->title }}">
    <meta name="keywords" content="{{ $post->title }}">
    <meta name="author" content="{{ $post->user->name }}">
    <title>{{ $post->title }}</title>

    @endsection

@section('content')


    <div class="container">

        <h1 class="flow-text grey-text text-darken-1">{{ $post->title }}</h1>

        <div class="row">

            <p class="grey-text text-lighten-1">{{ $post->published_at }} by Max Vonne</p>

            <div class="card-panel">

              <p class="grey-text text-darken-3">{!! $post->body !!}</p>

            </div><!-- end card-panel -->

            <div class="comments row mt-50">

                <div id="disqus_thread"></div>

            </div>

        </div> <!-- end row -->



    </div> <!-- end container -->



@endsection

@section('scripts')

    <script id="dsq-count-scr" src="//star-faer.disqus.com/count.js" async></script>

    <script>

        var disqus_config = function () {
            this.page.url = 'https://www.starfaer.com/post/{{ $post->id }}';  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = '{{ $post->id }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://star-faer.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();

    </script>

    @endsection