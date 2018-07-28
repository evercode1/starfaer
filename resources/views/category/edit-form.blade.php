<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/category/'. $category->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- category name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Category Name</label>

        <input type="text"
               name="name"
               value="{{ $category->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>

        @endif

    </div>

    <!-- end category  name input -->


    <!-- submit button -->

    <div class="row">

        <button type="submit"
                class="waves-effect waves-light btn">

            Update

        </button>

    </div>

    <!-- end submit button -->

</form>
