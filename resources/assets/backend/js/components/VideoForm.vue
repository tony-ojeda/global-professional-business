<template>
    <form class="form form-vertical" @submit.prevent="formController($event,url)">
        <div class="form-body">
            <div class="row">
                <input type="hidden" v-model="model.id" name="id">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="video_1">Video 1</label>
                        <input 
                            type="text" 
                            id="video_1" 
                            class="form-control" 
                            name="video_1" 
                            placeholder="Nombre"
                            v-model="model.video_1"
                        >
                        <div class="invalid-feedback video_1-errors"></div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="video_2">Video 2</label>
                        <input 
                            type="text" 
                            id="video_2" 
                            class="form-control" 
                            name="video_2" 
                            placeholder="Nombre"
                            v-model="model.video_2"
                        >
                        <div class="invalid-feedback video_2-errors"></div>
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
            videos: {
                type: Object,
                default: function() {
                    return {}
                }
            }
        },
        data() {
            return {
                model: {
                    id: null,
                    video_1: '',
                    video_2: ''
                }
            }
        },
        created() {
            EventBus.$on('clearForm',() => this.clearModel());

            EventBus.$on('edit',(data) => {
                this.model = data.model;
            });

            this.model = this.videos;
        },
        methods: {
            clearModel: function() {
                this.model.video_1 = '';
                this.model.video_2 = '';
                this.clearErrors(1);
            }
        },
    }
</script>

<style>

</style>