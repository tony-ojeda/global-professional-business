<template>
   <div class="modal fade text-left" id="enterpriseAddressModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Dirección</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mb-2">
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
                            <div class="col-12">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="close()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import { EventBus } from '../EventBus';
    export default {
        // mixins: [ ],
        props: {
        },
        data() {
            return {
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
                    }
                },
                current_marker: null,
                current_address: '',
                map: null,
            }
        },
        created() {
            EventBus.$on('address_object', (data) => {
                this.extra_info.address_object = data;
            });

            EventBus.$on('clearModal',() => this.closed());
        },
        mounted() {
            $('#enterpriseAddressModal').on('show.bs.modal', () => {
                this.init();
            });

            $('#enterpriseAddressModal').on('hide.bs.modal', () => {
                this.closed();
            });

        },
        methods: {
            init: function()
            {
                this.drawMap();
                this.initSearch();
            },
            close: function()
            {
                EventBus.$emit('addressClosed',this.extra_info.address_object);
                $('#enterpriseAddressModal').modal('hide');
                // this.closed();
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
                let input = document.getElementById('enterprise_address');
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
            closed: function() {
                this.extra_info  = {
                    address_object : {
                        formatted_address : '',
                        street_number : '',
                        route : '',
                        locality : '',
                        administrative_area_level_1 : '',
                        country : '',
                        postal_code : '',
                        latitude : '',
                        longitude : '',
                    }
                };
                this.current_marker = null;
                this.current_address = '';
                this.map = null;
            }
        },
    }
    </script>

<style scoped>
    #map {
        height: 400px;
    }
</style>
