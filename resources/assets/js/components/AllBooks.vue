<template>

    <div class="row">

        <ul class="collection">
            <li class="collection-item avatar" v-for="book in books">
                <a v-bind:href="book.url" target="_blank">
                <img v-bind:src="'/imgs/books/thumbnails/thumb-' + formatImageName(book.title) + '.' + book.image_extension">
                </a>
                <p><a v-bind:href="book.url" target="_blank"><span class="title">{{ book.title }}</span></a></p>

                <a v-bind:href="book.url" class="secondary-content blue-text mt-20">{{ book.subtitle }}</a>


            </li>

        </ul>

    </div>




</template>

<script>

    export default {

        mounted: function () {

            this.loadData();

        },

        data: function () {
            return {

                books: [],

            }

        },

        methods:  {

            loadData(){

                axios.get('/api/all-books-data').then( (response) => {

                    this.books = response.data;




                });

            },

            formatImageName:  function(imageName){


                return imageName.split(" ").join("-").toLowerCase();



            }



        }
    }
</script>