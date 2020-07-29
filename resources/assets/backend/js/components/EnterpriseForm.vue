<template>
     <div class="col-12 col-md-6">
        <form class="form form-vertical" @submit.prevent="formController($event,url)">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Datos generales</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <input type="hidden" v-model="model.id" name="id">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="category_id">Categoría</label>
                                        <select
                                            id="category_id" 
                                            class="form-control" 
                                            name="category_id" 
                                            v-model="model.category_id"
                                        >
                                            <option value="" hidden>Seleccione una categoría</option>
                                            <option :value="item.id" v-for="(item,index) in categories" :key="index">{{ item.name }}</option>
                                        </select>
                                        <div class="invalid-feedback category_id-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input 
                                            type="text" 
                                            id="name" 
                                            class="form-control" 
                                            name="name" 
                                            placeholder="Nombre"
                                            v-model="model.name"
                                        >
                                        <div class="invalid-feedback name-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input 
                                            type="text" 
                                            id="website" 
                                            class="form-control" 
                                            name="website" 
                                            placeholder="Website"
                                            v-model="model.website"
                                        >
                                        <div class="invalid-feedback website-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Teléfono</label>
                                        <input 
                                            type="text" 
                                            id="phone" 
                                            class="form-control" 
                                            name="phone" 
                                            placeholder="Teléfono"
                                            v-model="model.phone"
                                        >
                                        <div class="invalid-feedback phone-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="form-group">
                                        <label for="details">Detalles</label>
                                        <input 
                                            type="text" 
                                            id="details" 
                                            class="form-control" 
                                            name="details" 
                                            placeholder="Detalles"
                                            v-model="model.details"
                                        >
                                        <div class="invalid-feedback details-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="form-group">
                                        <label for="schedule">Horario</label>
                                        <input 
                                            type="text" 
                                            id="schedule" 
                                            class="form-control" 
                                            name="schedule" 
                                            placeholder="Horario"
                                            v-model="model.schedule"
                                        >
                                        <div class="invalid-feedback schedule-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1" v-if="!model.id">Registrar</button>
                                    <button type="submit" class="btn btn-primary mr-1 mb-1" v-else>Actualizar</button>
                                    <button type="button" class="btn btn-outline-warning mr-1 mb-1" @click="clearModel()">Limpiar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubicación</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">

                                </div>
                                <div class="col-sm-6 col-12">
                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="iconLeft3" 
                                            placeholder="Dirección" 
                                            @click="openModal()"
                                            autocomplete="off"
                                            readonly
                                        >
                                        <div class="form-control-position">
                                            <i class="feather icon-map-pin"></i>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import { EventBus } from '../EventBus';
    import formController  from '../mixins/formController';
    import formErrors from '../mixins/formErrors';
    export default {
        mixins: [ formErrors, formController ],
        props: {
            url: {
                type: String,
                default: ''
            },
            categories: {
                type: Array,
                default: function() {
                    return []
                }
            }
        },
        data() {
            return {
                model: {
                    id: null,
                    category_id: '',
                    name: '',
                    website: '',
                    phone: '',
                    details: '',
                    schedule: '',
                }
            }
        },
        created() {
            EventBus.$on('clearForm',() => this.clearModel());

            EventBus.$on('edit',(data) => {
                this.model = data.model;
            });
        },
        methods: {
            clearModel: function() {
                this.model = {
                    id: null,
                    category_id: '',
                    name: '',
                    website: '',
                    phone: '',
                    details: '',
                    schedule: '',
                }
                this.clearErrors(1);
            },
            openModal: function()
            {
                $('#enterpriseAddressModal').modal('show');
            }
        },
    }
</script>

<style>

</style>