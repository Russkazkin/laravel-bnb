<template>
    <div>

    </div>
</template>

<script>
    export default {
        name: "Bookable",
        data() {
            return {
                item: null,
            }
        },
        created() {
            axios
                .get(`/api/bookables/${this.$route.params.id}`)
                .then(response => {
                    this.item = response.data;
                });
        }
    }
</script>

<style scoped>

</style>
