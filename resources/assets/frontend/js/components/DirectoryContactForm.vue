<template>
    <form @submit.prevent="formController(url, $event)">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3" v-model="model.message"></textarea>
                    <div id="message-error" class="error invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">{{ submitText }}</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="success-message" v-if="successMessage">{{ successMessage }}</div>
            </div>
        </div>
    </form>
</template>

<script>
    import { EventBus } from '../EventBus';

    export default {
        props: {
            url: {
                type: String,
                default: ''
            },
            countries: {
                type: Array,
                default: function() {
                    return []
                }
            }
        },
        data() {
            return {
                model: {
                    message: '',
                },
                submitText: 'Send',
                successMessage: '',
            }
        },
        created() {
            this.clearModel();
        },
        methods: {
            clearModel: function() {
                this.model = {
                    message: '',
                }
            },
            formController: function(url, event) {
                var vm = this;

                $(event.target).find('button').attr('disabled', true);
                this.submitText = 'Sending...'

                var target = $(event.target);
                var url = url;
                var fd = new FormData(event.target);

                axios.post(url, fd, { headers: {
                        'Content-type': 'application/x-www-form-urlencoded',
                    }
                }).then(response => {
                    $(event.target).find('button').attr('disabled', false);
                    this.submitText = 'Send';
                    this.successMessage = 'Message sent successfully.';
                    this.clearModel();
                }).catch(error => {
                    $(event.target).find('button').attr('disabled', false);
                    this.submitText = 'Send';
                    this.successMessage = 'There was an error while sending. Please try again.';

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

<style lang="scss" scoped>

</style>
