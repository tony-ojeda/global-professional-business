<template>
    <form class="form form-vertical" @submit.prevent="formController($event,url)">
        <div class="form-body">
            <div class="row">
                <input type="hidden" v-model="model.id" name="id">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Título</label>
                        <input 
                            type="text" 
                            id="title" 
                            class="form-control" 
                            name="title" 
                            placeholder="Tïtulo"
                            v-model="model.title"
                        >
                        <div class="invalid-feedback title-errors"></div>
                    </div>
                </div>
                
                <div class="col-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="portrait_image">
                                    Imagen de portada
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="portrait_imageTrigger" 
                                    @click="openFile()"
                                    v-model="portrait_image_text"
                                    readonly
                                >
                                <input 
                                    type="file" 
                                    class="form-control collapse" 
                                    name="portrait_image" 
                                    id="portrait_image" 
                                    @change="fileAdded($event)"
                                    accept="image/*"
                                >
                                <div class="invalid-feedback portrait_image-errors"></div>
                                <input type="hidden" id="portrait_image_preview" v-model="model.portrait_image">
                                
                            </div>
                        </div>
                        <div class="col-12 col-md-auto mt-2 mt-md-0" v-if="model.portrait_image != ''">
                            <img :src="model.portrait_image" v-if="model.portrait_image != ''" class="portrait">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="content">Contenido</label>
                        <textarea name="content" class="form-control" v-model="model.content"></textarea>
                        <div class="invalid-feedback content-errors"></div>
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
        components: {
        },
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
                    title: '',
                    portrait_image: '',
                    content: ''
                },
                portrait_image_text: 'Seleccionar un archivo',
           
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
                    title: '',
                    portrait_image: '',
                    content: ''
                }
                this.portrait_image_text = 'Seleccionar una imagen';
                this.clearErrors(1);
            },
            openFile: function() 
            {
                $('#portrait_image').trigger('click');
            },
            fileAdded: function(event)
            {
                const file = event.target.files[0];
                if(!file) {
                    this.portrait_image_text = 'Seleccionar una imagen';
                    return;
                }

                this.portrait_image_text = file.name;
                let reader = new FileReader();
                let t = this;
                reader.onload = function (e) {
                    t.model.portrait_image = e.target.result;
                }
                reader.readAsDataURL(file);
            },
        },
    }
</script>
<style lang="scss" scoped>
    .portrait {
        height: 64px;
        object-fit: cover;
        object-position: center;
        width: 64px;
    }
</style>