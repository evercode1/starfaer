<template>

    <div class="row">



        <h1 class="flow-text grey-text text-darken-1">World Terms</h1>

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

                                <a v-bind:href="'/world-term/' + row.Id + '-' + row.Slug"> {{ row.Name }}</a>

                            </td>

                            <td>

                                <a v-bind:href="'/world-term/' + row.Id + '-' + row.Slug"> {{ row.Phonetic }}</a>

                            </td>

                            <td>

                                <a v-bind:href="'/world-term-type/' + row.Tid"> {{ row.Type }}</a>

                            </td>

                            <td>

                                <a v-bind:href="'/planet/' + row.Pid"> {{ formatName(row.Planet) }}</a>

                            </td>

                            <td>

                                <a v-bind:href="row.Url"> {{ formatName(row.BookTitle) }}</a>

                            </td>

                            <td>

                                {{ formatActive(row.Active) }}

                            </td>

                            <td>

                                   {{ row.Created }}

                            </td>

                            <td >

                                <a v-bind:href="'/world-term/' + row.Id + '/edit'">

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

            gridData.loadData('/api/world-term-data', this);

        },
        data: function () {
            return {
                query: '',
                gridColumns: ['Id', 'Name', 'Phonetic', 'Type', 'Planet', 'First Appears', 'Active', 'Created'],
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
                createUrl: '/world-term/create',
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

                gridData.getQueryData(request, '/api/world-term-data', this);

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

                formatActive: function(active){

                    return  active === 1 ? 'Active' : 'Inactive';

            },

            confirmDelete: function(id){

                if(confirm("Are you sure you want to delete?")){

                    axios.post('/world-term-delete/' + id)
                            .then(response => {

                                gridData.loadData('/api/world-term-data', this);

                            });


                }



            },

            formatName:  function(name){

                const lower = name;

                const upper = lower.charAt(0).toUpperCase() + lower.substring(1);

                return upper;

            }


        }

    }

</script>