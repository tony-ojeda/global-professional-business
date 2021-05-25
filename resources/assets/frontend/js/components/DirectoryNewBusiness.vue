<template>
    <form @submit.prevent="formController(url, $event)">
        <div class="row">
            <div class="col-12">
                <h4>General info</h4>
            </div>
            <div class="col-12 col-lg-4">
                <div class="form-group">
                    <label>Business name</label>
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
                    <label>Category</label>
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
                    <label>Phone</label>
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
                    <label>Schedule</label>
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
                    <label>Description</label>
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
                    <label>Profile image</label>
                    <input
                        type="file"
                        class="form-control"
                        id="portrait_image"
                        name="portrait_image"
                    >
                    <img :src="model.portrait_image" class="portrait_image" alt="avtar img holder" v-if="model.portrait_image">
                    <div id="portrait_image-error" class="error invalid-feedback"></div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Banner images</label>
                        </div>
                    </div>
                    <div class="col-12 grid-images" v-if="model.images.length > 0">
                        <div class="avatar avatar-xl" v-for="(item,index) in model.images" :key="index">
                            <img :src="item.url_image" alt="avtar img holder">
                            <span class="badge badge-pill badge-danger badge-sm badge-up" @click="deleteImage(index)">
                                <i class="fa fa-trash"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-12">
                        <vue-dropzone ref="myVueDropzone1" id="dropzone1" :options="dropzoneOptions"></vue-dropzone>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-2">
                <div class="form-group">
                    <label>Address</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="address"
                        id="address"
                        autocomplete="off"
                        v-on:keypress.enter.prevent=""
                        placeholder="Search address..."
                        v-model="current_address"
                    >
                </div>
            </div>
            <div class="col-12">
                <div id="map"></div>
            </div>
        </div>

        <div class="row" v-if="model.id">
            <div class="col-12">
                <input type="checkbox" v-model="model.change_membership">
                <label for="">Update membership?</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4>Plans</h4>
            </div>
        </div>
        <div id="plans" class="row choose-plan">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="plan plan-free" :class="{'selected': model.membership_id === 1}" data-plan="free" @click="changeMembership(1)">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Free
                            </div>
                            <div class="plan--header-price">

                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Includes:
                            </div>
                            <ul class="plan--include-list">
                                <li>1 month free</li>
                                <li>Publish your business for 1 month for free</li>
                                <li class="disabled">Your business in the first searches</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="plan plan-basic" :class="{'selected': model.membership_id === 2}" data-plan="basic" @click="changeMembership(2)">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Basic
                            </div>
                            <div class="plan--header-price">
                                $25
                                <small>monthly</small>
                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Includes:
                            </div>
                            <ul class="plan--include-list">
                                <li>Publish your business for 1 month for free</li>
                                <li class="disabled">Your business in the first searches</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="plan plan-premium" :class="{'selected': model.membership_id === 3}" data-plan="premium" @click="changeMembership(3)">
                        <div class="plan--header">
                            <div class="plan--header-title">
                                Premium
                            </div>
                            <div class="plan--header-price">
                                $200
                                <small>annual</small>
                            </div>
                        </div>
                        <div class="plan--include">
                            <div class="plan--include-title">
                                Includes:
                            </div>
                            <ul class="plan--include-list">
                                <li>Publish your business for 1 month for free</li>
                                <li>Your business in the first searches</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </form>
</template>

