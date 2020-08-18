<template>
    <form class="form form-vertical" @submit.prevent="formController($event,url)">
        <div class="form-body">
            <div class="row">
                <input type="hidden" v-model="model.id" name="id">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="visibleSwitch" name="visible" v-model="model.visible">
                            <label class="custom-control-label" for="visibleSwitch">
                            </label>
                            <span class="switch-label">¿ Visible ?</span>
                        </div>
                        <div class="invalid-feedback name-errors"></div>
                    </div>
                </div>
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
                        <vue-editor 
                            :editorOptions="editorSettings" 
                            useCustomImageHandler 
                            @image-added="manageImage"
                            v-model="model.content" 
                        />
                        <textarea name="content" class="collapse" v-model="model.content"></textarea>
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

    import { VueEditor, Quill } from "vue2-editor";
    import { ImageDrop }  from "quill-image-drop-module";
    import  ImageResize from "quill-image-resize-vue";

    Quill.register("modules/imageDrop", ImageDrop);
    Quill.register("modules/imageResize", ImageResize);

    export default {
        mixins: [ formErrors, formController ],
        components: {
            VueEditor
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
                    visible: 0,
                    portrait_image: '',
                    content: ''
                },
                portrait_image_text: 'Seleccionar un archivo',
                editorSettings: {
                    modules: {
                        imageDrop: true,
                        imageResize: {}
                    }
                },
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
                    visible: 0,
                    portrait_image: '',
                    content: ''
                }
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
            manageImage: function(file, Editor, cursorLocation, resetUploader)
            {
                
                let dataFields = new FormData();
                dataFields.append('image', file);
                dataFields.append('type', 'file');
                let post = new XMLHttpRequest();
                post.open('POST', 'https://api.imgur.com/3/image');
                post.setRequestHeader('Authorization', 'Client-ID 351901bacac3413');
                post.send(dataFields);

                post.onloadend = function(evt) {
                    let responseJSON = JSON.parse(post.responseText);
                    Editor.insertEmbed(cursorLocation, "image", responseJSON.data.link);
                    resetUploader();
                };
            }
        },
    }
</script>
<style lang="css">
    @import "~vue2-editor/dist/vue2-editor.css";
</style>
<style lang="scss" scoped>
    .portrait {
        height: 64px;
        object-fit: cover;
        object-position: center;
        width: 64px;
    }
    .current-images {
        img {
            object-fit: contain;
            object-position: center;
        }
        i {
            font-size: 1.5rem;
        }
    }
</style>