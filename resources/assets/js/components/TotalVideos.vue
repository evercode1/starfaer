<template>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="/video"><div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-video-camera" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="text-center">Videos</span>
                    <span class="info-box-number text-center">{{ videos }}</span>
                </div>
                <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
        </div>


</template>

<script>

    export default {

        mounted: function () {

            this.loadData();

        },

        data: function () {
            return {

                videos: '',

            }

        },

        methods:  {

            loadData(){

                axios.get('/api/total-videos').then( (response) => {

                    this.videos = response.data;

                });

            }



        }
    }
</script>