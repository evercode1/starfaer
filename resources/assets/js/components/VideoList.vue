<template>

    <div class="sidebar-module">
        <h4>All Videos</h4>
        <ol class="list-unstyled">

            <li><a href="/all-videos/1">What is Bitcoin?</a>
                <i class="fa fa-thumb-tack" aria-hidden="true"></i></li>
            <li v-for="video in videos"><a v-bind:href="'/all-videos/' + video.id + '-' + video.slug" target="_blank">{{ video.title }}</a></li>
            <li><a href="/all-videos">more...</a></li>

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

                videos: [],

            }

        },

        methods:  {

            loadData(){

                axios.get('/api/video-list-data').then( (response) => {

                    this.videos = response.data;


                });

            }



        }
    }
</script>