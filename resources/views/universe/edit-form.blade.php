<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/universe/'. $universe->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $level->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>

        @endif

    </div>

    <!-- end name input -->

    <!-- author input -->

    <div class="{{ $errors->has('author') ? ' has-error' : '' }}">

        <label>Author</label>

        <input type="text"
               name="author"
               value="{{ $universe->author }}" />

        @if ($errors->has('author'))

            <span class="help-block">
                <strong>{{ $errors->first('author') }}</strong>
            </span>

        @endif

    </div>

    <!-- end author input -->


    <!-- submit button -->

    <div class="row">

        <button type="submit"
                class="waves-effect waves-light btn">

            Update

        </button>

    </div>

    <!-- end submit button -->

</form>
