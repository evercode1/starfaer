<div class="row">

<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/universe-generator') }}">

{{ csrf_field() }}

              <input type="hidden" id="seed" name="seed" value="seed">


    <!-- submit button -->

    <ul class="collection">
        <li class="collection-item"><p>

                This button populates the database with data from the universe-seeds seed file.
                Old data is truncated if you run this command.


            </p></li>
        <li class="collection-item">

            <button type="submit" class="waves-effect waves-light btn">

                Generate Universes

            </button>



        </li>

    </ul>





    <!-- end submit button -->

</form>

</div>

