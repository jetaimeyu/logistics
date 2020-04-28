<template>

</template>

<script>
    export default {
        name: "AddressCreateAndEdit",
        data() {
            return {
                province: '',//省
                city: '', //市
                district: ''//区
            }
        },
        methods: {
            onDistrictChanged(val) {
                // if (val.length === 3) {
                    console.log(val);
                    this.province = val[0];
                    this.city = val[1];
                    this.district = val[2];
                // }
            }
        }
    }
</script>

<style scoped>

</style>
