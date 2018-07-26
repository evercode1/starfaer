<div class="row">

<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/star-type-seeder') }}">

{{ csrf_field() }}

              <input type="hidden" id="seed" name="seed" value="seed">


    <!-- submit button -->



        <button type="submit" class="waves-effect waves-light btn">

            Create Seeds

        </button>



    <!-- end submit button -->

</form>

</div>

