<h1 class="flow-text grey-text text-darken-1">Create Content</h1>

<form class="form form-border mt-25"
      role="form"
      method="POST"
      action="{{ url('/content/'. $content->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               class="form-control"
               name="name"
               value="{{ $content->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>

        @endif

    </div>  <!-- end name input -->

    <!-- description input -->

    <div class="{{ $errors->has('description') ? ' has-error' : '' }}">

        <label>Description</label>

        <textarea name="description"
                  class="form-control"
                  name="description"
                  rows="5">{!! $content->description !!}</textarea>

        @if ($errors->has('description'))

            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>

        @endif

    </div>  <!-- end description input -->


    <!-- body input -->

    <div class="{{ $errors->has('body') ? ' has-error' : '' }}">

        <label>Body</label>

        <textarea name="body"
                  class="form-control"
                  name="body"
                  rows="20">{!! $content->body !!}</textarea>

        @if ($errors->has('body'))

            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>

        @endif

    </div>  <!-- end body input -->


    <!-- is_active select -->

    <div class="{{ $errors->has('is_active') ? ' has-error' : '' }}">

        <label class="control-label">Is Active?</label>

        <select id="is_active" name="is_active">

            <option value="{{ $content->is_active }}">{{ $content->is_active == 1 ? 'Yes' : 'No' }}</option>
            <option value="0">No</option>
            <option value="1">Yes</option>

        </select>

        @if ($errors->has('is_active'))

            <span class="help-block">

                <strong>{{ $errors->first('is_active') }}</strong>

            </span>

        @endif

    </div>  <!-- end is_active select -->


    <!-- submit button -->

    <div>

        <button type="submit"
                class="waves-effect waves-light btn">

            Update

        </button>

    </div>

    <!-- end submit button -->

</form>

