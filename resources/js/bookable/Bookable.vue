<template>
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <div v-if="this.loading">Loading...</div>
                <div v-else class="card">
                    <div class="card-header">
                        {{ item.name }}
                    </div>
                    <div class="card-body">
                        {{ item.description }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h3>Availability and prices</h3>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Bookable",
        data() {
            return {
                item: null,
                loading: false,
            }
        },
        created() {
            this.loading = true;
            axios
                .get(`/api/bookables/${this.$route.params.id}`)
                .then(response => {
                    this.item = response.data;
                    this.loading = false;
                });
        }
    }
</script>

<style scoped>

</style>
