<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/video') }}">

{{ csrf_field() }}

<!-- title input -->

    <div class="{{ $errors->has('title') ? ' has-error' : '' }}">

        <label>Title</label>

        <input type="text"
               name="title"
               value="{{ old('title') }}" />

        @if ($errors->has('title'))

            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>

        @endif

    </div>  <!-- end title input -->

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

    <!-- level select -->

    <div class="{{ $errors->has('level_id') ? ' has-error' : '' }}">

        <label>Level</label>

        <select id="level_id" name="level_id">

            <option value="">Please Choose One</option>

            @foreach($levels as $level)

                <option value={{ $level->id }}>{{ $level->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('level_id'))

            <span class="help-block">

                <strong>{{ $errors->first('level_id') }}</strong>

            </span>

        @endif

    </div> <!-- end level select -->

    <!-- author input -->

    <div class="{{ $errors->has('author') ? ' has-error' : '' }}">

        <label>Author</label>

        <input type="text"
               name="author"
               value="{{ old('author') }}" />

        @if ($errors->has('author'))

            <span class="help-block">
                <strong>{{ $errors->first('author') }}</strong>
            </span>

        @endif

    </div>  <!-- end author input -->

    <!-- description input -->

    <div class="{{ $errors->has('description') ? ' has-error' : '' }}">

        <label class="control-label">Description</label>

        <textarea
                  rows="5"
                  name="description"
                  >{{ old('description') }}</textarea>

        @if ($errors->has('description'))

            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>

        @endif

    </div>  <!-- end description input -->


    <!-- url input -->

    <div class="{{ $errors->has('url') ? ' has-error' : '' }}">

        <label>Url</label>

        <input type="text"
               name="url"
               value="{{ old('url') }}" />

        @if ($errors->has('url'))

            <span class="help-block">
                <strong>{{ $errors->first('url') }}</strong>
            </span>

        @endif

    </div>  <!-- end url input -->

    <!-- embed_code input -->

    <div class="{{ $errors->has('embed_code') ? ' has-error' : '' }}">

        <label>Embed Code</label>

        <textarea
                  rows="5"
                  name="embed_code"
                  >{{ old('embed_code') }}</textarea>

        @if ($errors->has('embed_code'))

            <span class="help-block">
                <strong>{{ $errors->first('embed_code') }}</strong>
            </span>

        @endif

    </div>  <!-- end embed_code input -->



    <!-- is_featured select -->

    <div class="{{ $errors->has('is_featured') ? ' has-error' : '' }}">

        <label>Is Featured?</label>

        <select id="is_featured" name="is_featured">

            <option value="0">No</option>
            <option value="1">Yes</option>

        </select>

        @if ($errors->has('is_featured'))

            <span class="help-block">

                <strong>{{ $errors->first('is_featured') }}</strong>

            </span>

        @endif

    </div>  <!-- end is featured select -->


    <!-- submit button -->

    <div class="row">

        <button type="submit"
                class="waves-effect waves-light btn">

            Create

        </button>

    </div>  <!-- end submit button -->


</form>

