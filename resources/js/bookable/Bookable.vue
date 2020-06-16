<template>
    <div class="container">

        <div class="row">
            <div class="col-md-8 mb-md-3">
                <div v-if="this.loading">Loading...</div>
                <div v-else class="card">
                    <div class="card-header">
                        <h5 class="mb-0">{{ item.name }}</h5>
                    </div>
                    <img src="/img/villa.jpg" alt="" width="100%">
                    <div class="card-body">
                        <p>
                            {{ item.description }}
                        </p>
                        <div class="item-price">
                            <span class="font-weight-bold">
                                Price:
                            </span>
                            {{ item.price }} US$
                        </div>
                        <div class="item-address">
                            <span class="font-weight-bold">
                                Address:
                            </span>
                            {{ item.address }}
                        </div>
                        <div class="item-price">
                            <span class="font-weight-bold">
                                Email:
                            </span>
                            {{ item.email }}
                        </div>
                        <div class="item-phone">
                            <span class="font-weight-bold">
                                Phone:
                            </span>
                            {{ item.phone }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <availability></availability>
            </div>
        </div>
    </div>
</template>

<script>
    import Availability from "./Availability";

    export default {
        name: "Bookable",
        components: {
            Availability,
        },
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
                    this.item = response.data.data;
                    this.loading = false;
                });
        }
    }
</script>

<style scoped>

</style>
