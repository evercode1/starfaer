<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/level/'. $level->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- level name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Level Name</label>

        <input type="text"
               name="name"
               value="{{ $level->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>

        @endif

    </div>

    <!-- end level  name input -->


    <!-- submit button -->

    <div class="row">

        <button type="submit"
                class="waves-effect waves-light btn">

            Update

        </button>

    </div>

    <!-- end submit button -->

</form>

