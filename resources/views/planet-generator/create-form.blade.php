<div class="row">

<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/planet-generator') }}">

{{ csrf_field() }}

              <input type="hidden" id="seed" name="seed" value="seed">

    <!-- filename input -->

    <div class="{{ $errors->has('filename') ? ' has-error' : '' }}">

        <label>File Name</label>

        <input type="text"
               name="filename"
               value="{{ old('filename') }}" />

        @if ($errors->has('filename'))

            <span class="help-block">

                    <strong>{{ $errors->first('filename') }}</strong>

                </span>

        @endif

    </div>

    <!-- end filename input -->


    <!-- submit button -->

    <ul class="collection">
        <li class="collection-item"><p>

                This button populates the database with data from the planet-seed seed file.
                Old data is truncated if you run this command.


            </p></li>
        <li class="collection-item">

            <button type="submit" class="waves-effect waves-light btn">

                Generate Planets

            </button>



        </li>

    </ul>





    <!-- end submit button -->

</form>

</div>

<!-- start fix star planet count -->

<div class="row">

    <form class="mt-20"
          role="form"
          method="POST"
          action="{{ url('/fix-star-planet-count') }}">

        {{ csrf_field() }}

        <input type="hidden" id="fix" name="fix" value="fix">


        <!-- submit button -->

        <ul class="collection">
            <li class="collection-item"><p>

                    This button corrects each star's count of planets


                </p></li>
            <li class="collection-item">

                <button type="submit" class="waves-effect waves-light btn">

                    Fix Star Planet Count

                </button>



            </li>

        </ul>

        <!-- end submit button -->

    </form>

</div>

<!-- end fix star planet count -->

<!-- start fix planet position -->

<div class="row">

    <form class="mt-20"
          role="form"
          method="POST"
          action="{{ url('/planet-position-fixer') }}">

        {{ csrf_field() }}

        <input type="hidden" id="fix" name="fix" value="fix">




        <!-- submit button -->

        <ul class="collection">
            <li class="collection-item"><p>

                    This button corrects the planets positions within the star system


                </p></li>
            <li class="collection-item">

                <button type="submit" class="waves-effect waves-light btn">

                    Fix Planet Positions

                </button>



            </li>

        </ul>

        <!-- end submit button -->

    </form>

</div>

<!-- end fix planet position -->

<!-- start fix planet type -->

<div class="row">

    <form class="mt-20"
          role="form"
          method="POST"
          action="{{ url('/planet-type-fixer') }}">

        {{ csrf_field() }}

        <input type="hidden" id="fix" name="fix" value="fix">

        <!-- planet_type_id select -->

        <div class="{{ $errors->has('planet_type_id') ? ' has-error' : '' }}">

            <label>Planet Type</label>

            <select id="planet_type_id" name="planet_type_id">

                <option value="">Please Choose One</option>

                @foreach($planetTypes as $planetType)

                    <option value={{ $planetType->id }}>{{ $planetType->name }}</option>

                @endforeach

            </select>

            @if ($errors->has('planet_type_id'))

                <span class="help-block">

                    <strong>{{ $errors->first('planet_type_id') }}</strong>

                </span>

            @endif

        </div>

        <!-- end planet_type_id select -->

        <!-- less_or_greater_than select -->

        <div class="{{ $errors->has('less_or_greater_than') ? ' has-error' : '' }}">

            <label>Less or Greater Than?</label>

            <select id="less_or_greater_than" name="less_or_greater_than">

                <option value="0">Less Than</option>
                <option value="1">Greater Than</option>

            </select>

            @if ($errors->has('less_or_greater_than'))

                <span class="help-block">

                    <strong>{{ $errors->first('less_or_greater_than') }}</strong>

                </span>

            @endif

        </div>

        <!-- end less_or_greater_than select -->

        <!-- position -->

        <div class="{{ $errors->has('position') ? ' has-error' : '' }}">

            <label>Position</label>

            <input type="number"
                   name="position"
                   value="{{ old('position') }}" />

            @if ($errors->has('position'))

                <span class="help-block">

                    <strong>{{ $errors->first('position') }}</strong>

                </span>

            @endif

        </div>

        <!-- end position input -->

        <!-- change_planet_type_id select -->

        <div class="{{ $errors->has('change_planet_type_id') ? ' has-error' : '' }}">

            <label>Change To Planet Type</label>

            <select id="change_planet_type_id" name="change_planet_type_id">

                <option value="">Please Choose One</option>

                @foreach($planetTypes as $planetType)

                    <option value={{ $planetType->id }}>{{ $planetType->name }}</option>

                @endforeach

            </select>

            @if ($errors->has('change_planet_type_id'))

                <span class="help-block">

                    <strong>{{ $errors->first('change_planet_type_id') }}</strong>

                </span>

            @endif

        </div>

        <!-- end planet_type_id select -->




        <!-- submit button -->

        <ul class="collection">
            <li class="collection-item"><p>

                    This button corrects the planets type according to your input


                </p></li>
            <li class="collection-item">

                <button type="submit" class="waves-effect waves-light btn">

                    Fix Planet Types

                </button>



            </li>

        </ul>

        <!-- end submit button -->

    </form>

</div>

<!-- end fix planet Type -->

<!-- start fix planet description -->

<div class="row">

    <form class="mt-20"
          role="form"
          method="POST"
          action="{{ url('/planet-description-fixer') }}">

        {{ csrf_field() }}

        <input type="hidden" id="fix" name="fix" value="fix">




        <!-- submit button -->

        <ul class="collection">
            <li class="collection-item"><p>

                    This button corrects the planets descriptions


                </p></li>
            <li class="collection-item">

                <button type="submit" class="waves-effect waves-light btn">

                    Fix Planet Descriptions

                </button>



            </li>

        </ul>

        <!-- end submit button -->

    </form>

</div>

<!-- end fix planet descriptions -->

