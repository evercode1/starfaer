<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/star/'. $star->id) }}"
      enctype="multipart/form-data">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $star->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">

                <strong>{{ $errors->first('name') }}</strong>

            </span>

        @endif

    </div>

    <!-- end name input -->

    <!-- star_type_id select -->

    <div class="{{ $errors->has('star_type_id') ? ' has-error' : '' }}">

        <label>Star Type</label>

        <select id="star_type_id" name="star_type_id">

            <option value="{{ $starTypeId }}">{{ $starTypeName }}</option>

            @foreach($starTypes as $starType)

                <option value={{ $starType->id }}>{{ $starType->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('star_type_id'))

            <span class="help-block">

                    <strong>{{ $errors->first('star_type_id') }}</strong>

                </span>

        @endif

    </div>

    <!-- end star_type_id select -->

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

    <!-- galaxy select -->

    <div class="{{ $errors->has('galaxy_id') ? ' has-error' : '' }}">

        <label>Galaxy</label>

        <select id="galaxy_id" name="galaxy_id">

            <option value="{{ $galaxyId }}">{{ $galaxyName }}</option>

            @foreach($galaxies as $galaxy)

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

    <!-- zone select -->

    <div class="{{ $errors->has('zone_id') ? ' has-error' : '' }}">

        <label>Zone</label>

        <select id="zone_id" name="zone_id">

            <option value="{{ $zoneId }}">{{ $zoneName }}</option>

            @foreach($zones as $zone)

                <option value={{ $zone->id }}>{{ $zone->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('zone_id'))

            <span class="help-block">

                    <strong>{{ $errors->first('zone_id') }}</strong>

                </span>

        @endif

    </div>

    <!-- end zone select -->

    <!-- is_binary select -->

    <div class="{{ $errors->has('is_binary') ? ' has-error' : '' }}">

        <label>Is Binary?</label>

        <select id="is_binary" name="is_binary">

            <option value="{{ $star->is_binary }}">{{ $star->is_binary == 1 ? 'Yes' : 'No' }}</option>

            @if($star->is_binary == 1)

                <option value="0">No</option>

            @else

                <option value="1">Yes</option>

            @endif

        </select>

        @if ($errors->has('is_binary'))

            <span class="help-block">

                        <strong>{{ $errors->first('is_binary') }}</strong>

                    </span>

        @endif

    </div>

    <!-- end is_binary select -->

    <!-- has_planets select -->

    <div class="{{ $errors->has('has_planets') ? ' has-error' : '' }}">

        <label>Has Planets?</label>

        <select id="has_planets" name="has_planets">

            <option value="{{ $star->has_planets }}">{{ $star->has_planets == 1 ? 'Yes' : 'No' }}</option>

            @if($star->has_planets == 1)

                <option value="0">No</option>

            @else

                <option value="1">Yes</option>

            @endif

        </select>

        @if ($errors->has('has_planets'))

            <span class="help-block">

                        <strong>{{ $errors->first('has_planets') }}</strong>

                    </span>

        @endif

    </div>

    <!-- end has_planets select -->

    <!-- planet_count input -->

    <div class="{{ $errors->has('planet_count') ? ' has-error' : '' }}">

        <label>Planet Count</label>

        <input type="number"
               name="planet_count"
               value="{{ $star->planet_count }}" />

        @if ($errors->has('planet_count'))

            <span class="help-block">

                <strong>{{ $errors->first('planet_count') }}</strong>

            </span>

        @endif

    </div>

    <!-- end planet_count input -->

    <!-- age input -->

    <div class="{{ $errors->has('age') ? ' has-error' : '' }}">

        <label>Age</label>

        <input type="number"
               name="age"
               value="{{ $star->age }}" />

        @if ($errors->has('age'))

            <span class="help-block">

                <strong>{{ $errors->first('age') }}</strong>

            </span>

        @endif

    </div>

    <!-- end age input -->

    <!-- size input -->

    <div class="{{ $errors->has('size') ? ' has-error' : '' }}">

        <label>Size</label>

        <input type="number"
               name="size"
               value="{{ $star->size }}" />

        @if ($errors->has('size'))

            <span class="help-block">

                <strong>{{ $errors->first('size') }}</strong>

            </span>

        @endif

    </div>

    <!-- end size input -->

    <!-- coordinates input -->

    <div class="{{ $errors->has('coordinates') ? ' has-error' : '' }}">

        <label>Coordinates</label>

        <input type="text"
               name="coordinates"
               value="{{ $star->coordinates }}" />

        @if ($errors->has('coordinates'))

            <span class="help-block">

                <strong>{{ $errors->first('coordinates') }}</strong>

            </span>

        @endif

    </div>

    <!-- end coordinates input -->

    <!-- is_active select -->

            <div class="{{ $errors->has('is_active') ? ' has-error' : '' }}">

                <label>Is Active?</label>

                <select id="is_active" name="is_active">

                    <option value="{{ $star->is_active }}">{{ $star->is_active == 1 ? 'Yes' : 'No' }}</option>

                    @if($star->is_active == 1)

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

                <option value="{{ $star->is_featured }}">{{ $star->is_featured == 1 ? 'Yes' : 'No' }}</option>

                @if($star->is_featured == 1)

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

    <!-- description input -->

        <div class="{{ $errors->has('description') ? ' has-error' : '' }}">

            <label>Description</label>

            <textarea id="description" name="body">{!! $star->description !!}</textarea>

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



