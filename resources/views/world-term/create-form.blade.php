<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/world-term') }}">

{{ csrf_field() }}

<!-- World Term Type dropdown -->

    <div class="{{ $errors->has('world_term_type_id') ? ' has-error' : '' }}">

        <label for="world_term_type_id">World Term Type:</label>

        <select name="world_term_type_id">

            <option value="">Please Choose One</option>

            @foreach($worldTermTypes as $type)

                <option value="{{ $type->id }}">{{ $type->name }}</option>

            @endforeach

        </select>

        @if ($errors->has('world_term_type_id'))

            <span class="help-block">

                   <strong>{{ $errors->first('world_term_type_id') }}</strong>

                   </span>

        @endif

    </div>
    

    <!-- end world Term type dropdown -->


    <!-- name input -->

        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

            <label>WorldTerm Name</label>

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

    <!-- planet name input -->

    <div class="{{ $errors->has('planet') ? ' has-error' : '' }}">

        <label>Planet Name</label>

        <input type="text"
               name="planet"
               value="{{ old('planet') }}" />

        @if ($errors->has('planet'))

            <span class="help-block">

                    <strong>{{ $errors->first('planet') }}</strong>

                </span>

        @endif

    </div>

    <!-- end planet name input -->

    <!-- books dropdown -->

    <div class="{{ $errors->has('book_id') ? ' has-error' : '' }}">

        <label for="book_id">First Appearance:</label>

        <select name="book_id">

            <option value="">Please Choose One</option>

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




    <!-- end books dropdown -->


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

