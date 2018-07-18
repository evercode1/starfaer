<template>

    <div class="row">

        <div class="col-lg-12">

            <h1>Videos</h1>

            <search-box></search-box>

            <div class="pull-right">

                <grid-count></grid-count>

            </div>



            <section class="panel mt-25">
                <div class="panel-title"></div>

                <div class="panel-body">

                    <table class="table table-bordered table-striped table-responsive">

                        <table-head></table-head>

                        <tbody>

                        <tr v-for="row in gridData">

                            <td>

                                {{ row.Id }}

                            </td>

                            <td>

                                <a v-bind:href="'/all-videos/' + row.Id"> {{ row.Title }} </a>

                            </td>



                            <td>

                                <a v-bind:href="row.Url" target="_blank"> {{ row.Url }} </a>

                            </td>

                            <td>

                                {{ row.Category }}

                            </td>

                            <td>

                                {{ row.Level }}

                            </td>


                            <td>

                                {{ formatFeatured(row.Featured) }}

                            </td>

                            <td>

                                {{ row.Created }}

                            </td>



                            <td >

                                <a v-bind:href="'/video/' + row.Id + '/edit'">

                                    <button type="button" class="btn btn-default">

                                        Edit

                                    </button>

                                </a>

                                <button class="btn btn-danger pull-left mt-5"
                                        @click="confirmDelete(row.Id)">

                                    Delete

                                </button>

                            </td>

                        </tr>

                        </tbody>

                    </table>

                </div>

                <page-number></page-number>

            </section>

            <pagination></pagination>

        </div>

    </div>

</template>

<script>

    var gridData = require('../utilities/gridData');


    export default {

        components: {'pagination' : require('./Pagination'),
                     'search-box' : require('./SearchBox'),
                     'grid-count' : require('./GridCount'),
                     'page-number' : require('./PageNumber'),
                     'table-head' : require('./TableHead')},

        mounted: function () {

            gridData.loadData('api/video-data', this);

        },
        data: function () {
            return {
                query: '',
                gridColumns: ['Id', 'Title', 'External Url', 'Category', 'Level', 'Featured', 'Created'],
                gridData: [],
                total: null,
                next_page_url: null,
                prev_page_url: null,
                last_page: null,
                current_page: null,
                pages: [],
                first_page_url: null,
                last_page_url: null,
                go_to_page: null,
                sortOrder: -1,
                sortKey: 'id',
                createUrl: '/video/create',
                showCreateButton: true
            }
        },

        methods: {

            sortBy: function (key){
                this.sortKey = key;
                this.sortOrder = (this.sortOrder == 1) ? -1 : 1;
                this.getData(this.current_page);

            },

            search: function(query){
                this.getData(query);
            },


            getData:  function(request){

                gridData.getQueryData(request, 'api/video-data', this);

            },

            setPageNumbers: function(){

                this.pages = [];

                for (var i = 1; i <= this.last_page; i++) {
                    this.pages.push(i);
                }
            },

            checkPage: function(page){
                return page == this.current_page;
            },

            resetPageNumbers: function(){

                this.setPageNumbers();
            },

            checkUrlNotNull: function(url){
                return url != null;
            },

            clearPageNumberInputBox: function(){
                return this.go_to_page = '';
            },

            pageInRange: function(){
                return this.go_to_page <= parseInt(this.last_page);
            },


            formatFeatured: function(featured){

                return featured == 1 ? 'Yes'  : 'No';

            },

            confirmDelete: function(id){

                if(confirm("Are you sure you want to delete?")){

                    axios.post('/video-delete/' + id)
                            .then(response => {

                                gridData.loadData('api/video-data', this);

                            })


                }

            }

        }

    }

</script>