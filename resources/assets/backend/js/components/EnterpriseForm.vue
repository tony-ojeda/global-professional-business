<template>
     <div class="col-12 col-md-6">
        <form id="enterpriseForm" class="form form-vertical" @submit.prevent="formController($event)">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Datos generales</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <input type="hidden" v-model="model.id" name="id">
                                <div class="col-12">
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
                                <div class="col-12 col-md-6">
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
                                <div class="col-12 col-md-6">
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
                                <div class="col-12 col-md-6">
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
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Correo electrónico</label>
                                        <input
                                            type="text"
                                            id="email"
                                            class="form-control"
                                            name="email"
                                            placeholder="Teléfono"
                                            v-model="model.email"
                                        >
                                        <div class="invalid-feedback email-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12">
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
                                <div class="col-12">
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
                                <!-- <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1" v-if="!model.id">Registrar</button>
                                    <button type="submit" class="btn btn-primary mr-1 mb-1" v-else>Actualizar</button>
                                    <button type="button" class="btn btn-outline-warning mr-1 mb-1" @click="clearModel()">Limpiar</button>
                                </div> -->
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
                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="iconLeft3"
                                            placeholder="Dirección"
                                            @click="openModal()"
                                            autocomplete="off"
                                            readonly
                                            v-model="model.address"
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

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Imágenes</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12 current-images" v-if="model.images.length > 0">
                                    <div class="avatar mr-1 avatar-xl" v-for="(item,index) in model.images" :key="index">
                                        <img :src="item.url_image" alt="avtar img holder">
                                        <span class="badge badge-pill badge-danger badge-sm badge-up" @click="deleteImage(index)">
                                            <i class="fa fa-trash-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <vue-dropzone ref="myVueDropzone1" id="dropzone1" :options="dropzoneOptions"></vue-dropzone>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-body">
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mr-1 mb-1" v-if="!model.id">Registrar</button>
                        <button type="submit" class="btn btn-primary mr-1 mb-1" v-else>Actualizar</button>
                        <button type="button" class="btn btn-outline-warning mr-1 mb-1" @click="clearModel()">Limpiar</button>
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
    import swalMessages from '../mixins/swalMessages';
    import vue2Dropzone from 'vue2-dropzone';


    export default {
        mixins: [ formErrors, swalMessages ],
        components: {
            vueDropzone: vue2Dropzone
        },
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
                    address: '',
                    portrait_image: '',
                    images: [],
                },
                extra_info: {
                    address_object: {
                        formatted_address: '',
                        street_number: '',
                        route: '',
                        locality: '',
                        administrative_area_level_1: '',
                        country: '',
                        postal_code: '',
                        latitude: '',
                        longitude: '',
                    },
                    deleted_images: []
                },
                dropzoneOptions: {
                    url: this.url,
                    thumbnailWidth: 150,
                    maxFilesize: 0.6,
                    // headers: { "My-Awesome-Header": "header value" },
                    autoProcessQueue: false,
                    uploadMultiple: true,
                    paramName: 'files',
                    dictDefaultMessage: 'Coloque sus imágenes aquí',
                    // maxFiles: 1,
                    init: function() {
                        this.on('sending', function(file, xhr, formData)
                        {
                            let token = document.head.querySelector('meta[name="csrf-token"]').content;
                            let currentFormData = new FormData($("#enterpriseForm")[0]);
                            for (let pair of currentFormData.entries()) {
                                formData.append(pair[0], pair[1]);
                            }
                            formData.append("_token", token);
                        });
                    }
                },
                portrait_image_text: 'Seleccionar un archivo'
            }
        },
        created() {
            EventBus.$on('clearForm',() => this.clearModel());

            EventBus.$on('edit',(data) => {
                this.model = data.model;
                this.extra_info.address_object = data.model.address_object;
            });

            EventBus.$on('addressClosed',(data) => {
                this.extra_info.address_object = data;
                this.model.address = this.extra_info.address_object.formatted_address != '' ? this.extra_info.address_object.formatted_address : this.model.address;
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
                    address: '',
                    portrait_image: '',
                    images: [],
                }
                this.extra_info = {
                    address_object: {
                        formatted_address: '',
                        street_number: '',
                        route: '',
                        locality: '',
                        administrative_area_level_1: '',
                        country: '',
                        postal_code: '',
                        latitude: '',
                        longitude: '',
                    },
                    deleted_images: []
                }
                this.clearErrors(1);
                this.portrait_image_text = 'Seleccionar una imagen';
                document.getElementsByTagName("form")[0].reset();
                EventBus.$emit('clearModal');
            },
            openModal: function()
            {
                EventBus.$emit('address_object',this.extra_info.address_object);
                $('#enterpriseAddressModal').modal('show');
            },
            remove: function() {

            },
            formController: async function(event) {

                // file.status = Dropzone.QUEUED;
                // let test = this.$refs.myVueDropzone1.getQueuedFiles();
                // test.forEach(element => {
                //     // console.log(element.name);
                //     // fd.append('files[]',element);
                //     element.status =1;

                // });

                // return;

                EventBus.$emit('loading',true);
                let target = $(event.target);
                let fd = new FormData(event.target);
                if(this.extra_info != null)
                    fd.append('extra_info',JSON.stringify(this.extra_info));

                let files = this.$refs.myVueDropzone1.getQueuedFiles();
                files.forEach(element => {
                    // console.log(element.name);
                    fd.append('files[]',element);
                });

                // fd = await this.addfilesFormData(fd);

                axios.post(this.url,fd,
                            { headers: {
                                'Content-type': 'application/x-www-form-urlencoded',
                            }
                        }).then(response => {
                    EventBus.$emit('loading',false );
                    EventBus.$emit('clearForm');
                    this.$refs.myVueDropzone1.removeAllFiles();
                    this.alertMsg( response.data );
                }).catch(error => {
                    EventBus.$emit('loading',false);
                    let obj = error.response.data.errors;
                    let cont = 0;
                    this.showErrors(event.target,obj);
                });
            },
            addfilesFormData: async function(fd) {
                let files = this.$refs.myVueDropzone1.getQueuedFiles();

                await files.reduce(async (promise, file) => {
                    await promise;
                    await fd.append('files[]',file);
                }, Promise.resolve(fd));
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
            deleteImage: function(index)
            {
                this.extra_info.deleted_images.push(this.model.images[index].id);
                this.model.images.splice(index,1);
            }
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
