@extends('layouts.master-guest-auth')

@section('content')
<div>
    <div>
        <div>
            <div>
                <div>Dashboard</div>

                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
