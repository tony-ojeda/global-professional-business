import { EventBus } from '../EventBus';
import swalMessages from './swalMessages';
export default {
    mixins: [swalMessages],
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
            let target = $(event.target);
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
                EventBus.$emit('refresh');
                this.alertMsg( response.data );
                
            }).catch(error => {
                EventBus.$emit('loading',false);
                let obj = error.response.data.errors;
                let cont = 0;
                $.each(obj, function(i, item) {
                    let c_target = target.find("." + i + "-errors");
                    if(cont == 0)
                    {
                        c_target.prev().focus();
                    }
                    c_target.prev().addClass('is-invalid');
                    c_target.html(item);
                    cont++;
                });
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