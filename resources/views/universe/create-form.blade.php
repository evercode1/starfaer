<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/universe') }}">

{{ csrf_field() }}

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label class="control-label">Universe Name</label>

        <input type="text"
               name="name"
               value="{{ old('name') }}" />

        @if ($errors->has('name'))

            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>

        @endif

    </div>

    <!-- end  name input -->

    <!--  author input -->

    <div class="{{ $errors->has('author ') ? ' has-error' : '' }}">

        <label class="control-label">Author</label>

        <input type="text"
               name="author"
               value="{{ old('author') }}" />

        @if ($errors->has('author'))

            <span class="help-block">
                <strong>{{ $errors->first('author') }}</strong>
            </span>

        @endif

    </div>

    <!-- end author input -->

    <!-- body input -->

    <div class="{{ $errors->has('body') ? ' has-error' : '' }}">

        <label>Description</label>

        <textarea name="body"></textarea>


        @if ($errors->has('body'))

            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>

        @endif

    </div>

    <!-- end body input -->


    <!-- submit button -->

    <div class="row mt-20">

        <button type="submit"
                class="waves-effect waves-light btn">

            Create

        </button>

    </div>

    <!-- end submit button -->

</form>

@section('scripts')

    <script>
        CKEDITOR.replace( 'body' );
    </script>

@endsection

