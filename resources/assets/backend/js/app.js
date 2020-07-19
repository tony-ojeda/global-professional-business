require('./bootstrap');

window.Vue = require('vue');

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// console.log(window.Vue.options.components)
// import Swal from 'sweetalert2/dist/sweetalert2.js';
// import 'sweetalert2/src/sweetalert2.scss';


const app = new Vue({
    el: '#main',
    data() {
        return {
           
        }
    },
    created: function () {

       
    },
    methods: {
        activeContainer: function (event, _p = null) {
            let p = null;
            if (_p == null) {
                let elem = $(event.target);
                p = elem.parents('.minimizable_container');
            } else {
                p = _p;
            }

            p.toggleClass('active');
            p.find('.minimizable').toggle(250);
        },
        formContainerToggle: function(open = false)
        {
            if(open)
            {
                if($('.form-container').css('display') != 'none')
                    return;
            }
            this.show_form = !this.show_form;
            $('.form-container').toggle(500);

        },
        formController: function (url, event, extra_info = null,avoid = null) {
            var target = $(event.target);
            var url = url;
            var fd = new FormData(event.target);
            if (extra_info != null)
                fd.append('extra_info', JSON.stringify(extra_info));
            if (avoid != null) {
                avoid.forEach(element => {
                    fd.delete(element);
                });
            }
            console.log('formulario ',url);
            this.$emit('loading', true);
            axios.post(url, fd,
                {
                    headers: {
                        'Content-type': 'application/x-www-form-urlencoded',
                    }
                }).then(response => {

                    console.log(response.data);
                    if (response.data.type == 100) {
                        console.log(response.data);
                        return;
                    } else {
                        this.alertMsg(response.data);
                    }
                    this.$emit('loading', false);

                }).catch(error => {
                    this.$emit('loading', false);
                    console.log(error);
                    console.log(error.response);
                    console.log(error.response.data);
                    var obj = error.response.data.errors;
                    var cont = 0;
                    $.each(obj, function (i, item) {
                        let c_target = target.find("." + i + "-error");
                        if (cont == 0) {
                            c_target.prev().focus();
                        }
                        c_target.prev().addClass('is-invalid');
                        c_target.html(item);
                        cont++;
                    });
                });
        },
        clearErrorMsg: function (event) {
            let elem = $(event.target);
            // if (elem.attr('type') == "file")
                // elem = elem.next();

            if (elem.hasClass('is-invalid')) {
                elem.removeClass('is-invalid');
                let n = elem.next();
                n.html('');
            }

        },
        clearErrorMsg2: function (event) {
            let elem = $(event.target).parent();

            if (elem.hasClass('is-invalid')) {
                elem.removeClass('is-invalid');
                let n = elem.next();
                n.html('');
            }

        },
        clearChks: function () {
            let form = $('form');

            $('form input[type=checkbox]').each(function (index, el) {
                let p = $(el).parent();

                if (p.hasClass('is-invalid')) {
                    p.removeClass('is-invalid');
                    let n = p.next();
                    n.html('');
                }
            });
        },
        clearErrors: function () {
            $('.errors').each(function (index, el) {
                let elem = $(el);
                elem.text("");

                let prev = elem.prev(".is-invalid");

                if (prev.length == 0)
                    prev = elem.prev().prev(".is-invalid");


                if (prev.length > 0)
                    prev.removeClass('is-invalid');

            });
        },
        alertMsg: function(data)
        {
            let t = this;
           
            switch (data.type) {
                case 1:
                    Swal.fire({
                        icon: 'success',
                        title: data.title,
                        text: data.msg,
                        showConfirmButton: true,
                    }).then((result) => {
                        // $this.$emit('showThanks');  
                        if(data.reload)
                        {
                            location.reload();
                            return;
                        }
                        if(!data.clear)
                        {                           
                            console.log(data);
                            t.$emit("refresh", false);
                            if(data.url !="update"){
                                t.$emit("clear", false);
                                document.getElementsByTagName("form")[0].reset();
                                $(".custom-file-label").text('Elije un archivo');
                                let p = $('form').parents('.minimizable_container');
                                t.activeContainer(null, p);
                            }else {
                                console.log('no entro');
                            }
                        }
                    })
                break;
                case 2:
                    Swal.fire({
                        icon: 'warning',
                        title: data.title,
                        text: data.msg,
                        showConfirmButton: true,
                    })
                break;
                case 3:
                    Swal.fire({
                        icon: 'success',
                        title: data.title,
                        text: data.msg,
                        showConfirmButton: true,
                        timer: 2000,
                    }).then((result) => {
                        window.location = data.url;
                    })
                break;
                case 4:
                    Swal.fire({
                        icon: "warning",
                        title: data.title,
                        text: data.msg,
                        showCancelButton: true,
                        showConfirmButton: true,
                        confirmButtonText: 'Sí, eliminar!',
                        cancelButtonText: ' Cancelar',
                    }).then(function (result) {
                        if (result.value) {
                            axios.post(data.url, { id: data.id }).then(response => {
                                console.log(response.data);
                                Swal.fire({
                                    icon: "success",
                                    title: response.data.title,
                                    text: response.data.msg,
                                    confirmButtonText: "OK",
                                    timer: 1000,
                                }).then(() => {
                                    t.$emit("refresh", false);
                                })

                            }).catch(error => {
                                console.log(error.response.data);
                            });

                        }
                    });
                break;
                case 5:
                    Swal.fire({
                        icon: "warning",
                        title: data.title,
                        text: data.msg,
                        showCancelButton: true,
                        showConfirmButton: true,
                        confirmButtonText: 'Sí, Actualizar!',
                        cancelButtonText: ' Cancelar',
                    }).then(function (result) {
                        if (result.value) {                          
                            axios.post(data.url, { id: data.id,option: data.option,date:data.date,time:data.time ,discount:data.discount}).then(response => {
                                
                                Swal.fire({
                                    icon: "success",
                                    title: response.data.title,
                                    text: response.data.msg,
                                    confirmButtonText: "OK",
                                    timer: 1000,
                                }).then(() => {
                                    t.$emit("refresh", data.currentSelect);
                                    t.$emit("closeModal", false);
                                })

                            }).catch(error => {
                                console.log(error.response.data);
                            });

                        }
                    });
                break;
                default:
                    break;
            }
        }
    }
});
