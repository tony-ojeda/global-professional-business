<template>
    <div>
        <button class="btn btn-primary" @click="testing()">Testing</button>
    </div>
</template>

<script>
export default {
    props: {
        url: {
            type: String,
            default: ''
        }
    },
    methods: {
        testing: function() {
            axios.post(this.url, 
                {
                    value: 150,
                    currency: 'usd'
                }).then(response => {
                console.log(response.data);
                window.location = response.data.url;
            }).catch(error => {
                console.log(error)
                console.log(error.response)
            });
        }
    },
}
</script>

<style>

</style>