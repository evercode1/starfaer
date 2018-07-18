<form class="form form-border mt-25"
      role="form"
      method="POST"
      action="{{ url('/level/'. $level->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- level name input -->

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

        <label class="control-label">Level Name</label>

        <input type="text"
               class="form-control"
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

    <div class="form-group">

        <button type="submit"
                class="btn btn-primary btn-lg">

            Update

        </button>

    </div>

    <!-- end submit button -->

</form>

