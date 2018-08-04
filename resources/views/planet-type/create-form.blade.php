<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/planet-type') }}"
      enctype="multipart/form-data">

{{ csrf_field() }}

    <!-- name input -->

        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

            <label>PlanetType Name</label>

            <input type="text"
                   name="name"
                   value="{{ old('name') }}" />

            @if ($errors->has('name'))

                <span class="help-block">

                    <strong>{{ $errors->first('name') }}</strong>

                </span>

            @endif

        </div>

    <!-- end name input -->

    <!-- universe select -->

        <div class="{{ $errors->has('universe_id') ? ' has-error' : '' }}">

            <label>Universe</label>

            <select id="universe_id" name="universe_id">

                <option value="">Please Choose One</option>

                @foreach($universes as $universe)

                    <option value={{ $universe->id }}>{{ $universe->name }}</option>

                @endforeach

            </select>

            @if ($errors->has('universe_id'))

                <span class="help-block">

                    <strong>{{ $errors->first('universe_id') }}</strong>

                </span>

            @endif

        </div>

    <!-- end universe select -->

    <!-- galaxy select -->

    <div class="{{ $errors->has('galaxy_id') ? ' has-error' : '' }}">

        <label>galaxy </label>

        <select id="galaxy_id" name="galaxy_id">

            <option value="">Please Choose One</option>

            @foreach($galaxies  as $galaxy )

                <option value={{ $galaxy->id }}>{{ $galaxy->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('galaxy_id'))

            <span class="help-block">

                    <strong>{{ $errors->first('galaxy_id') }}</strong>

                </span>

        @endif

    </div>

    <!-- end galaxy select -->

    <!-- is_active select -->

        <div class="{{ $errors->has('is_active') ? ' has-error' : '' }}">

            <label>Is Active?</label>

            <select id="is_active" name="is_active">

                <option value="1">Active</option>
                <option value="0">Inactive</option>

            </select>

            @if ($errors->has('is_active'))

                <span class="help-block">

                    <strong>{{ $errors->first('is_active') }}</strong>

                </span>

            @endif

        </div>

    <!-- end is_active select -->

    <!-- wiki_url input -->

    <div class="{{ $errors->has('wiki_url') ? ' has-error' : '' }}">

        <label>Wiki Url</label>

        <input type="text"
               name="wiki_url"
               value="{{ old('wiki_url') }}" />

        @if ($errors->has('wiki_url'))

            <span class="help-block">

                    <strong>{{ $errors->first('wiki_url') }}</strong>

                </span>

        @endif

    </div>

    <!-- end wiki_url input -->

    <!-- description input -->

        <div class="{{ $errors->has('description') ? ' has-error' : '' }}">

            <label>Description</label>

            <textarea id="description" name="body"></textarea>

            @if ($errors->has('description'))

                <span class="help-block">

                    <strong>{{ $errors->first('description') }}</strong>

                </span>

            @endif

        </div>

    <!-- end description input -->

    <!-- image file Form Input -->

        <div class="row mt-20">

            <div class="{{ $errors->has('image') ? 'has-error' : '' }}">

                <div class="row">
                    <label>Image Upload</label>

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

    </div>

    <!-- end submit button -->

</form>

@section('scripts')

    <script>
        CKEDITOR.replace( 'body' );
    </script>

@endsection

