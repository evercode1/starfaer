<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/seed-group') }}">

{{ csrf_field() }}

<!-- group_title -->

    <div class="{{ $errors->has('group_title') ? ' has-error' : '' }}">

        <label>Group Title</label>

        <input type="text"
               name="group_title"
               value="{{ old('group_title') }}" />

        @if ($errors->has('group_title'))

            <span class="help-block">

                        <strong>{{ $errors->first('group_title') }}</strong>

                 </span>

        @endif

    </div>

    <!-- end group_title input -->

<!-- config_name -->

    <div class="{{ $errors->has('config_name') ? ' has-error' : '' }}">

        <label>Config Name</label>

        <select id="config_name" name="config_name">

            <option value="">Please Choose One</option>
            <option value="consonants">consonants</option>
            <option value="vowels">vowels</option>




        </select>

        @if ($errors->has('config_name'))

            <span class="help-block">

                    <strong>{{ $errors->first('config_name') }}</strong>

                </span>

        @endif

    </div>

    <!-- end config_name select -->

    <!-- trim -->

    <div class="{{ $errors->has('trim') ? ' has-error' : '' }}">

        <label>Trim</label>

        <select id="trim" name="trim">

            <option value="">Please Choose One</option>
            <option value="yes">yes</option>
            <option value="no">no</option>




        </select>

        @if ($errors->has('trim'))

            <span class="help-block">

                    <strong>{{ $errors->first('trim') }}</strong>

                </span>

        @endif

    </div>

    <!-- end config_name select -->

    <!-- syllables input -->

    <div class="{{ $errors->has('syllables') ? ' has-error' : '' }}">

        <label>syllables</label>

        <textarea name="syllables"></textarea>

        @if ($errors->has('syllables'))

            <span class="help-block">
                <strong>{{ $errors->first('syllables') }}</strong>
            </span>

        @endif

    </div>

    <!-- end syllables input -->

    <!-- submit button -->

    <div class="row mt-50">

        <button type="submit"
                class="waves-effect waves-light btn">

            Create Seed Group

        </button>

    </div>

    <!-- end submit button -->

</form>



