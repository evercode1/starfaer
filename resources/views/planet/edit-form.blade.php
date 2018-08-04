<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/planet/'. $planet->id) }}"
      enctype="multipart/form-data">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $planet->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">

                <strong>{{ $errors->first('name') }}</strong>

            </span>

        @endif

    </div>

    <!-- end name input -->

    <!-- star_id select -->

    <div class="{{ $errors->has('star_id') ? ' has-error' : '' }}">

        <label>Orbits Star</label>

        <select id="star_id" name="star_id">

            <option value="{{ $starId }}">{{ $starName }}</option>

            @foreach($stars as $star)

                <option value={{ $star->id }}>{{ $star->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('star_id'))

            <span class="help-block">

                    <strong>{{ $errors->first('star_id') }}</strong>

                </span>

        @endif

    </div>

    <!-- end star_id select -->

    <!-- planet_type_id select -->

    <div class="{{ $errors->has('planet_type_id') ? ' has-error' : '' }}">

        <label>Planet Type</label>

        <select id="planet_type_id" name="planet_type_id">

            <option value="{{ $planetTypeId }}">{{ $planetTypeName }}</option>

            @foreach($planetTypes as $planetType)

                <option value={{ $planetType->id }}>{{ $planetType->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('planet_type_id'))

            <span class="help-block">

                    <strong>{{ $errors->first('planet_type_id') }}</strong>

                </span>

        @endif

    </div>

    <!-- end planet_type_id select -->

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

    <!-- is_life_present select -->

    <div class="{{ $errors->has('is_life_present') ? ' has-error' : '' }}">

        <label>Is Life Present?</label>

        <select id="is_life_present" name="is_life_present">

            <option value="{{ $planet->is_life_present }}">{{ $planet->is_life_present == 1 ? 'Yes' : 'No' }}</option>

            @if($planet->is_life_present == 1)

                <option value="0">No</option>

            @else

                <option value="1">Yes</option>

            @endif

        </select>

        @if ($errors->has('is_life_present'))

            <span class="help-block">

                        <strong>{{ $errors->first('is_life_present') }}</strong>

                    </span>

        @endif

    </div>

    <!-- end is_life_present select -->

    <!-- is_in_goldilocks_zone select -->

    <div class="{{ $errors->has('is_in_goldilocks_zone') ? ' has-error' : '' }}">

        <label>Is In Goldilocks Zone?</label>

        <select id="is_in_goldilocks_zone" name="is_in_goldilocks_zone">

            <option value="{{ $planet->is_in_goldilocks_zone }}">{{ $planet->is_in_goldilocks_zone == 1 ? 'Yes' : 'No' }}</option>

            @if($planet->is_in_goldilocks_zone == 1)

                <option value="0">No</option>

            @else

                <option value="1">Yes</option>

            @endif

        </select>

        @if ($errors->has('is_in_goldilocks_zone'))

            <span class="help-block">

                        <strong>{{ $errors->first('is_in_goldilocks_zone') }}</strong>

                    </span>

        @endif

    </div>

    <!-- end is_in_goldilocks_zone select -->

    <!-- is_ringed select -->

    <div class="{{ $errors->has('is_ringed') ? ' has-error' : '' }}">

        <label>Is Ringed?</label>

        <select id="is_ringed" name="is_ringed">

            <option value="{{ $planet->is_ringed }}">{{ $planet->is_ringed == 1 ? 'Yes' : 'No' }}</option>

            @if($planet->is_ringed == 1)

                <option value="0">No</option>

            @else

                <option value="1">Yes</option>

            @endif

        </select>

        @if ($errors->has('is_ringed'))

            <span class="help-block">

                        <strong>{{ $errors->first('is_ringed') }}</strong>

                    </span>

        @endif

    </div>

    <!-- end is_ringed select -->

    <!-- planet_detail_id input -->

    <div class="{{ $errors->has('planet_detail_id') ? ' has-error' : '' }}">

        <label>Planet Detail Id</label>

        <input type="number"
               name="planet_detail_id"
               value="{{ $planet->planet_detail_id }}" />

        @if ($errors->has('planet_detail_id'))

            <span class="help-block">

                <strong>{{ $errors->first('planet_detail_id') }}</strong>

            </span>

        @endif

    </div>

    <!-- end planet_detail_id input -->

    <!-- mass input -->

    <div class="{{ $errors->has('mass') ? ' has-error' : '' }}">

        <label>Mass</label>

        <input type="number"
               name="mass"
               value="{{ $planet->mass }}" />

        @if ($errors->has('mass'))

            <span class="help-block">

                <strong>{{ $errors->first('mass') }}</strong>

            </span>

        @endif

    </div>

    <!-- end mass input -->

    <!-- atmospheric_density input -->

    <div class="{{ $errors->has('atmospheric_density') ? ' has-error' : '' }}">

        <label>Atmospheric Density</label>

        <input type="number"
               name="atmospheric_density"
               value="{{ $planet->atmospheric_density }}" />

        @if ($errors->has('atmospheric_density'))

            <span class="help-block">

                <strong>{{ $errors->first('atmospheric_density') }}</strong>

            </span>

        @endif

    </div>

    <!-- end atmospheric_density input -->

    <!-- planet_number_from_star input -->

    <div class="{{ $errors->has('planet_number_from_star') ? ' has-error' : '' }}">

        <label>Planet Number From Star</label>

        <input type="number"
               name="planet_number_from_star"
               value="{{ $planet->planet_number_from_star }}" />

        @if ($errors->has('planet_number_from_star'))

            <span class="help-block">

                <strong>{{ $errors->first('planet_number_from_star') }}</strong>

            </span>

        @endif

    </div>

    <!-- end planet_number_from_star input -->

    <!-- moon_count input -->

    <div class="{{ $errors->has('moon_count') ? ' has-error' : '' }}">

        <label>Moon Count</label>

        <input type="number"
               name="moon_count"
               value="{{ $planet->moon_count }}" />

        @if ($errors->has('moon_count'))

            <span class="help-block">

                <strong>{{ $errors->first('moon_count') }}</strong>

            </span>

        @endif

    </div>

    <!-- end moon_count input -->

    <!-- ocean_count input -->

    <div class="{{ $errors->has('ocean_count') ? ' has-error' : '' }}">

        <label>Ocean Count</label>

        <input type="number"
               name="ocean_count"
               value="{{ $planet->ocean_count }}" />

        @if ($errors->has('ocean_count'))

            <span class="help-block">

                <strong>{{ $errors->first('ocean_count') }}</strong>

            </span>

        @endif

    </div>

    <!-- end ocean_count input -->

    <!-- continent_count input -->

    <div class="{{ $errors->has('continent_count') ? ' has-error' : '' }}">

        <label>Continent Count</label>

        <input type="number"
               name="continent_count"
               value="{{ $planet->continent_count }}" />

        @if ($errors->has('continent_count'))

            <span class="help-block">

                <strong>{{ $errors->first('continent_count') }}</strong>

            </span>

        @endif

    </div>

    <!-- end continent_count input -->

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

                    <option value="{{ $planet->is_active }}">{{ $planet->is_active == 1 ? 'Yes' : 'No' }}</option>

                    @if($planet->is_active == 1)

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

            <textarea id="description" name="body">{!! $planet->description !!}</textarea>

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



