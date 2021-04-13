<template>
    <form id="contact-form" @submit.prevent="formController(url, $event)">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Nombre de la empresa</label>
                    <input type="text" class="form-control" id="business_name" name="business_name" v-model="model.business_name">
                    <div id="business_name-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Nombre completo</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" v-model="model.full_name">
                    <div id="full_name-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Dirección de correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" v-model="model.email">
                    <div id="email-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Número de teléfono</label>
                    <input type="phone" class="form-control" id="phone" name="phone" v-model="model.phone">
                    <div id="phone-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>URL de su empresa</label>
                    <input type="text" class="form-control" id="website" name="website" v-model="model.website">
                    <div id="website-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Mensaje</label>
                    <textarea class="form-control" id="message" name="message" rows="3" v-model="model.message"></textarea>
                    <div id="message-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>País</label>
                    <select class="form-control" id="country" name="country" v-model="model.country">
                        <option value="">Seleccionar</option>
                        <option v-for="country in countries" :value="country.name" v-bind:key="country.id">{{ country.name }}</option>
                    </select>
                    <div id="country-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Tipo de consulta:</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Publicidad" id="consulta01" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta01">
                        Publicidad
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Solicitudes de suscripción" id="consulta02" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta02">
                        Solicitudes de suscripción
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Publicidad Correo electrónico" id="consulta03" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta03">
                        Publicidad Correo electrónico
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Verificación del perfil" id="consulta04" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta04">
                        Verificación del perfil
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Actualización del perfil" id="consulta05" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta05">
                        Actualización del perfil
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Eliminación de perfil" id="consulta06" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta06">
                        Eliminación de perfil
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Interés Página web" id="consulta07" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta07">
                        Interés Página web
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Consulta General" id="consulta08" v-model="model.request_types" name="request_types[]">
                    <label class="form-check-label" for="consulta08">
                        Consulta General
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
                submitText: 'Enviar',
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
                this.submitText = 'Enviando...'

                var target = $(event.target);
                var url = url;
                var fd = new FormData(event.target);

                axios.post(url, fd, { headers: {
                        'Content-type': 'application/x-www-form-urlencoded',
                    }
                }).then(response => {
                    $(event.target).find('button').attr('disabled', false);
                    this.submitText = 'Enviar';
                    this.successMessage = 'Formulario enviado correctamente.';
                    this.clearModel();
                }).catch(error => {
                    $(event.target).find('button').attr('disabled', false);
                    this.submitText = 'Enviar';
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
