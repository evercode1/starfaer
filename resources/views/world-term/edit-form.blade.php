<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/world-term/'. $worldTerm->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- Parent Dropdown -->

    <div class="{{ $errors->has('world_term_type_id') ? ' has-error' : '' }}">

        <label for="world_term_type_id">World Term Type:</label>

        <select  name="world_term_type_id">

            <option value="{{ $oldTypeId }}">{{ $oldType }}</option>

            @foreach($types as $type)

                <option value="{{ $type->id }}">{{ $type->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('world_term_type_id'))

            <span class="help-block">

                                 <strong>{{ $errors->first('world_term_type_id') }}</strong>

                                 </span>

        @endif

    </div>


    <!-- End Parent Dropdown -->

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $worldTerm->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">

                <strong>{{ $errors->first('name') }}</strong>

            </span>

        @endif

    </div>

    <!-- end name input -->

    <!-- phonetic input -->

    <div class="{{ $errors->has('phonetic') ? ' has-error' : '' }}">

        <label>Phonetic</label>

        <input type="text"
               name="phonetic"
               value="{{ $worldTerm->phonetic }}" />

        @if ($errors->has('phonetic'))

            <span class="help-block">

                <strong>{{ $errors->first('phonetic') }}</strong>

            </span>

        @endif

    </div>

    <!-- end phonetic input -->

    <!-- planet input -->

    <div class="{{ $errors->has('planet') ? ' has-error' : '' }}">

        <label>Planet</label>

        <input type="text"
               name="planet"
               value="{{ $planet }}" />

        @if ($errors->has('planet'))

            <span class="help-block">

                <strong>{{ $errors->first('planet') }}</strong>

            </span>

        @endif

    </div>

    <!-- end planet input -->

    <!-- books Dropdown -->

    <div class="{{ $errors->has('book_id') ? ' has-error' : '' }}">

        <label for="category_id">First Appearance:</label>

        <select  name="book_id">

            <option value="{{ $oldBookId }}">{{ $oldBookTitle }}</option>

            @foreach($books as $book)

                <option value="{{ $book->id }}">{{ $book->title }}</option>

            @endforeach

        </select>

        @if ($errors->has('book_id'))

            <span class="help-block">

            <strong>{{ $errors->first('book_id') }}</strong>

            </span>

        @endif

    </div>


    <!-- End books Dropdown -->



    <!-- is_active select -->

            <div class="{{ $errors->has('is_active') ? ' has-error' : '' }}">

                <label>Is Active?</label>

                <select id="is_active" name="is_active">

                    <option value="{{ $worldTerm->is_active }}">{{ $worldTerm->is_active == 1 ? 'Yes' : 'No' }}</option>

                    @if($worldTerm->is_active == 1)

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

            <textarea id="description" name="body">{!! $worldTerm->description !!}</textarea>

            @if ($errors->has('description'))

                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>

            @endif

        </div>

    <!-- end description input -->




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



