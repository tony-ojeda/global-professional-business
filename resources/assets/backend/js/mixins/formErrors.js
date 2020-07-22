export default {
    created() {
    },
    data() {
        return {
        }
    },
    watch: {
        model: {
            handler(newValue) {
                // if(!newValue) return;
                // for (const key in newValue) {
                //     if (newValue.hasOwnProperty(key)) {
                //         const element = newValue[key];
                //         if(element != '') {
                //             let el = $('.' + key + '-errors');
                //             el.css('display','none');
                //             el.prev().removeClass('is-invalid');
                //             el.html('');
                //         }
                //     }
                // }
                this.clearErrors();
            },
            deep: true
        }
    },
    methods: {
        showErrors: function (form,errors) {
            let _form = $(form);
            let cont = 0;
            $.each(errors, function (i, item) {
                let name_error = "." + i + "-errors";
                let c_target = _form.find(name_error);
                if (cont == 0) {
                    c_target.prev().focus();
                }
                c_target.prev().addClass('is-invalid');
                c_target.css('display','block');
                c_target.html(item);
                cont++;
            });
        },
        clearErrors: function(forced = 0) {
            
            for (const key in this.model) {
                if (this.model.hasOwnProperty(key)) {
                    const element = this.model[key];
                    if(element != '' || forced == 1) {
                        let el = $('.' + key + '-errors');
                        el.css('display','none');
                        el.prev().removeClass('is-invalid');
                        el.html('');
                    }
                }
            }
        }
    }
};

