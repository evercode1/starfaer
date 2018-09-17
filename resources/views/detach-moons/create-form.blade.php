<!-- begin detach moons -->

<div class="row">

<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/detach-moons') }}">

{{ csrf_field() }}


    <!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Planet Name</label>

        <input type="text"
               name="name"
               value="{{ old('name') }}" />

        @if ($errors->has('name'))

            <span class="help-block">

                    <strong>{{ $errors->first('name') }}</strong>

                </span>

        @endif

    </div>

    <!-- end name input -->

    <!-- moon_name input -->

    <div class="{{ $errors->has('moon_name') ? ' has-error' : '' }}">

        <label>Moon Name (leave blank to detach all moons)</label>

        <input type="text"
               name="moon_name"
               value="{{ old('moon_name') }}" />

        @if ($errors->has('moon_name'))

            <span class="help-block">

                    <strong>{{ $errors->first('moon_name') }}</strong>

                </span>

        @endif

    </div>

    <!-- end moon_name input -->


    <!-- submit button -->

    <ul class="collection">
        <li class="collection-item"><p>

                Strips all moons off of designated planet or just one if you enter the moon name.
                It also corrects the moon count for the planet and reassigns the moons to appropriate planets.

            </p></li>
        <li class="collection-item">

            <button type="submit" class="waves-effect waves-light btn">

                Detach Moons

            </button>



        </li>

    </ul>





    <!-- end submit button -->

</form>

</div>

<!-- end generate moons -->







