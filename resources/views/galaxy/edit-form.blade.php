<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/galaxy/'. $galaxy->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $galaxy->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>

        @endif

    </div>

    <!-- end name input -->

    <!-- universe select -->

    <div class="{{ $errors->has('universe_id') ? ' has-error' : '' }}">

        <label>Universe</label>

        <select id="universe_id" name="universe_id">

            <option value="{{ $universeId }}">{{ $universeName }}</option>

            @foreach($universes as $universe)

                <option value={{ $universe->id }}>{{ $universe->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('universe_id'))

            <span class="help-block">

                <strong>{{ $errors->first('universe_id') }}</strong>

            </span>

        @endif

    </div> <!-- end universe select -->

    <!-- is_active select -->

    <div class="{{ $errors->has('is_active') ? ' has-error' : '' }}">

        <label>Is Active?</label>

        <select id="is_active" name="is_active">

            <option value="{{ $galaxy->is_active }}">{{ $galaxy->is_active== 1 ? 'Yes' : 'No' }}</option>
            <option value="0">No</option>
            <option value="1">Yes</option>

        </select>

        @if ($errors->has('is_active'))

            <span class="help-block">

                <strong>{{ $errors->first('is_active') }}</strong>

            </span>

        @endif

    </div>  <!-- end is_active select -->


    <!-- submit button -->

    <div class="row">

        <button type="submit"
                class="waves-effect waves-light btn">

            Update

        </button>

    </div>

    <!-- end submit button -->

</form>

