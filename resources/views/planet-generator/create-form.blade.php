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

                Generate Planet

            </button>



        </li>

    </ul>





    <!-- end submit button -->

</form>

</div>

