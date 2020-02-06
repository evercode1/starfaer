@component('mail::message')
# Registration Confirmation

## Congratulations!

You have joined the Star Faer email list and now have access to the following:

* updates on New Releases
* updates on Star Faer Site Features
* updates on Star Faer Merch and Collectibles
* updates on Star Faer News
* updates on Star Faer Live Events and Meet Ups


@component('mail::button', ['url' => 'https://www.starfaer.com'])
Visit Now
@endcomponent

Thanks,<br>
Max Vonne - {{ config('app.name') }}

@component('mail::panel', ['url' => ''])
You are receiving this email because you subscribed to Star Faer.
You may Unsubscribe by clicking <a href="https://www.starfaer.com/unsubscribe">here</a>.
@endcomponent

@endcomponent


