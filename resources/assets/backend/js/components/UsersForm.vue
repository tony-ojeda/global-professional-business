<template>
    <form class="form form-vertical" @submit.prevent="formController($event,url)">
        <div class="form-body">
            <div class="row">
                <input type="hidden" v-model="model.id" name="id">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="name">Rol</label>
                        <select 
                            name="role_id" 
                            id="role_id"
                            class="form-control"
                            v-model="model.role_id"
                        >
                            <option value="" hidden>Seleccionar</option>
                            <option :value="item.id" v-for="(item,index) in roles" :key="index">{{ item.name }}</option>
                        </select>
                        <div class="invalid-feedback role_id-errors"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
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
                        <label for="email">Email</label>
                        <input 
                            type="text" 
                            id="email" 
                            class="form-control" 
                            name="email" 
                            placeholder="Email"
                            v-model="model.email"
                        >
                        <div class="invalid-feedback email-errors"></div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="name">Clave</label>
                        <input 
                            type="password" 
                            id="password" 
                            class="form-control" 
                            name="password" 
                            placeholder="Clave"
                            v-model="model.password"
                        >
                        <div class="invalid-feedback password-errors"></div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary mr-1 mb-1" v-if="!model.id">Registrar</button>
                    <button type="submit" class="btn btn-primary mr-1 mb-1" v-else>Actualizar</button>
                    <button type="button" class="btn btn-outline-warning mr-1 mb-1" @click="clearModel()">Limpiar</button>
                </div>
            </div>
        </div>
    </form>
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
            roles: {
                type: Array,
                default: function() {
                    return [];
                }
            }
        },
        data() {
            return {
                model: {
                    id: null,
                    name: '',
                    email: '',
                    role_id: '',
                    password: ''
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
                    name: '',
                    email: '',
                    role_id: '',
                    password: ''
                }
                this.clearErrors(1);
            }
        },
    }
</script>

<style>
</style>