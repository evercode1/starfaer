@component('mail::message')

# Alert

Star Faer has a new article titled "{{ $post->title }}" posted!

@component('mail::button', ['url' => 'https://www.starfaer.com/post/' . $post->id . '-' . $post->slug])
Go to Article
@endcomponent

If the button does not appear above, you may use the following url:

<a href="https://www.starfaer.com/post/{{ $post->id  }}-{{ $post->slug }}">
    https://www.starfaer.com/post/{{ $post->id  }}-{{ $post->slug }}</a>

@component('mail::panel', ['url' => ''])
You are receiving this email because you subscribed to StarFaer.com.
You may Unsubscribe by clicking <a href="https://www.starfaer.com/unsubscribe">here</a>.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
