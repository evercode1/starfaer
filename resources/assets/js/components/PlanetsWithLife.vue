<template>

    <div class="row">



        <h1 class="flow-text grey-text text-darken-1">Planets With Life</h1>

            <search-box></search-box>

            <div class="right">

                <grid-count></grid-count>

            </div>



            <section class="mt-20">


                <div class="row">

                    <table>

                        <all-table-head></all-table-head>

                        <tbody>

                        <tr v-for="row in gridData">

                            <td>

                                   {{ row.Id }}

                            </td>

                            <td>

                                <a v-bind:href="'/planet/' + row.Id + '-' + row.Slug" target="_blank"> {{ row.Name }}</a>

                            </td>



                            <td>

                                <a v-bind:href="'/moon-list/' + row.Id" target="_blank">{{ row.Moon }}</a>

                            </td>



                            <td>

                                <a v-bind:href="'/star/' + row.Starid + '-' + row.Slug" target="_blank"> {{ row.Starname }}</a>

                            </td>

                            <td>

                                {{ row.Zone }}

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
                     'all-table-head' : require('./AllTableHead')},

        mounted: function () {

            gridData.loadData('/api/planets-with-life-data', this);

        },
        data: function () {
            return {
                query: '',
                gridColumns: ['Id', 'Planet Name', 'Moons', 'Orbits Star', 'Zone'],
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
                createUrl: '/planet/create',
                showCreateButton: false
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

                gridData.getQueryData(request, '/api/planets-with-life-data', this);

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

            formatLifePresent:  function(life){


                return life == 1 ? 'Yes' : 'No';


            }


        }

    }

</script>