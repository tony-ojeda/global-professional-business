<template>
    <form class="form form-vertical" @submit.prevent="formController($event,url)">
        <div class="form-body">
            <div class="row">
                <input type="hidden" v-model="model.id" name="id">
                <div class="col-12">
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
                <div class="col-12">
                    <button type="submit" class="btn btn-primary mr-1 mb-1">Registrar</button>
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
            }
        },
        data() {
            return {
                model: {
                    id: null,
                    name: ''
                }
            }
        },
        created() {
            EventBus.$on('clearForm',() => this.clearModel());
        },
        methods: {
            clearModel: function() {
                this.model = {
                    id: null,
                    name: ''
                }
                this.clearErrors(1);
            }
        },
    }
</script>

<style>

</style>