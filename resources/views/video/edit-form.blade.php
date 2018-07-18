<form class="form form-border mt-25"
      role="form"
      method="POST"
      action="{{ url('/video/'. $video->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- title input -->

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

        <label class="control-label">Video Title</label>

        <input type="text"
               class="form-control"
               name="title"
               value="{{ $video->title }}" />

        @if ($errors->has('title'))

            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>

        @endif

    </div>  <!-- end title input -->

    <!-- author input -->

    <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">

        <label class="control-label">Author</label>

        <input type="text"
               class="form-control"
               name="author"
               value="{{ $video->author }}" />

        @if ($errors->has('author'))

            <span class="help-block">
                <strong>{{ $errors->first('author') }}</strong>
            </span>

        @endif

    </div>  <!-- end author input -->




    <!-- category select -->

    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">

        <label class="control-label">Category</label>

        <select class="form-control" id="category_id" name="category_id">

            <option value="{{ $categoryId }}">{{ $categoryName }}</option>

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

    <div class="form-group{{ $errors->has('level_id') ? ' has-error' : '' }}">

        <label class="control-label">Level</label>

        <select class="form-control" id="level_id" name="level_id">

            <option value="{{ $levelId }}">{{ $levelName }}</option>

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

    <!-- description input -->

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

        <label class="control-label">Description</label>

        <textarea class="form-control" rows="5"
                  name="description"
                  >{!! $video->description !!}</textarea>

        @if ($errors->has('description'))

            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>

        @endif

    </div>  <!-- end description input -->

    <!-- url input -->

    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">

        <label class="control-label">Url</label>

        <input type="text"
               class="form-control"
               name="url"
               value="{{ $video->url }}" />

        @if ($errors->has('url'))

            <span class="help-block">
                <strong>{{ $errors->first('url') }}</strong>
            </span>

        @endif

    </div>  <!-- end url input -->

    <!-- embed_code input -->

    <div class="form-group{{ $errors->has('embed_code') ? ' has-error' : '' }}">

        <label class="control-label">Embed Code</label>

        <textarea class="form-control" rows="5"
                  name="embed_code"
                  >{!!  $video->embed_code !!}</textarea>

        @if ($errors->has('embed_code'))

            <span class="help-block">
                <strong>{{ $errors->first('embed_code') }}</strong>
            </span>

        @endif

    </div>  <!-- end embed_code input -->


    <!-- is_featured select -->

    <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }}">

        <label class="control-label">Is Featured?</label>

        <select class="form-control" id="is_featured" name="is_featured">

            <option value="{{ $video->is_featured }}">{{ $video->is_featured == 1 ? 'Yes' : 'No' }}</option>
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

    <div class="form-group">

        <button type="submit"
                class="btn btn-primary btn-lg">

            Update

        </button>

    </div>

    <!-- end submit button -->

</form>

