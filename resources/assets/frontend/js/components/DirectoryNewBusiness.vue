<template>
    <form @submit.prevent="formController(url, $event)">
        <div class="row">
            <div class="col-12">
                <h4>Datos generales</h4>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group">
                    <label>Razón Social</label>
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
            <div class="col-12 col-lg-4">
                <div class="form-group">
                    <label>Website</label>
                    <input
                        type="text"
                        class="form-control"
                        id="website"
                        name="website"
                        v-model="model.website"
                    >
                    <div id="website-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group">
                    <label>Categoría</label>
                    <select
                        class="form-control"
                        id="category_id"
                        name="category_id"
                        v-model="model.category_id"
                    >
                        <option value="">Seleccionar</option>
                        <option v-for="category in categories" v-bind:key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                    <div id="category_id-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group">
                    <label>Teléfono</label>
                    <input
                        type="tel"
                        class="form-control"
                        id="phone"
                        name="phone"
                        v-model="model.phone"
                    >
                    <div id="phone-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        v-model="model.email"
                    >
                    <div id="email-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group">
                    <label>Horario</label>
                    <input
                        type="text"
                        class="form-control"
                        id="schedule"
                        name="schedule"
                        v-model="model.schedule"
                    >
                    <div id="schedule-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Detalles</label>
                    <input
                        type="text"
                        class="form-control"
                        id="details"
                        name="details"
                        v-model="model.details"
                    >
                    <div id="details-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group">
                    <label>Imagen de Perfil</label>
                    <input
                        type="file"
                        class="form-control"
                        id="portrait_image"
                        name="portrait_image"
                    >
                    <div id="portrait_image-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row" v-if="1 == 2">
            <div class="col-12">
                <h4>Dirección</h4>
            </div>
            <div class="col-12 mb-2">
                <div class="form-group">
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="enterprise_address"
                        id="enterprise_address"
                        autocomplete="off"
                        v-on:keypress.enter.prevent=""
                        placeholder="Buscar una dirección"
                        v-model="current_address"
                    >
                </div>
            </div>
            <div class="col-12">
                <div id="map"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4>Tipo de Plan</h4>
            </div>
        </div>
        <div id="plans" class="row choose-plan">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="plan plan-free selected" data-plan="free">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Gratis
                            </div>
                            <div class="plan--header-price">

                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Incluye:
                            </div>
                            <ul class="plan--include-list">
                                <li>1 mes gratis</li>
                                <li>Publica tu negocio por 1 mes gratis</li>
                                <li class="disabled">Tu negocio en las primeras búsquedas</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="plan plan-basic" data-plan="basic">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Básico
                            </div>
                            <div class="plan--header-price">
                                25$
                                <small>mensuales</small>
                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Incluye:
                            </div>
                            <ul class="plan--include-list">
                                <li>Publica tu negocio y obtén 1 mes gratis</li>
                                <li class="disabled">Tu negocio en las primeras búsquedas</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="plan plan-premium" data-plan="premium">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Premium
                            </div>
                            <div class="plan--header-price">
                                200$
                                <small>anuales</small>
                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Incluye:
                            </div>
                            <ul class="plan--include-list">
                                <li>Publica tu negocio y obtén 1 mes gratis</li>
                                <li>Tu negocio en las primeras búsquedas</li>
                            </ul>
                        </div>
                    </div>
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
    import swalMessages from "../mixins/swalMessages";

    export default {
        mixins: [swalMessages],
        props: {
            url: {
                type: String,
                default: ''
            },
            categories: {
                type: Array,
                default: []
            }
        },
        data() {
            return {
                model: {
                    name: '',
                    website: '',
                    category_id: '',
                    phone: '',
                    email: '',
                    schedule: '',
                    details: '',
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
                    website: '',
                    category_id: '',
                    phone: '',
                    email: '',
                    schedule: '',
                    details: '',
                }
            },
            formController: function(url, event) {
                var vm = this;

                $(event.target).find('button').attr('disabled', true);

                var target = $(event.target);
                var url = url;
                var fd = new FormData(event.target);
                fd.append('membership_id',3);

                axios.post(url, fd, { headers: {
                        'Content-type': 'application/x-www-form-urlencoded',
                    }
                }).then(response => {
                    $(event.target).find('button').attr('disabled', false);
                    this.clearModel();
                    this.alertMsg( response.data );
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
