<template>

    <div class="sidebar-module">
        <h4>Videos By Category</h4>
        <ol class="list-unstyled">

            <li v-for="category in categories"><a v-bind:href="'/videos-by-category/' + formatCategoryName(category.name)">
                {{ category.name }} - {{ category.videos_count }}</a></li>

        </ol>
    </div>

</template>



<script>

    export default {

        mounted: function () {

            this.loadData();

        },

        data: function () {
            return {

                categories: [],

            }

        },

        methods:  {

            loadData(){

                axios.get('/api/videos-by-category-list-data').then( (response) => {

                    this.categories = response.data;



                });

            },

            formatCategoryName(category){

                return category.toLowerCase();


            }

        }
    }
</script>