<template>
    <form id="contact-form" @submit.prevent="formController(url, $event)">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>COMPANY NAME</label>
                    <input type="text" class="form-control" id="business_name" name="business_name" v-model="model.business_name">
                    <div id="business_name-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>FULL NAME</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" v-model="model.full_name">
                    <div id="full_name-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>EMAIL ADDRESS</label>
                    <input type="email" class="form-control" id="email" name="email" v-model="model.email">
                    <div id="email-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>PHONE NUMBER</label>
                    <input type="phone" class="form-control" id="phone" name="phone" v-model="model.phone">
                    <div id="phone-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>YOUR COMPANY URL</label>
                    <input type="text" class="form-control" id="website" name="website" v-model="model.website">
                    <div id="website-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>MESSAGE</label>
                    <textarea class="form-control" id="message" name="message" rows="3" v-model="model.message"></textarea>
                    <div id="message-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>COUNTRY</label>
                    <select class="form-control" id="country" name="country" v-model="model.country">
                        <option value="">-- Select --</option>
                        <option v-for="country in countries" :value="country.name" v-bind:key="country.id">{{ country.name }}</option>
                    </select>
                    <div id="country-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>QUERY TYPE:</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Advertising" id="consulta01" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta01">
                        Advertising
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Subscription requests" id="consulta02" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta02">
                        Subscription requests
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Advertising Email" id="consulta03" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta03">
                        Advertising Email
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Profile verification" id="consulta04" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta04">
                        Profile verification
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Profile update" id="consulta05" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta05">
                        Profile update
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Profile deletion" id="consulta06" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta06">
                        Profile deletion
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Interest Website" id="consulta07" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta07">
                        Interest Website
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="General Consultation" id="consulta08" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta08">
                        General Consultation
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">{{ submitText }}</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="success-message" v-if="successMessage">{{ successMessage }}</div>
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
            countries: {
                type: Array,
                default: function() {
                    return []
                }
            }
        },
        data() {
            return {
                model: {
                    business_name: '',
                    full_name: '',
                    email: '',
                    phone: '',
                    website: '',
                    message: '',
                    country: '',
                    request_types: [],
                },
                submitText: 'Send',
                successMessage: '',
            }
        },
        created() {
            this.clearModel();
        },
        methods: {
            clearModel: function() {
                this.model = {
                    business_name: '',
                    full_name: '',
                    email: '',
                    phone: '',
                    website: '',
                    message: '',
                    country: '',
                    request_types: [],
                }
            },
            formController: function(url, event) {
                var vm = this;

                $(event.target).find('button').attr('disabled', true);
                this.submitText = 'Sending...'

                var target = $(event.target);
                var url = url;
                var fd = new FormData(event.target);

                axios.post(url, fd, { headers: {
                        'Content-type': 'application/x-www-form-urlencoded',
                    }
                }).then(response => {
                    $(event.target).find('button').attr('disabled', false);
                    this.submitText = 'Send';
                    this.successMessage = 'Formulario enviado correctamente.';
                    this.clearModel();
                }).catch(error => {
                    $(event.target).find('button').attr('disabled', false);
                    this.submitText = 'Send';
                    this.successMessage = 'Hubo un error al enviar. Inténtelo nuevamente.';

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

<style lang="scss" scoped>

</style>
