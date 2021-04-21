require('./bootstrap');

window.Vue = require('vue');

import EventBus from './EventBus';
import Swal from 'sweetalert2';

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
        alertMsg: function(data) {
            if (data.type == 0) {
                return;
            } else if (data.type == 1) {
                Swal.fire({
                    title: data.title,
                    text: data.msg,
                    icon: "success",
                    // timer: 2000,
                    heightAuto: false,
                })
            } else if (data.type == 2) {
                Swal.fire({
                    title: data.title,
                    text: data.msg,
                    icon: "warning",
                    heightAuto: false,
                })
            } else if (data.type == 3) {
                Swal.fire({
                    title: data.title,
                    text: data.msg,
                    icon: "success",
                    timer: 2000,
                    heightAuto: false
                }).then((confirmed) => {
                    window.location = data.url;
                })
            } else if (data.type == 4) {
                Swal.fire({
                    title: data.title,
                    text: data.msg,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar!',
                    heightAuto: false
                }).then(function(result) {
                    if (result.value) {
                        axios.post(data.url,{id: data.id}).then(response => {
                            Swal.fire({
                                title: response.data.title,
                                text: response.data.msg,
                                icon: "success",
                                confirmButtonText: "OK",
                                heightAuto: false,
                            });
                            EventBus.$emit('refresh_table');
                        }).catch(error => {
                            console.log(error.response.data);
                        });
                    }
                });
            }  else if (data.type == 5) {
                Swal.fire({
                    title: data.title,
                    text: data.msg,
                    icon: "error",
                    heightAuto: false,
                })
            }
        },
    }
});
