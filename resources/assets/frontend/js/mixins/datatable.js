import { EventBus } from '../EventBus';
import swalMessages from './swalMessages';
export default {
    mixins: [ swalMessages ],
    data() {
        return {
            
        }
    },
    methods: {
        dataTableGetId: function(dt,row) {
            if(row.hasClass('child'))
                row = row.prev();

            let id = dt.row( row ).data().id;

            return id;
        },
        dataTableGetField: function(dt,row,field) {
            if(row.hasClass('child'))
                row = row.prev();

            return dt.row( row ).data()[field];
        },
        dataTableAddCommonEvents: function(table_container) {
            $('#' + table_container + ' tbody')
            .on('click','.edit', (event) => {
                let row = $(event.target).parents('tr');    
                let id = this.dataTableGetId(this.datatable,row);

                axios.post(
                        this.urlDetail,
                        { id: id }
                ).then(response => {
                    // EventBus.$emit('openForm',true);
                    EventBus.$emit('edit',response.data);
                }).catch(error => {
                });
            })
            .on('click','.delete', (event) => {
                let row = $(event.target).parents('tr');    
                let id = this.dataTableGetId(this.datatable,row);

                let data = {
                    type : 4,
                    title: "¿Estás seguro?",
                    msg: "Una vez eliminado no se podrá recuperar",
                    url: this.urlDelete,
                    id: id
                };
                    
                this.alertMsg(data);
            })

        }
    },
}
