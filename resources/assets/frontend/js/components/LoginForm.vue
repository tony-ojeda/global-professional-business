<template>
    <div class="login-form-content">
        <h1>{{ form_title }}</h1>
        <form id="login-form" @submit.prevent="formController(url, $event)">
            <div class="row">
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
                        <label>Password</label>
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
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
            <div class="row recovery-password">
                <div class="col-12">
                    <a href="#" class="btn btn-ghost" @click.prevent="recoveryPasswordForm()">Forgot your password?</a>
                </div>
            </div>
        </form>
        <form id="recovery-form" class="d-none" @submit.prevent="formController(url_recovery_password, $event)">
            <div class="row">
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
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Reset password</button>
                </div>
            </div>
            <div class="row recovery-password">
                <div class="col-12">
                    <a href="#" class="btn btn-ghost" @click.prevent="loginForm()">← Sign in</a>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import { EventBus } from '../EventBus';

    export default {
        props: {
            url: {
                type: String,
                default: ''
            },
            url_recovery_password: {
                type: String,
                default: ''
            },
        },
        data() {
            return {
                form_title: 'Sign in',
                model: {
                    email: '',
                    password: '',
                },
            }
        },
        created() {
            this.clearModel();
        },
        methods: {
            clearModel: function() {
                this.model = {
                    email: '',
                    password: '',
                }
            },
            recoveryPasswordForm: function() {
                this.form_title = 'Recovery password';
                $('#login-form').addClass('d-none');
                $('#recovery-form').removeClass('d-none');
            },
            loginForm: function() {
                this.form_title = 'Sign in';
                $('#login-form').removeClass('d-none');
                $('#recovery-form').addClass('d-none');
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

                    if ( response.data.error === false ) {
                        this.$parent.alertMsg( response.data );
                    }

                    if ( response.data.error === true ) {
                        let errorResponse = {
                            type: 5,
                            title: 'Error!',
                            msg: response.data.msg,
                        }

                        this.$parent.alertMsg( errorResponse );
                    }
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
