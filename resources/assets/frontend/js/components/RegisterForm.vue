<template>
    <form id="login-form" @submit.prevent="formController(url, $event)">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Nombre</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        v-model="model.name"
                        autocomplete="off"
                    >
                    <div id="name-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        v-model="model.email"
                        autocomplete="off"
                    >
                    <div id="email-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Contraseña</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        v-model="model.password"
                    >
                    <div id="password-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Confirmar Contraseña</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password_confirmation"
                        name="password_confirmation"
                        v-model="model.password_confirmation"
                    >
                    <div id="password_confirmation-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </form>
</template>

<script>
    import { EventBus } from '../EventBus';

    export default {
        props: {
            url: {
                type: String,
                default: ''
            },
        },
        data() {
            return {
                model: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
            }
        },
        created() {
            this.clearModel();
        },
        methods: {
            clearModel: function() {
                this.model = {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                }
            },
            formController: function(url, event) {
                var vm = this;

                $(event.target).find('button').attr('disabled', true);

                var target = $(event.target);
                var url = url;
                var fd = new FormData(event.target);

                axios.post(url, fd, { headers: {
                        'Content-type': 'application/x-www-form-urlencoded',
                    }
                }).then(response => {
                    $(event.target).find('button').attr('disabled', false);
                    this.clearModel();
                    this.$parent.alertMsg( response.data );
                }).catch(error => {
                    $(event.target).find('button').attr('disabled', false);

                    console.log(error.response);
                    var obj = error.response.data.errors;
                    $('#contact-form').animate({
                        scrollTop: 0
                    }, 500, 'swing');
                    $.each(obj, function(i, item) {
                        let c_target = target.find("#" + i + "-error");
                        if (!c_target.attr('data-required')) {
                            let p = c_target.prev();
                            p.addClass('is-invalid');
                        } else {
                            c_target.css('display', 'block');
                        }
                        c_target.html(item);
                    });
                });
            },
        },
    }
</script>
