<template>

    <div class="sidebar-module">
        <h4>Videos By Level</h4>
        <ol class="list-unstyled">

            <li v-for="level in levels"><a v-bind:href="'/videos-by-level/' + level.name">
                {{ formatLevelName(level.name) }} - {{ level.videos_count }}</a></li>

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

                levels: [],

            }

        },

        methods:  {

            loadData(){

                axios.get('/api/videos-by-level-list-data').then( (response) => {

                    this.levels = response.data;


                });

            },

            formatLevelName(level){

                return level.charAt(0).toUpperCase() + level.slice(1);


            }

        }
    }
</script>