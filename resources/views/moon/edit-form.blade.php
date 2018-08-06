<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/moon/'. $moon->id) }}"
      enctype="multipart/form-data">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $moon->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">

                <strong>{{ $errors->first('name') }}</strong>

            </span>

        @endif

    </div>

    <!-- end name input -->

    <!-- planet_name input -->

    <div class="{{ $errors->has('planet_name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="planet_name"
               value="{{ $moon->planet->name }}" />

        @if ($errors->has('planet_name'))

            <span class="help-block">

                <strong>{{ $errors->first('planet_name') }}</strong>

            </span>

        @endif

    </div>

    <!-- end planet_name input -->

    <!-- orbital_position input -->

    <div class="{{ $errors->has('orbital_position') ? ' has-error' : '' }}">

        <label>Orbital Position</label>

        <input type="number"
               name="orbital_position"
               value="{{ $moon->orbital_position }}" />

        @if ($errors->has('orbital_position'))

            <span class="help-block">

                <strong>{{ $errors->first('orbital_position') }}</strong>

            </span>

        @endif

    </div>

    <!-- end orbital_position input -->

    <!-- mass input -->

    <div class="{{ $errors->has('mass') ? ' has-error' : '' }}">

        <label>Mass</label>

        <input type="number"
               name="mass"
               value="{{ $moon->mass }}" />

        @if ($errors->has('mass'))

            <span class="help-block">

                <strong>{{ $errors->first('mass') }}</strong>

            </span>

        @endif

    </div>

    <!-- end mass input -->

    <!-- surface_type_id select -->

    <div class="{{ $errors->has('surface_type_id') ? ' has-error' : '' }}">

        <label>Surface Type</label>

        <select id="surface_type_id" name="surface_type_id">

            <option value="{{ $surfaceTypeId }}">{{ $surfaceTypeName }}</option>

            @foreach($surfaceTypes as $surfaceType)

                <option value={{ $surfaceType->id }}>{{ $surfaceType->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('surface_type_id'))

            <span class="help-block">

                    <strong>{{ $errors->first('surface_type_id') }}</strong>

                </span>

        @endif

    </div>

    <!-- end surface_type_id select -->

    <!-- atmosphere_id select -->

    <div class="{{ $errors->has('atmosphere_id') ? ' has-error' : '' }}">

        <label>Atmosphere Type</label>

        <select id="atmosphere_id" name="atmosphere_id">

            <option value="{{ $atmosphereId }}">{{ $atmosphereName }}</option>

            @foreach($atmospheres as $atmosphere)

                <option value={{ $atmosphere->id }}>{{ $atmosphere->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('atmosphere_id'))

            <span class="help-block">

                    <strong>{{ $errors->first('atmosphere_id') }}</strong>

                </span>

        @endif

    </div>

    <!-- end atmosphere_id select -->

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

    <!-- is_active select -->

            <div class="{{ $errors->has('is_active') ? ' has-error' : '' }}">

                <label>Is Active?</label>

                <select id="is_active" name="is_active">

                    <option value="{{ $moon->is_active }}">{{ $moon->is_active == 1 ? 'Yes' : 'No' }}</option>

                    @if($moon->is_active == 1)

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


    <!-- description input -->

        <div class="{{ $errors->has('description') ? ' has-error' : '' }}">

            <label>Description</label>

            <textarea id="description" name="body">{!! $moon->description !!}</textarea>

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



