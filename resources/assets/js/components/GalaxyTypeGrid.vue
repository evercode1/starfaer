<template>

    <div class="row">



        <h1 class="flow-text grey-text text-darken-1">GalaxyType</h1>

            <search-box></search-box>

            <div class="right">

                <grid-count></grid-count>

            </div>



            <section class="mt-20">


                <div class="row">

                    <table>

                        <table-head></table-head>

                        <tbody>

                        <tr v-for="row in gridData">

                            <td>

                                   {{ row.Id }}

                            </td>

                            <td>

                                <a v-bind:href="'/galaxy-type/' + row.Id"> {{ row.Name }}</a>

                            </td>

                            <td>

                                {{ showActive(row.Active) }}

                            </td>

                            <td>

                                {{ showFeatured(row.Featured) }}

                            </td>



                            <td>

                                   {{ row.Created }}

                            </td>

                            <td >

                                <a v-bind:href="'/galaxy-type/' + row.Id + '/edit'">

                                <button type="button" class="waves-effect waves-light btn mt-5">

                                        Edit

                                </button>

                                </a>


                                <button class="waves-effect waves-light btn mt-5"
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

            gridData.loadData('/api/galaxy-type-data', this);

        },
        data: function () {
            return {
                query: '',
                gridColumns: ['Id', 'Name', 'Active', 'Featured', 'Created'],
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
                sortOrder: 1,
                sortKey: 'id',
                createUrl: '/galaxy-type/create',
                showCreateButton: true
            }
        },

        methods: {

            sortBy: function (key){
                this.sortKey = key;
                this.sortOrder = (this.sortOrder == 1) ? -1 : 1;
                this.getData(1);
            },

            search: function(query){
                this.getData(query);
            },


            getData:  function(request){

                gridData.getQueryData(request, '/api/galaxy-type-data', this);

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


            showFeatured: function(featured){

                return featured == 1 ? 'Yes'  : 'No';

            },

            showActive: function(active){

                return active == 1 ? 'Yes'  : 'No';

            },

            confirmDelete: function(id){

                if(confirm("Are you sure you want to delete?")){

                    axios.post('/galaxy-type-delete/' + id)
                            .then(response => {

                                gridData.loadData('/api/galaxy-type-data', this);

                            });


                }



            }


        }

    }

</script>