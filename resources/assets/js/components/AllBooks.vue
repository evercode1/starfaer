<template>

    <div class="row">

        <h1 class="flow-text grey-text text-darken-1">All Books</h1>

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

                            <a v-bind:href="row.Url"><img v-bind:src="'/imgs/books/thumbnails/thumb-'
                            + formatImageName(row.Title) + '.' + row.Ext"></a>

                        </td>

                        <td>

                            <a v-bind:href="'/all-Books/' + row.Id">{{ row.Series }}</a>

                        </td>

                        <td>

                            {{ row.Number }}

                        </td>


                        <td>

                            <a v-bind:href="'/all-Books/' + row.Id">{{ row.Title }}</a>

                        </td>



                        <td>

                            {{ row.Author }}

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
            'video-table-head' : require('./VideoTableHead')},

        mounted: function () {

            gridData.loadData('api/book-data', this);

        },
        data: function () {
            return {
                query: '',
                gridColumns: ['Thumb', 'Series', 'Book Number','Title', 'Author'],
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

                gridData.getQueryData(request, 'api/book-data', this);

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

            formatImageName:  function(imageName){
                return imageName.split(" ").join("-").toLowerCase();
            }

        }

    }

</script>