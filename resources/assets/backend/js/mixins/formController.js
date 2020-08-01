import { EventBus } from '../EventBus';
import swalMessages from './swalMessages';
export default {
    mixins: [ swalMessages ],
    components: {
    },
    props: {
    },
    data() {
        return {
        }
    },
    created() {
    },
    methods: {
        formController: function(event,url,extra_info = null) 
        {
            let fd = new FormData(event.target);
            if(extra_info != null)
                fd.append('extra_info',JSON.stringify(extra_info));
                
            EventBus.$emit('loading',true);
            axios.post(url,fd,
                        { headers: {
                            'Content-type': 'application/x-www-form-urlencoded',
                        }
                    }).then(response => {
                EventBus.$emit('loading',false );
                EventBus.$emit('clearForm');
                
                this.alertMsg( response.data );
                
            }).catch(error => {
                EventBus.$emit('loading',false);
                let obj = error.response.data.errors;
                this.showErrors(event.target,obj);
            });
        },
        clearErrorMsg: function(event)
        {
            let elem = $(event.target);
            if(elem.hasClass('is-invalid'))
            {
                elem.removeClass('is-invalid');
                elem.next().html('');
            }
        },
    },
}