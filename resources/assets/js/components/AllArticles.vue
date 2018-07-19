<template>

    <div class="row">

        <h1 class="flow-text grey-text text-darken-1">All Articles</h1>

            <search-box></search-box>

            <div class="right">

                <grid-count></grid-count>

            </div>



            <section class="mt-20">


                <div class="row">

                    <table>

                        <video-table-head></video-table-head>

                        <tbody>

                        <tr v-for="row in gridData">


                            <td>

                                <a v-bind:href="'/post/' + row.Id + '-' + row.Slug">{{ row.Title }}</a>

                            </td>

                            <td>

                                {{ row.Category }}

                            </td>


                            <td>

                                {{ row.Created }}

                            </td>



                        </tr>

                        </tbody>

                    </table>

                </div>

                <page-number></page-number>

            </section>

            <pagination></pagination>



    </div>

</template>

<script>

    var gridData = require('../utilities/gridData');


    export default {

        components: {'pagination' : require('./Pagination'),
            'search-box' : require('./SearchBox'),
            'grid-count' : require('./GridCount'),
            'page-number' : require('./PageNumber'),
            'video-table-head' : require('./VideoTableHead')},

        mounted: function () {

            gridData.loadData('api/all-articles-data', this);

        },
        data: function () {
            return {
                query: '',
                gridColumns: ['Title', 'Category', 'Added'],
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
                createUrl: '/blogresource/create',
                showCreateButton: false
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

                gridData.getQueryData(request, 'api/all-articles-data', this);

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

            }

        }

    }

</script>