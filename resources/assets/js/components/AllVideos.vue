<template>

    <div class="row">

        <h1 class="flow-text grey-text text-darken-1">All Videos</h1>

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

                                <a v-bind:href="'/all-videos/' + row.Id + '-' + row.Slug">{{ row.Title }}</a>

                            </td>

                            <td>

                                {{ row.Author }}

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




    export default {

        components: {'pagination' : require('./Pagination'),
            'search-box' : require('./SearchBox'),
            'grid-count' : require('./GridCount'),
            'page-number' : require('./PageNumber'),
            'video-table-head' : require('./VideoTableHead')},

        mounted: function () {

            this.loadData();

        },
        data: function () {
            return {
                query: '',
                gridColumns: ['Title', 'Author', 'Cat', 'Added'],
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
                this.getData();
            },

            search: function(query){
                this.getData(query);
            },


            getData: function (request){

                let getPage;
                let name = this.sortKey;

                switch (request){

                    case this.prev_page_url :

                        getPage = this.prev_page_url +
                            '&column=' + name +
                            '&direction=' + this.sortOrder;

                        break;

                    case this.next_page_url :

                        getPage = this.next_page_url +
                            '&column=' + name +
                            '&direction=' + this.sortOrder;

                        break;


                    case this.first_page_url :

                        getPage = this.first_page_url +
                            '&column=' + name +
                            '&direction=' + this.sortOrder;

                        break;

                    case this.last_page_url :

                        getPage = this.last_page_url +
                            '&column=' + name +
                            '&direction=' + this.sortOrder;

                        break;

                    case this.query :

                        getPage = '/api/api/all-video-data?' +
                            'keyword=' + this.query +
                            '&column=' + name +
                            '&direction=' + this.sortOrder;

                        break;

                    case this.go_to_page :

                        if( this.go_to_page != '' && this.pageInRange()){

                            getPage = '/api/all-media-links-data/' + this.type + '?' +
                                'page=' + this.go_to_page +
                                '&column=' + name +
                                '&direction=' + this.sortOrder +
                                '&keyword=' + this.query;

                            this.clearPageNumberInputBox();

                        } else {

                            alert('Please enter a valid page number');
                        }

                        break;

                    default :

                        getPage = '/api/api/all-video-data?' +
                            'page=' + request +
                            '&column=' + name +
                            '&direction=' + this.sortOrder +
                            '&keyword=' + this.query;

                        break;
                }

                if (this.query == '' && getPage != null){

                    $.getJSON(getPage, function (data) {
                        this.gridData = data.data;
                        this.total = data.total;
                        this.last_page =  data.last_page;
                        this.next_page_url = data.next_page_url;
                        this.prev_page_url = data.prev_page_url;
                        this.current_page = data.current_page;
                    }.bind(this));

                } else {

                    if (getPage != null){

                        $.getJSON(getPage, function (data) {
                            this.gridData = data.data;
                            this.total = data.total;
                            this.last_page =  data.last_page;
                            this.next_page_url = (data.next_page_url == null) ? null : data.next_page_url + '&keyword=' +this.query;
                            this.prev_page_url = (data.prev_page_url == null) ? null : data.prev_page_url + '&keyword=' +this.query;
                            this.first_page_url = '/api/api/all-video-data?page=1&keyword=' +this.query;
                            this.last_page_url = 'api/all-video-data?page=' + this.last_page + '&keyword=' +this.query;
                            this.current_page = data.current_page;
                            this.resetPageNumbers();
                        }.bind(this));

                    }

                }

            },

            loadData: function (){
                $.getJSON('/api/api/all-video-data', function (data) {
                    this.gridData = data.data;
                    this.total = data.total;
                    this.last_page =  data.last_page;
                    this.next_page_url = data.next_page_url;
                    this.prev_page_url = data.prev_page_url;
                    this.current_page = data.current_page;
                    this.first_page_url = '/api/api/all-video-data?page=1';
                    this.last_page_url = '/api/api/all-video-data?page=' + this.last_page;
                    this.setPageNumbers();
                }.bind(this));
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
            }


        }

    }

</script>