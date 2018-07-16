

    <h1 class="flow-text grey-text text-darken-1">Create Content</h1>





<form class="form mt-25"
      role="form"
      method="POST"
      action="{{ url('/content') }}">

{{ csrf_field() }}

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label class="control-label">Name</label>

        <input type="text"
               class="form-control"
               name="name"
               value="{{ old('name') }}" />

        @if ($errors->has('name'))

            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>

        @endif

    </div>  <!-- end name input -->

    <!-- description input -->

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

        <label class="control-label">description</label>

        <textarea name="description"
                  class="form-control"
                  rows="5"
                  value="{{ old('description') }}"></textarea>


        @if ($errors->has('description'))

            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>

        @endif

    </div>  <!-- end description input -->


    <!-- body input -->

    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

        <label class="control-label">Body</label>

        <textarea name="body"
                  class="form-control"
                  rows="20"
                  value="{{ old('body') }}"></textarea>


        @if ($errors->has('body'))

            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>

        @endif

    </div>  <!-- end body input -->



    <!-- is_active select -->

    <div class="mt-20 form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">

        <label class="control-label">Is Active?</label>

        <select class="form-control" id="is_active" name="is_active">

            <option value="1">Yes</option>
            <option value="0">No</option>


        </select>

        @if ($errors->has('is_active'))

            <span class="help-block">

                <strong>{{ $errors->first('is_active') }}</strong>

            </span>

        @endif

    </div>  <!-- end is_active select -->


    <!-- submit button -->

    <div class="mt-20">

        <button type="submit"
                class="waves-effect waves-light btn">

            Create

        </button>

    </div>  <!-- end submit button -->


</form>

