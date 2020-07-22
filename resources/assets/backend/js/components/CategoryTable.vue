<template>
    <div class="table-responsive">
        <table :id="table_container" class="table dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
    </div>
</template>

<script>
    import { EventBus } from '../EventBus';
    import langs from '../mixins/langs.js';
    import datatable from '../mixins/datatable.js';
    export default {
        mixins: [ langs, datatable ],
        props: {
            table_container: {
                type: String,
                default: 'current_table'
            },
            urlList: {
                type: String,
                default: ''
            },
            urlDetail: {
                type: String,
                default: ''
            },
            urlDelete: {
                type: String,
                default: ''
            },
           
        },
        data() {
            return {
                datatable: undefined,
            }
        },
        components: {
        },
        mounted() {
            EventBus.$on('refresh',() => {
                this.datatable.ajax.reload();
            })

            this.fillTable();
        },
        methods: {
            fillTable: function() {
                let current_url = this.urlList;
                let token = document.head.querySelector('meta[name="csrf-token"]').content;
                let lang = this.datatable_lang;
                this.datatable = $('#' + this.table_container).DataTable( {
                    language: lang,
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    scrollY: 200,
                    searching: false,
                    ajax: {
                        url: current_url,
                        type: 'POST',
                        data: {
                            _token: token,
                        }
                    },
                    columns: [
                        { data: 'n', title: "N°", width: 20, sortable: false },
                        { data: 'id', title: "id", visible: false, sortable: false },
                        { data: "name", title: "Categoría", sortable: false },
                        { 
                            data: null, 
                            title: 'Acciones',
                            width: 100,
                            sortable: false,
                            render: function ( data, type, row ) {
                                return `
                                <button class='btn btn-sm btn-success btn-icon btn-icon-md edit' title='Editar'>
                                    <i class='fa fa-pencil'></i>
                                </button>
                                <button class='btn btn-sm btn-warning btn-icon btn-icon-md delete' title='Eliminar'>
                                    <i class='fa fa-trash-o'></i>
                                </button>
                                `;
                            } 
                        },
                    ]
                });

                this.dataTableAddCommonEvents(this.table_container);
            }
        },
    }
</script>
