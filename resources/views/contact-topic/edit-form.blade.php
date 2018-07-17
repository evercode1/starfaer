<form class="mt-25"
      role="form"
      method="POST"
      action="{{ url('/contact-topic/'. $contactTopic->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- name input -->

    <div class=" {{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Category Name</label>

        <input type="text"
               class="form-control"
               name="name"
               value="{{ $contactTopic->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>

        @endif

    </div>

    <!-- end name input -->


    <!-- submit button -->

    <div class="row">

        <button type="submit"
                class="btn waves-effect waves-light">

            Update

        </button>

    </div>

    <!-- end submit button -->

</form>

