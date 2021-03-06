<!-- begin generate moons -->

<div class="row">

<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/moon-generator') }}">

{{ csrf_field() }}

              <input type="hidden" id="seed" name="seed" value="seed">

    <!-- limit input -->

    <div class="{{ $errors->has('limit') ? ' has-error' : '' }}">

        <label>Limit</label>

        <input type="text"
               name="limit"
               value="{{ old('limit') }}" />

        @if ($errors->has('limit'))

            <span class="help-block">

                    <strong>{{ $errors->first('limit') }}</strong>

                </span>

        @endif

    </div>

    <!-- end limit input -->


    <!-- submit button -->

    <ul class="collection">
        <li class="collection-item"><p>

                This button populates the database with data from the moon-seed seed file.
                Old data is truncated if you run this command.  Suggested 60,000 limit.


            </p></li>
        <li class="collection-item">

            <button type="submit" class="waves-effect waves-light btn">

                Generate Moons

            </button>



        </li>

    </ul>





    <!-- end submit button -->

</form>

</div>

<!-- end generate moons -->

<!-- start fix planet moon type -->

<div class="row">

    <form class="mt-20"
          role="form"
          method="POST"
          action="{{ url('/fix-planet-moon-types') }}">

        {{ csrf_field() }}

        <input type="hidden" id="fix" name="fix" value="fix">

        <!-- remove_limit input -->

        <div class="{{ $errors->has('remove_limit') ? ' has-error' : '' }}">

            <label>Remove Limit</label>

            <input type="number"
                   name="remove_limit"
                   value="{{ old('remove_limit') }}" />

            @if ($errors->has('remove_limit'))

                <span class="help-block">

                    <strong>{{ $errors->first('remove_limit') }}</strong>

                </span>

            @endif

        </div>

        <!-- end remove_limit input -->

        <!-- remove_offset input -->

        <div class="{{ $errors->has('remove_offset') ? ' has-error' : '' }}">

            <label>Remove Offset</label>

            <input type="number"
                   name="remove_offset"
                   value="{{ old('remove_offset') }}" />

            @if ($errors->has('remove_offset'))

                <span class="help-block">

                    <strong>{{ $errors->first('remove_offset') }}</strong>

                </span>

            @endif

        </div>

        <!-- end remove_offset input -->


        <!-- submit button -->

        <ul class="collection">
            <li class="collection-item"><p>

                    This button removes moons from planets that should not have moons.  Suggested limit 5000.


                </p></li>
            <li class="collection-item">

                <button type="submit" class="waves-effect waves-light btn">

                    Fix Planet Moon Types

                </button>



            </li>

        </ul>

        <!-- end submit button -->

    </form>

</div>

<!-- end fix planet moon type -->

<!-- start add orphan moons -->

<div class="row">

    <form class="mt-20"
          role="form"
          method="POST"
          action="{{ url('/add-orphan-moons') }}">

        {{ csrf_field() }}

        <input type="hidden" id="fix" name="fix" value="fix">

        <!-- add_limit input -->

        <div class="{{ $errors->has('add_limit') ? ' has-error' : '' }}">

            <label>Add Limit</label>

            <input type="text"
                   name="add_limit"
                   value="{{ old('add_limit') }}" />

            @if ($errors->has('add_limit'))

                <span class="help-block">

                    <strong>{{ $errors->first('add_limit') }}</strong>

                </span>

            @endif

        </div>

        <!-- end limit input -->


        <!-- submit button -->

        <ul class="collection">
            <li class="collection-item"><p>

                    This button creates more moons with a planet Id of 0.  You should follow up this process by adding
                    leftover moons to proper planet types.  Suggested 30,000 limit.


                </p></li>
            <li class="collection-item">

                <button type="submit" class="waves-effect waves-light btn">

                    Add Orphan Moons

                </button>



            </li>

        </ul>

        <!-- end submit button -->

    </form>

</div>

<!-- end add orphan moons  -->

<!-- start fix planet moon leftovers -->

<div class="row">

    <form class="mt-20"
          role="form"
          method="POST"
          action="{{ url('/fix-planet-moon-leftovers') }}">

        {{ csrf_field() }}

        <input type="hidden" id="fix" name="fix" value="fix">

        <!-- leftover_limit input -->

        <div class="{{ $errors->has('leftover_limit') ? ' has-error' : '' }}">

            <label>Leftover Limit</label>

            <input type="number"
                   name="leftover_limit"
                   value="{{ old('leftover_limit') }}" />

            @if ($errors->has('leftover_limit'))

                <span class="help-block">

                    <strong>{{ $errors->first('leftover_limit') }}</strong>

                </span>

            @endif

        </div>

        <!-- end leftover_limit input -->

        <!-- leftover_offset input -->

        <div class="{{ $errors->has('leftover_offset') ? ' has-error' : '' }}">

            <label>Leftover Offset</label>

            <input type="number"
                   name="leftover_offset"
                   value="{{ old('leftover_offset') }}" />

            @if ($errors->has('leftover_offset'))

                <span class="help-block">

                    <strong>{{ $errors->first('leftover_offset') }}</strong>

                </span>

            @endif

        </div>

        <!-- end leftover_offset input -->


        <!-- submit button -->

        <ul class="collection">
            <li class="collection-item"><p>

                    This button takes moons with a planet id of 0 and adds them to planets that should have more moons.
                    suggested limit is 5000.


                </p></li>
            <li class="collection-item">

                <button type="submit" class="waves-effect waves-light btn">

                    Add Leftover Moons To Proper Planet Types

                </button>



            </li>

        </ul>

        <!-- end submit button -->

    </form>