<script>
    import { EventBus } from '../EventBus';
    import swalMessages from "../mixins/swalMessages";
    import vue2Dropzone from 'vue2-dropzone';

    export default {
        mixins: [swalMessages],
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
                default: []
            },
            enterprise: {
                type: Object,
                default: function() {
                    return {}
                }
            },
        },
        data() {
            return {
                model: {
                    id: null,
                    name: '',
                    website: '',
                    category_id: '',
                    phone: '',
                    email: '',
                    schedule: '',
                    address: '',
                    details: '',
                    membership_id: 1,
                    change_membership: false,
                    portrait_image: '',
                    images: [],
                },
                componentForm: {
                    street_number: 'short_name',
                    route: 'long_name',
                    locality: 'long_name',
                    administrative_area_level_1: 'short_name',
                    country: 'long_name',
                    postal_code: 'short_name'
                },
                extra_info : {
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
                current_marker: null,
                current_address: '',
                map: null,
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
                portrait_image_text: 'Seleccionar un archivo',
            }
        },
        mounted() {
            this.drawMap();
            this.initSearch();
        },
        created() {
            if(this.enterprise){
                for(let propertyName in this.model) {

                    if(this.enterprise.hasOwnProperty(propertyName)) {
                        this.model[propertyName] = this.enterprise[propertyName];
                    }
                }
                this.extra_info.address_object = this.enterprise.address_object;
                this.model.membership_id = this.enterprise.memberships[0].membership_id;
            }
        },
        methods: {
            clearModel: function() {
                this.model = {
                    id: null,
                    name: '',
                    website: '',
                    category_id: '',
                    phone: '',
                    email: '',
                    schedule: '',
                    details: '',
                    membership_id: 1,
                    change_membership: false
                }
            },
            drawMap: function()
            {
                let p1 = -12;
                let p2 = -77;
                let posIni = {lat: p1, lng: p2};
                let zoom = 10;
                if(this.extra_info.address_object.formatted_address != '') {
                    p1 = this.extra_info.address_object.latitude;
                    p2 = this.extra_info.address_object.longitude;
                    posIni = {lat: p1, lng: p2};
                    zoom = 15;
                    this.current_address = this.extra_info.address_object.formatted_address;
                }

                this.map = new google.maps.Map(document.getElementById('map'), {
                    center: posIni,
                    clickable: false,
                    zoom: zoom,
                    disableDefaultUI: true,
                });

                if(this.extra_info.address_object.formatted_address != '') {
                    this.initMarker(posIni);
                }
            },
            initSearch: function()
            {
                let countryRestrict = {'country': 'pe'};
                let input = document.getElementById('address');
                let options = {
                    // bounds: defaultBounds,
                    types: ['address'],
                    // componentRestrictions: countryRestrict
                };

                this.autocomplete = new google.maps.places.Autocomplete(input, options);
                this.autocomplete.addListener('place_changed', this.fillInAddress);
            },
            fillInAddress: function()
            {
                let place = this.autocomplete.getPlace();

                console.log(place);

                for (let i = 0; i < place.address_components.length; i++) {
                    let addressType = place.address_components[i].types[0];
                    if (this.componentForm[addressType]) {
                        let val = place.address_components[i][this.componentForm[addressType]];
                        this.extra_info.address_object[addressType] = val;
                    }
                }

                this.extra_info.address_object.latitude = place.geometry.location.lat();
                this.extra_info.address_object.longitude = place.geometry.location.lng();
                this.extra_info.address_object.formatted_address = place.formatted_address;
                this.current_address = place.formatted_address;
                this.editMap();
            },
            editMap: function()
            {
                let posIni = {lat: this.extra_info.address_object.latitude, lng: this.extra_info.address_object.longitude};
                let bounds = new google.maps.LatLngBounds();
                // let icon = this.markerUserIcon;

                this.initMarker(posIni);
                // if(this.current_marker == null)
                // {
                //     this.current_marker = new google.maps.Marker({
                //         position: posIni,
                //         map: this.map,
                //         draggable: true,
                //         // icon: icon,
                //     });
                // }


                // google.maps.event.addListenerOnce(this.current_marker, 'dragend',(data) => {
                //     this.geocodeLatLng()
                // });

                bounds.extend(posIni);

                if (bounds.getNorthEast().equals(bounds.getSouthWest())) {
                    let extendPoint1 = new google.maps.LatLng(bounds.getNorthEast().lat() + 0.01, bounds.getNorthEast().lng() + 0.01);
                    let extendPoint2 = new google.maps.LatLng(bounds.getNorthEast().lat() - 0.01, bounds.getNorthEast().lng() - 0.01);
                    bounds.extend(extendPoint1);
                    bounds.extend(extendPoint2);
                }

                this.map.fitBounds(bounds);
            },
            initMarker: function(posIni)
            {
                if(this.current_marker == null)
                {
                    this.current_marker = new google.maps.Marker({
                        position: posIni,
                        map: this.map,
                        draggable: true,
                        // icon: icon,
                    });
                }


                google.maps.event.addListenerOnce(this.current_marker, 'dragend',(data) => {
                    this.geocodeLatLng()
                });
            },
            geocodeLatLng: function() {
                let geocoder = new google.maps.Geocoder;
                let latlng = {
                    lat: this.current_marker.getPosition().lat(),
                    lng: this.current_marker.getPosition().lng()
                };
                geocoder.geocode({'location': latlng}, (results, status) => {
                    if (status === 'OK') {
                        if (results[0]) {
                            let address_components = results[0].address_components;
                            for (let i = 0; i < address_components.length; i++) {
                                let addressType = address_components[i].types[0];
                                if (this.componentForm[addressType]) {
                                    let val = address_components[i][this.componentForm[addressType]];
                                    this.extra_info.address_object[addressType] = val;
                                }
                            }

                            this.extra_info.address_object.latitude = latlng.lat;
                            this.extra_info.address_object.longitude = latlng.lng;
                            this.editMap();
                            this.extra_info.address_object.formatted_address = results[0].formatted_address;
                            this.current_address = results[0].formatted_address;

                        } else {

                        }
                    } else {
                    }

                });
            },
            changeMembership: function(membership_id) {
                this.model.membership_id = membership_id
            },
            formController: function(url, event) {
                $(event.target).find('button').attr('disabled', true);

                let target = $(event.target);
                let fd = new FormData(event.target);
                if(this.model.id)
                    fd.append('id',this.model.id);
                if(this.model.change_membership)
                    fd.append('change_membership',1);
                if(this.extra_info != null)
                    fd.append('extra_info',JSON.stringify(this.extra_info));

                let files = this.$refs.myVueDropzone1.getQueuedFiles();
                files.forEach(element => {
                    fd.append('files[]',element);
                });

                this.model.address = this.extra_info.address_object.formatted_address != '' ? this.extra_info.address_object.formatted_address : this.model.address;

                fd.append('membership_id',this.model.membership_id);

                axios.post(url, fd, { headers: {
                        'Content-type': 'application/x-www-form-urlencoded',
                    }
                }).then(response => {
                    $(event.target).find('button').attr('disabled', false);
                    if(!response.data.error) this.clearModel();
                    this.$refs.myVueDropzone1.removeAllFiles();
                    this.alertMsg( response.data );
                }).catch(error => {
                    $(event.target).find('button').attr('disabled', false);

                    if(!error.response) {
                        console.log(error)
                        return
                    }

                    let obj = error.response.data.errors;
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

<style scoped>
    #map {
        height: 400px;
    }
</style>
