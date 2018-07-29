<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/seeder') }}">

{{ csrf_field() }}

     <!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name (i.e. planets, moons)</label>

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


    <!-- word_length input -->

    <div class="{{ $errors->has('word_length') ? ' has-error' : '' }}">

        <label>Word Length (enter half intended value)</label>

        <input type="number"
               name="word_length"
               value="{{ old('word_length') }}" />

        @if ($errors->has('word_length'))

            <span class="help-block">

                        <strong>{{ $errors->first('word_length') }}</strong>

                 </span>

        @endif

    </div>

    <!-- end word_length input -->

    <!-- total_count input -->

    <div class="{{ $errors->has('total_count') ? ' has-error' : '' }}">

        <label>Total Names To Generate</label>

        <input type="number"
               name="total_count"
               value="{{ old('total_count') }}" />

        @if ($errors->has('total_count'))

            <span class="help-block">

                        <strong>{{ $errors->first('total_count') }}</strong>

                 </span>

        @endif

    </div>

    <!-- end total_count input -->

    <!-- vowels select -->

        <div class="{{ $errors->has('vowels') ? ' has-error' : '' }}">

            <label>Vowel Group</label>

            <select id="vowels" name="vowels">



                <option value="">Please Choose One</option>
                <option value="astro">astro</option>
                <option value="star-words">star-words</option>

            </select>

            @if ($errors->has('vowels'))

                <span class="help-block">

                    <strong>{{ $errors->first('vowels') }}</strong>

                </span>

            @endif

        </div>

    <!-- end vowels select -->

    <!-- consonants select -->

    <div class="{{ $errors->has('consonants') ? ' has-error' : '' }}">

        <label>Consonant Group</label>

        <select id="consonants" name="consonants">

            <option value="">Please Choose One</option>



<option value="wonder-words">wonder-words</option>
            <option value="sentimental">sentimental</option>
            <option value="astro">astro</option>
            <option value="star">star</option>
            <option value="star-words">star-words</option>



        </select>

        @if ($errors->has('consonants'))

            <span class="help-block">

                    <strong>{{ $errors->first('consonants') }}</strong>

                </span>

        @endif

    </div>

    <!-- end consonants select -->

    <!-- direction select -->

    <div class="{{ $errors->has('direction') ? ' has-error' : '' }}">

        <label>Direction of Seeds</label>

        <select id="direction" name="direction">

            <option value="">Please Choose One</option>
            <option value="seed_last">Seed Group Last</option>
            <option value="seed_first">Seed Group First</option>




        </select>

        @if ($errors->has('direction'))

            <span class="help-block">

                    <strong>{{ $errors->first('direction') }}</strong>

                </span>

        @endif

    </div>

    <!-- end direction select -->


    <!-- submit button -->

    <div class="row mt-50">

        <button type="submit"
                class="waves-effect waves-light btn">

            Create

        </button>

    </div>

    <!-- end submit button -->

</form>



