<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/star-type/'. $starType->id) }}"
      enctype="multipart/form-data">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $starType->name }}" />

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

                <option value="{{ $universeId }}">{{ $universeName }}</option>

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

    <!-- is_active select -->

            <div class="{{ $errors->has('is_active') ? ' has-error' : '' }}">

                <label>Is Active?</label>

                <select id="is_active" name="is_active">

                    <option value="{{ $starType->is_active }}">{{ $starType->is_active == 1 ? 'Yes' : 'No' }}</option>

                    @if($starType->is_active == 1)

                        <option value="0">No</option>

                    @else

                        <option value="1">Yes</option>

                    @endif

                </select>

                @if ($errors->has('is_active'))

                    <span class="help-block">

                        <strong>{{ $errors->first('is_active') }}</strong>

                    </span>

                @endif

            </div>

    <!-- end is_active select -->

    <!-- is_featured select -->

        <div class="{{ $errors->has('is_featured') ? 'has-error' : '' }}">

            <label>Is Featured?</label>

            <select id="is_featured" name="is_featured">

                <option value="{{ $starType->is_featured }}">{{ $starType->is_featured == 1 ? 'Yes' : 'No' }}</option>

                @if($starType->is_featured == 1)

                <option value="0">No</option>

                @else

                <option value="1">Yes</option>

                @endif


            </select>

            @if ($errors->has('is_featured'))

                <span class="help-block">

                    <strong>{{ $errors->first('is_featured') }}</strong>

                </span>

            @endif

        </div>

    <!-- end is_featured select -->

    <!-- weight input -->

        <div class="{{ $errors->has('weight') ? 'has-error' : '' }}">

            <label>Weight</label>

            <input type="text"
                   name="weight"
                   value="{{ old('weight') ?  old('weight') : $starType->weight }}" />

            @if ($errors->has('weight'))

                <span class="help-block">
                    <strong>{{ $errors->first('weight') }}</strong>
                </span>

            @endif

        </div>

    <!-- end weight input -->

    <!-- description input -->

        <div class="{{ $errors->has('description') ? ' has-error' : '' }}">

            <label>Description</label>

            <textarea id="description" name="body">{!! $starType->description !!}</textarea>

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

                Update

            </button>

        </div>

    <!-- end submit button -->

    </form>


    @section('scripts')

        <script>
            CKEDITOR.replace( 'body' );
        </script>

    @endsection



