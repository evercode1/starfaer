<div class="row">

<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/planet-type-generator') }}">

{{ csrf_field() }}

              <input type="hidden" id="seed" name="seed" value="seed">


    <!-- submit button -->

    <ul class="collection">
        <li class="collection-item"><p>

                This button populates the database with data from the planet-type-seed seed file.
                Old data is truncated if you run this command.


            </p></li>
        <li class="collection-item">

            <button type="submit" class="waves-effect waves-light btn">

                Generate PlanetType

            </button>



        </li>

    </ul>





    <!-- end submit button -->

</form>

</div>

