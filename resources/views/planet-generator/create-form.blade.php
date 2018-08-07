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

