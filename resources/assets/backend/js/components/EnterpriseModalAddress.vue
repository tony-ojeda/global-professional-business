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
                            <div class="col-12">
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
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    // mixins: [ ],
    props: {
        url: {
            type: String,
            default: ''
        },
        url_delivery: {
            type: String,
            default: ''
        },
        url_delivery_address: {
            type: String,
            default: ''
        },
        url_use_address: {
            type: String,
            default: ''
        },
        cities: {
            type: Array,
            default: function() {
                return [];
            }
        },
        enterprise_id: {
            type: Number,
            default: 0
        },
        // addresses_list: {
        //     type: Array,
        //     default: function() {
        //         return [];
        //     }
        // },
        address_selected_id: {
            type: String,
            default: ''
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
                answer: {
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
            district_id: '',
            user_address_id: '',
            old_address: false,
            references: '',
            addresses_list: []
        }
    },
    created() {
        
    },
    mounted() {
        // EventBus.$on('openUserAddressModal', function(user_addresses) {
        //     this.$modal.show('modalEnterpriseAddress');
        //     this.addresses_list = user_addresses;
        // }.bind(this));

        $('#enterpriseAddressModal').on('show.bs.modal', () => {
            // alert('onShow event fired.');
            console.log("ACA");
            this.init();
        });
    },
    methods: {
        close: function()
        {
            // this.$modal.hide('modalEnterpriseAddress');
        },
        init: function()
        {
            this.drawMap();
            this.initSearch();
        },
        drawMap: function()
        {
            let p1 = -12;
            let p2 = -77;
            let posIni = {lat: p1, lng: p2};

            this.map = new google.maps.Map(document.getElementById('map'), {
                center: posIni,
                clickable: false,
                zoom: 10,
                disableDefaultUI: true,
            });
        },
        initSearch: function()
        {
            let countryRestrict = {'country': 'pe'};
            let input = document.getElementById('enterprise_address');
            let options = {
                // bounds: defaultBounds,
                types: ['address'],
                componentRestrictions: countryRestrict
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
                    this.extra_info.answer[addressType] = val;
                }
            }

            if(this.extra_info.answer['country'] == 'Perú')
            {
                this.extra_info.answer.latitude = place.geometry.location.lat();
                this.extra_info.answer.longitude = place.geometry.location.lng();
                this.extra_info.answer.formatted_address = place.formatted_address;
                this.current_address = place.formatted_address;
                this.editMap();
            }
        },
        editMap: function() 
        {
            let posIni = {lat: this.extra_info.answer.latitude, lng: this.extra_info.answer.longitude};
            let bounds = new google.maps.LatLngBounds();
            // let icon = this.markerUserIcon;

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

            bounds.extend(posIni);

            if (bounds.getNorthEast().equals(bounds.getSouthWest())) {
                let extendPoint1 = new google.maps.LatLng(bounds.getNorthEast().lat() + 0.01, bounds.getNorthEast().lng() + 0.01);
                let extendPoint2 = new google.maps.LatLng(bounds.getNorthEast().lat() - 0.01, bounds.getNorthEast().lng() - 0.01);
                bounds.extend(extendPoint1);
                bounds.extend(extendPoint2);
            }

            this.map.fitBounds(bounds);
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
                                this.extra_info.answer[addressType] = val;
                            }
                        }
                        if(this.extra_info.answer['country'] == 'Perú')
                        {
                            this.extra_info.answer.latitude = latlng.lat;
                            this.extra_info.answer.longitude = latlng.lng;
                            this.editMap();
                            this.extra_info.answer.formatted_address = results[0].formatted_address;
                            this.current_address = results[0].formatted_address;
                        }

                    } else {

                    }
                } else {
                }
                
            });
        },
        formController: function(event,url,extra_info = null) 
        {
            let fd = new FormData(event.target);
            if(extra_info != null)
                fd.append('extra_info',JSON.stringify(extra_info));
                
            EventBus.$emit('loading',true);
            axios.post(url,fd,
                        { headers: {
                            'Content-type': 'application/x-www-form-urlencoded',
                        }
                    }).then(response => {
                EventBus.$emit('loading',false );
                let answer = response.data;
                if(answer.error) {
                    this.alertMsg(answer);
                   return; 
                }

                EventBus.$emit('delivery_calculated',  this.delivery_data_2);

                EventBus.$emit('select_new_address',answer.model);
                this.close();
                
            }).catch(error => {
                EventBus.$emit('loading',false);
                let obj = error.response.data.errors;
                this.showErrors(event.target,obj);
            });
        },
        calculateDelivery: function() 
        {
            EventBus.$emit('loading',true);
            axios.post(this.url_delivery,
                        {
                            enterprise_id: this.enterprise_id,
                            district_id: this.district_id,
                            extra_info: JSON.stringify(this.extra_info)
                        }
                    )
                .then(response => {
                EventBus.$emit('loading',false );
                this.old_address = false;
                this.delivery_data_2 = response.data;
            }).catch(error => {
                EventBus.$emit('loading',false);
                let obj = error.response.data.errors;
                this.showErrors('#form_user_address',obj);
            });
        },
        calculateDeliveryAddress: function() 
        {
            EventBus.$emit('loading',true);
            axios.post(this.url_delivery_address,
                        {
                            enterprise_id: this.enterprise_id,
                            user_address_id: this.user_address_id
                        }
                    )
                .then(response => {
                EventBus.$emit('loading',false );
                this.old_address = true;
                this.delivery_data_1 = response.data;
            }).catch(error => {
                EventBus.$emit('loading',false);
                let obj = error.response.data.errors;
                this.showErrors('#form_user_address',obj);
            });
        },
        useAddress: function() 
        {
           
            EventBus.$emit('loading',true);
            axios.post(this.url_use_address,
                        {
                            user_address_id: this.user_address_id
                        }
                    ).then(response => {
                EventBus.$emit('loading',false );

                EventBus.$emit('delivery_calculated',  this.delivery_data_1);
                this.close();
                
            }).catch(error => {
                EventBus.$emit('loading',false);
            });
        },
        createNewOne: function(flag) {
            this.old_address = flag;
            this.closed(1);
        },
        closed: function(cleaning = 0) {
            this.extra_info  = {
                answer : {
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
            this.delivery_data = {
                calculated: false,
                cost: 0,
                msg: ''
            };
            this.current_marker = null;
            this.current_address = '';
            this.map = null;
            this.district_id = '';
            this.references = '';
            this.user_address_id = '';
            if(this.cleaning == 0)
                this.old_address = true;
        }
    },
}
</script>

<style scoped>
    #map {
        height: 400px;
    }
</style>