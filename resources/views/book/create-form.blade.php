<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/book') }}"
      enctype="multipart/form-data">

{{ csrf_field() }}

    <!-- title input -->

    <div class="{{ $errors->has('title') ? 'has-error' : '' }}">

        <label>Book Title</label>

        <input type="text"
               name="title"
               value="{{ old('title') }}" />

        @if ($errors->has('title'))

            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>

        @endif

    </div>  <!-- end title input -->

    <!-- subtitle input -->

    <div class="{{ $errors->has('subtitle') ? 'has-error' : '' }}">

        <label>Book Subtitle</label>

        <input type="text"
               name="subtitle"
               value="{{ old('subtitle') }}" />

        @if ($errors->has('subtitle'))

            <span class="help-block">
                <strong>{{ $errors->first('subtitle') }}</strong>
            </span>

        @endif

    </div>  <!-- end subtitle input -->

    <!-- weight input -->

    <div class="{{ $errors->has('weight') ? 'has-error' : '' }}">

        <label>Weight</label>

        <input type="text"
               name="weight"
               value="{{ old('weight') }}" />

        @if ($errors->has('weight'))

            <span class="help-block">
                <strong>{{ $errors->first('weight') }}</strong>
            </span>

        @endif

    </div>  <!-- end weight input -->


    <!-- author input -->

    <div class="{{ $errors->has('author') ? 'has-error' : '' }}">

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


    <!-- url input -->

    <div class="{{ $errors->has('url') ? 'has-error' : '' }}">

        <label>Url</label>

        <input type="text"
               name="url"
               value="{{ old('url') }}" />

        @if ($errors->has('url'))

            <span class="help-block">
                <strong>{{ $errors->first('url') }}</strong>
            </span>

        @endif

    </div>  <!-- url author input -->

    <!-- is_active select -->

    <div class="{{ $errors->has('is_active') ? 'has-error' : '' }}">

        <label>Is Active?</label>

        <select id="is_active" name="is_active">

            <option value="0">No</option>
            <option value="1">Yes</option>

        </select>

        @if ($errors->has('is_active'))

            <span class="help-block">

                <strong>{{ $errors->first('is_active') }}</strong>

            </span>

        @endif

    </div>  <!-- end is_active select -->


    <!-- is_featured select -->

    <div class="{{ $errors->has('is_featured') ? 'has-error' : '' }}">

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

    </div>  <!-- end is_featured select -->


    <!-- datepicker -->

    <div class="{{ $errors->has('published_at') ? 'has-error' : '' }}">

    <div class="row">

        <label>Date Published</label>

    </div>

        <div class="row">

            <input type="text"  class="datepicker" id="published_at" name="published_at">

            @if ($errors->has('published_at'))

                <span class="help-block">

                <strong>{{ $errors->first('published_at') }}</strong>

            </span>

            @endif

        </div>

    </div>

    <!-- end datepicker -->

    <!-- image file Form Input -->

    <div class="row mt-20">

    <div class="{{ $errors->has('image') ? 'has-error' : '' }}">

        <div class="row">
            <label>Book Image</label>

            </div>

        <div class="row">

            <input type="file" name="image" id="image">
        </div>

        @if ($errors->has('image'))

            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
                </span>

        @endif

    </div>

    </div>
    <!-- end file input -->


    <!-- submit button -->

    <div class="row">

        <button type="submit"
                class="waves-effect waves-light btn">

            Create

        </button>

    </div>  <!-- end submit button -->


</form>