</div>

<!-- end fix planet moon leftovers -->



<!-- start fix planet moon count -->

<div class="row">

    <form class="mt-20"
          role="form"
          method="POST"
          action="{{ url('/fix-planet-moon-count') }}">

        {{ csrf_field() }}

        <input type="hidden" id="fix" name="fix" value="fix">

        <!-- count_limit input -->

        <div class="{{ $errors->has('count_limit') ? ' has-error' : '' }}">

            <label>Count Limit</label>

            <input type="number"
                   name="count_limit"
                   value="{{ old('count_limit') }}" />

            @if ($errors->has('count_limit'))

                <span class="help-block">

                    <strong>{{ $errors->first('count_limit') }}</strong>

                </span>

            @endif

        </div>

        <!-- end count_limit input -->

        <!-- count_offset input -->

        <div class="{{ $errors->has('count_offset') ? ' has-error' : '' }}">

            <label>Count Offset</label>

            <input type="number"
                   name="count_offset"
                   value="{{ old('count_offset') }}" />

            @if ($errors->has('count_offset'))

                <span class="help-block">

                    <strong>{{ $errors->first('count_offset') }}</strong>

                </span>

            @endif

        </div>

        <!-- end count_offset input -->


        <!-- submit button -->

        <ul class="collection">
            <li class="collection-item"><p>

                    This button corrects each planet's count of moons.  Suggested limit is 2000, need to iterate 7 times.


                </p></li>
            <li class="collection-item">

                <button type="submit" class="waves-effect waves-light btn">

                    Fix Planet Moon Count

                </button>



            </li>

        </ul>

        <!-- end submit button -->

    </form>

</div>

<!-- end fix planet moon count -->

<!-- start fix moons orbital position -->

<div class="row">

    <form class="mt-20"
          role="form"
          method="POST"
          action="{{ url('/fix-moons-orbital-position') }}">

        {{ csrf_field() }}

        <input type="hidden" id="fix" name="fix" value="fix">



        <!-- submit button -->

        <ul class="collection">
            <li class="collection-item"><p>

                    This button corrects each moon's orbital position.  Runs as a job in the qeue.


                </p></li>
            <li class="collection-item">

                <button type="submit" class="waves-effect waves-light btn">

                    Fix Moons Orbital Position

                </button>



            </li>

        </ul>

        <!-- end submit button -->

    </form>

</div>

<!-- end fix moons orbital position -->

<!-- start fix moons description  -->

<div class="row">

    <form class="mt-20"
          role="form"
          method="POST"
          action="{{ url('/fix-moons-description') }}">

        {{ csrf_field() }}

        <input type="hidden" id="fix" name="fix" value="fix">

        <!-- moon_limit input -->

        <div class="{{ $errors->has('moon_limit') ? ' has-error' : '' }}">

            <label>Moon Limit</label>

            <input type="text"
                   name="moon_limit"
                   value="{{ old('moon_limit') }}" />

            @if ($errors->has('moon_limit'))

                <span class="help-block">

                    <strong>{{ $errors->first('moon_limit') }}</strong>

                </span>

            @endif

        </div>

        <!-- end moon_limit input -->

        <!-- moon_offset input -->

        <div class="{{ $errors->has('moon_offset') ? ' has-error' : '' }}">

            <label>Moon Offset</label>

            <input type="text"
                   name="moon_offset"
                   value="{{ old('moon_offset') }}" />

            @if ($errors->has('moon_offset'))

                <span class="help-block">

                    <strong>{{ $errors->first('moon_offset') }}</strong>

                </span>

            @endif

        </div>

        <!-- end moon_offset input -->


        <!-- submit button -->

        <ul class="collection">
            <li class="collection-item"><p>

                    This button fixes each moon's description.  20,000 max limit suggested.


                </p></li>
            <li class="collection-item">

                <button type="submit" class="waves-effect waves-light btn">

                    Fix Moon Description

                </button>



            </li>

        </ul>

        <!-- end submit button -->

    </form>

</div>

<!-- end fix moons description  -->



