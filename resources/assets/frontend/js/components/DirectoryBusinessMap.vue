<template>
    <div id="map"></div>
</template>

<script>
    import { EventBus } from '../EventBus';

    export default {
        props: {
            enterprise: {
                type: Object,
                default: function() {
                    return {}
                }
            },
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
                    },
                },
                current_marker: null,
                current_address: '',
                map: null,
            }
        },
        mounted() {
            this.drawMap();
        },
        created() {
            if ( this.enterprise ) {
                this.extra_info.address_object = this.enterprise.address_object;
            }
        },
        methods: {
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
        },
    }
</script>

<style scoped>
    #map {
        height: 400px;
    }
</style>
