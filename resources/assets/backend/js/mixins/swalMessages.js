import { EventBus } from '../EventBus';

export default {
    components: {
    },
    props: {
    },
    data() {
        return {
        }
    },
    created() {
    },
    methods: {
        alertMsg: function(data)
        {
            switch (data.type) {
                case 1:
                    Swal.fire({
                        type: 'success',
                        title: data.title,
                        text: data.subtitle,
                        showConfirmButton: true,
                        timer: 2000,
                    }).then((result) => {
                        if(data.reload) {
                            location.reload();
                            return;
                        }

                        EventBus.$emit('refresh');
                    })
                    break;
                case 2:
                    Swal.fire({
                        type: 'warning',
                        title: data.title,
                        text: data.subtitle,
                        showConfirmButton: true,
                    })
                    break;
                case 3:
                    Swal.fire({
                        type: 'success',
                        title: data.title,
                        text: data.subtitle,
                        showConfirmButton: true,
                        timer: 1500,
                    }).then((result) => {
                        if(data.sendEvent) {
                            EventBus.$emit(data.channel);
                        }
                        if(data.url) {
                            window.location = data.url;
                            return;
                        }
                    })
                    break;
                case 4:
                    Swal.fire({
                        type: "warning",
                        title: data.title,
                        text: data.subtitle,
                        // showCancelButton: true,
                        // confirmButtonText: 'Sí, eliminar!'
                        showCancelButton: true,
                        confirmButtonText: 'Sí, eliminar!',
                        cancelButtonText: 'No, cancelar!',
                    }).then((result) => {
                        if (result.value) {
                            axios.post(data.url, { id: data.id }).then(response => {
                                this.alertMsg(response.data);
                            }).catch(error => {
                                console.log(error.response.data);
                            });

                        }
                    });
                    break;
                case 5:
                    Swal.fire({
                        type: "success",
                        title: data.title,
                        text: data.subtitle,
                        confirmButtonText: "OK",
                        timer: 1000,
                    }).then(() => {
                        EventBus.$emit("refresh", false);
                    })
                    break;
                default:
                    break;
            }

            
        }
    },
}