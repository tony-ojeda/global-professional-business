<template>
    <form action="dashboard-analytics" @submit.prevent="formController($event,url)" >
        <fieldset class="form-label-group form-group position-relative has-icon-left">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" v-model="model.email">
            <div class="invalid-feedback email-errors"></div>
            <div class="form-control-position">
                <i class="feather icon-user"></i>
            </div>
            <label for="email">Email</label>
        </fieldset>

        <fieldset class="form-label-group position-relative has-icon-left">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" v-model="model.password">
            <div class="invalid-feedback password-errors"></div>
            <div class="form-control-position">
                <i class="feather icon-lock"></i>
            </div>
            <label for="password">Password</label>
        </fieldset>
        <!-- <div class="form-group d-flex justify-content-between align-items-center">
            <div class="text-left">
                <fieldset class="checkbox">
                <div class="vs-checkbox-con vs-checkbox-primary">
                    <input type="checkbox">
                    <span class="vs-checkbox">
                    <span class="vs-checkbox--check">
                        <i class="vs-icon feather icon-check"></i>
                    </span>
                    </span>
                    <span class="">Remember me</span>
                </div>
                </fieldset>
            </div>
            <div class="text-right"><a href="auth-forgot-password" class="card-link">Forgot Password?</a></div>
        </div>
        <a href="auth-register" class="btn btn-outline-primary float-left btn-inline">Register</a> -->
        <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
    </form>
</template>

<script>
    import { EventBus } from '../EventBus';
    import formController from '../mixins/formController';
    import formErrors from '../mixins/formErrors';
    export default {
        mixins: [ formController, formErrors ],
        props: {
            url: {
                type: String,
                default: ''
            }
        },
        data() {
            return {
                model: {
                    email: '',
                    password: ''
                }
            }
        },
        created() {
            EventBus.$on('clearForm',() => this.clearModel());
        },
        methods: {
            clearModel: function() {
                this.model = {
                    email: '',
                    password: ''
                }
                this.clearErrors(1);
            }
        },
    }
</script>

<style>

</style>