<template>
    <div class="table-responsive">
        <table :id="table_container" class="table dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
    </div>
</template>

<script>
    import { EventBus } from '../EventBus';
    import langs from '../mixins/langs.js';
    export default {
        mixins: [ langs ],
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

                // $('#' + this.table_container + ' tbody').on('click','.edit',function(event){
                //     let row = $(event.target).parents('tr');    
                               
                //     if(row.hasClass('child'))
                //         row = row.prev();
                //     let id = this.datatable.row( row ).data().id;

                //     axios.post(
                //             this.urlDetail,
                //             { id: id })
                //         .then(response => {

                //             let t = $('form').offset().top;

                //             $("html, body").animate({
                //                 scrollTop: t
                //             }, 500);

                //             this.$parent.$emit('openForm',true);
                //             this.$parent.$emit('edit',response.data);
                //     }).catch(error => {
                //     });
                // }.bind(this));

                // $('#' + this.table_container + ' tbody').on('click','.delete',function(event){
                //    let row = $(event.target).parents('tr');    
                               
                //     if(row.hasClass('child'))
                //         row = row.prev();
                //     let id = this.datatable.row( row ).data().id;
                //     let data = {
                //         type : 4,
                //         title: "¿Estás seguro?",
                //         msg: "Una vez eliminado no se podrá recuperar",
                //         url: this.urlDelete,
                //         id: id
                //     };
                    
                //     this.$parent.alertMsg(data);
                // }.bind(this));
            }
        },
    }
</script>
