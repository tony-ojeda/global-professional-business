<template>
    <section id="search">
        <form @submit.prevent="formController(url, $event)">
            <div class="container">
                <div class="row">
                    <!--<div class="col-12 col-lg-3">
                        <div class="widget" id="accordion">
                            <div class="widget--title widget--accordion" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Categories
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-check" v-for="category in categories" v-bind:key="category.id">
                                        <input class="form-check-input" type="checkbox" :value="category.id" :id="'category0'+category.id" v-model="model.categories" name="categories[]">
                                        <label class="form-check-label" :for="'category0'+category.id">
                                            {{ category.name }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-12 col-lg-12">
                        <div class="row enterprise-grid">
                            <div class="col-12 col-lg-4 enterprise d-flex flex-row mx-2" v-for="enterprise in filterEnterprises" v-bind:key="enterprise.id">
                                <!--<a :href="'directory/'+enterprise.slug" class="enterprise">-->
                                    <div class="enterprise--image">
                                        <img :src="enterprise.portrait_image" width="80" height="80" alt="">
                                    </div>
                                    <div>
                                        <div class="enterprise--name">
                                            {{ enterprise.enterprise_name }}
                                        </div>
                                        <div class="enterprise--category">
                                            {{ enterprise.category_name }}
                                        </div>
                                        <div class="enterprise--star">
                                            <i class="fa fa-star text-m-yellow"></i>
                                            <i class="fa fa-star text-m-yellow"></i>
                                            <i class="fa fa-star text-m-yellow"></i>
                                            <i class="fa fa-star text-m-yellow"></i>
                                            <i class="fa fa-star text-m-yellow"></i>
                                        </div>
                                        <div class="enterprise--address">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="9px" height="12px" viewBox="0 0 9 12" style="enable-background:new 0 0 9 12;" xml:space="preserve">
                                                <path class="st0" d="M4.5,0C2.01,0.01-0.01,2.04,0,4.53c0,3.55,4.08,7.22,4.25,7.37c0.14,0.13,0.36,0.13,0.5,0
                                                C4.92,11.75,9,8.08,9,4.53C9.01,2.04,6.99,0.01,4.5,0z M4.5,7C3.12,7,2,5.88,2,4.5S3.12,2,4.5,2S7,3.12,7,4.5S5.88,7,4.5,7z"/>
                                            </svg>
                                            {{ enterprise.enterprise_address }}
                                        </div>
                                    </div>
                                <!--</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</template>

<script>
    import { EventBus } from '../EventBus';

    export default {
        props: {
            url: {
                type: String,
                default: ''
            },
            categories: {
                type: Array,
                default: ''
            },
            enterprises: {
                type: Array,
                default: ''
            },
            params: {
                type: Array,
                default: function() {
                    return {}
                }
            },
        },
        data() {
            return {
                model: {
                    input_search: '',
                    categories: [],
                },
                filterEnterprises: [],
            }
        },
        created() {
            this.clearModel();
            this.filterEnterprises = this.enterprises;

            // var queryParams = new URLSearchParams(window.location.search);
            // console.log(queryParams)

            // queryParams.set("myParam", "myValue");
        },
        watch: {
            model: {
                handler (val) {
                    if ( val.categories.length > 0 ) {
                        this.filterEnterprises = this.enterprises.filter( element => {
                            return element.enterprise_name.toLowerCase().indexOf(val.input_search.toLowerCase()) >= 0 && val.categories.includes(element.category_id);
                        });
                    } else if ( val.input_search !== '' ) {
                        this.filterEnterprises = this.enterprises.filter( element => {
                            return element.enterprise_name.toLowerCase().indexOf(val.input_search.toLowerCase()) >= 0;
                        });
                    }
                },
                deep: true
            },
        },
        methods: {
            clearModel: function() {
                this.model = {
                    input_search: '',
                    categories: [],
                }
            },
            formController: function(url, event) {
                var vm = this;

                $(event.target).find('button').attr('disabled', true);

                var target = $(event.target);
                var url = url;
                var fd = new FormData(event.target);

                axios.post(url, fd, { headers: {
                        'Content-type': 'application/x-www-form-urlencoded',
                    }
                }).then(response => {
                    $(event.target).find('button').attr('disabled', false);
                    this.clearModel();
                    this.$parent.alertMsg( response.data );
                }).catch(error => {
                    $(event.target).find('button').attr('disabled', false);

                    console.log(error.response);
                    var obj = error.response.data.errors;
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
