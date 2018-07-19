@extends('layouts.master-guest-auth')

@section('meta')

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="https://www.coinseer.com/posts-by-category/{{ $category }}" />
    <meta name="twitter:title" content="All Articles By Category" />
    <meta name="twitter:description" content="Complete list of CoinSeer Articles By Category" />
    <meta name="twitter:image" content="{{ config('twitter-cards.thumbnail.url') }}" />

    <meta name="description" content="{{ $category }} Articles">
    <meta name="keywords" content="{{ $category }}">
    <meta name="author" content="CoinSeer">
    <title>Articles by Category</title>

@endsection


@section('content')



    <div class="col-sm-8 blog-main">


        <div class="container">

            <div class="col-md-8 mt-25">

                <h2 class="blog-post-title">{{ $category }}</h2>

                    <p class="blog-post-meta">a list of articles in the {{ $category }} category</p>





                <br/>

                @foreach($posts as $post)

                    <div class="blog-post">

                        <a href="/post/{{ $post->id }}"><h1 class="post-title">{{ $post->title }}</h1></a>

                        <p class="blog-post-meta">{{ $post->published_at }} by <a href="#">{{ $post->user->name }}</a></p>

                        {!! $post->body !!}


                        <a href="/post/{{ $post->id }}-{{ $post->slug }}#disqus_thread">

                            <button class="btn btn-primary">

                                Show Comments

                            </button>

                        </a>

                    </div><!-- end blog-post -->

                @endforeach

                @include('layouts.blog-partials.pagination')

            </div> <!-- end column -->

        </div><!--  end blog-main -->



    </div> <!-- end container -->



@endsection

@section('scripts')

    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <script src="/js/format_brackets.js"></script>
@endsection