<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/post') }}">

{{ csrf_field() }}

<!-- post title input -->

    <div class="{{ $errors->has('title') ? ' has-error' : '' }}">

        <label>Post Title</label>

        <input type="text"
               name="title"
               value="{{ old('title') }}" />

        @if ($errors->has('title'))

            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>

        @endif

    </div>

    <!-- end post title input -->

    <!-- category select -->

    <div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">

        <label>Category</label>

        <select id="category_id" name="category_id">

            <option value="">Please Choose One</option>

            @foreach($categories as $category)

            <option value={{ $category->id }}>{{ $category->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('category_id'))

            <span class="help-block">

                <strong>{{ $errors->first('category_id') }}</strong>

            </span>

        @endif

    </div> <!-- end category select -->


    <!-- is_published select -->

    <div class="{{ $errors->has('is_published') ? ' has-error' : '' }}">

        <label>Status</label>

        <select id="is_published" name="is_published">

            <option value="1">Publish</option>
            <option value="0">Save As Draft</option>

        </select>

        @if ($errors->has('is_published'))

            <span class="help-block">

                <strong>{{ $errors->first('is_published') }}</strong>

            </span>

        @endif

    </div> <!-- end is_published select -->


    <!-- post body input -->

    <div class="{{ $errors->has('body') ? ' has-error' : '' }}">

        <label>Post Body</label>

        <textarea name="body"></textarea>


        @if ($errors->has('body'))

            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>

        @endif

    </div>

    <!-- end post body input -->

    <!-- submit button -->

    <div class="row">

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