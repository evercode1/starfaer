<template>

    <div class="row">

        <div class="col-lg-16">

            <search-box></search-box>

            <div class="pull-right">

                <grid-count></grid-count>

            </div>

            <section class="panel mt-25 overflow">
                <div class="panel-title"></div>

                <div class="panel-body">

                    <table class="table table-bordered table-striped table-responsive">

                        <video-table-head></video-table-head>

                        <tbody>

                        <tr v-for="row in gridData">


                            <td>

                                <a v-bind:href="'/all-videos/' + row.Id + '-' + row.Slug">{{ row.Title }}</a>

                            </td>

                            <td>

                                {{ row.Author }}

                            </td>

                            <td>

                                {{ row.Category }}

                            </td>

                            <td>

                                {{ formatLevelName(row.Level) }}

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

    </div>

</template>

<script>



    export default {

        props: ['category'],

        components: {'pagination' : require('./Pagination'),
            'search-box' : require('./SearchBox'),
            'grid-count' : require('./GridCount'),
            'page-number' : require('./PageNumber'),
            'video-table-head' : require('./VideoTableHead')},

        mounted: function () {

            let url = '/api/videos-by-category-data?category=' + this.category;

            this.loadPageData(url);


        },
        data: function () {
            return {
                query: '',
                gridColumns: ['Title', 'Author', 'Cat','Level', 'Added'],
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

            loadPageData:  function(url){


                $.getJSON(url, function (data) {

                    this.gridData = data.data;
                    this.total = data.total;
                    this.last_page =  data.last_page;
                    this.next_page_url = data.next_page_url;
                    this.prev_page_url = data.prev_page_url;
                    this.current_page = data.current_page;
                    this.first_page_url = url + '?page=1';
                    this.last_page_url = url + '?page=' + data.last_page;
                    this.setPageNumbers();

                }.bind(this));


            },

            sortBy: function (key){
                this.sortKey = key;
                this.sortOrder = (this.sortOrder == 1) ? -1 : 1;
                this.getData(this.current_page);
            },

            search: function(query){
                this.getData(query);
            },


            getData:  function(request){

                this.getQueryData(request);


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

            formatLevelName(level){

                return level.charAt(0).toUpperCase() + level.slice(1);


            },

            getQueryData(request){


                let url = '/api/videos-by-category-data';

                url = this.formatUrlGetRequest(url, request);

                if (this.query == '' && url != null){

                    $.getJSON(url, function (data) {

                        this.gridData = data.data;
                        this.total = data.total;
                        this.last_page =  data.last_page;
                        this.next_page_url = data.next_page_url;
                        this.prev_page_url = data.prev_page_url;
                        this.current_page = data.current_page;

                    }.bind(this));

                } else {


                    if (url != null){

                        $.getJSON(url, function (data) {

                            this.gridData = data.data;
                            this.total = data.total;
                            this.last_page =  data.last_page;
                            this.next_page_url = (data.next_page_url == null) ? null : data.next_page_url + '&keyword=' + this.query;
                            this.prev_page_url = (data.prev_page_url == null) ? null : data.prev_page_url + '&keyword=' + this.query;
                            this.first_page_url = url + '?page=1&keyword=' + this.query;
                            this.last_page_url = url + '?page=' + this.last_page + '&keyword=' + this.query;
                            this.current_page = data.current_page;
                            this.resetPageNumbers();

                        }.bind(this));

                    }
                }
            },

            formatUrlGetRequest(url, request){

                let formattedUrl;

                let sortParams = '&column=' + this.sortKey +
                                 '&direction=' + this.sortOrder +
                                 '&category=' + this.category;

                let searchParams = '&column=' + this.sortKey +
                                   '&direction=' + this.sortOrder +
                                   '&keyword=' + this.query +
                                   '&category=' + this.category;

                switch (request){

                    case this.prev_page_url :

                        formattedUrl = this.prev_page_url + sortParams;

                        break;

                    case this.next_page_url :

                        formattedUrl = this.next_page_url + sortParams;

                        break;

                    case this.first_page_url :

                        formattedUrl = this.first_page_url + sortParams;

                        break;

                    case this.last_page_url :

                        formattedUrl = this.last_page_url + sortParams;

                        break;

                    case this.query :

                        formattedUrl = url + '?' + 'keyword=' + this.query + sortParams;

                        break;

                    case this.go_to_page :

                        if( this.go_to_page != '' && this.pageInRange()){

                            formattedUrl = url + '?' + 'page=' + this.go_to_page + searchParams;

                            this.clearPageNumberInputBox();

                        } else {

                            alert('Please enter a valid page number');

                        }

                        break;

                    default :

                        formattedUrl = url + '?' + 'page=' + request + searchParams;

                        break;

                }

                return formattedUrl;


            }

        }

    }

</script>