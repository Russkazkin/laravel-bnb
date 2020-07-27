<template>
    <div class="container">

        <div class="row">
            <div class="col-md-8 mb-md-3">
                <div v-if="this.loading">Loading...</div>
                <div v-else class="card mb-4">
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
                <review-list :bookable-id="this.$route.params.id"></review-list>
            </div>
            <div class="col-md-4">
                <availability @availability="checkPrice($event)"></availability>
            </div>
        </div>
    </div>
</template>

<script>
    import Availability from "./Availability";
    import ReviewList from "./ReviewList";
    import {mapState} from "vuex";

    export default {
        name: "Bookable",
        components: {
            Availability,
            ReviewList,
        },
        data() {
            return {
                item: null,
                loading: false,
                total: null,
            }
        },
        created() {
            this.loading = true;
            axios
                .get(`/api/bookables/${this.$route.params.id}`)
                .then(response => {
                    this.item = response.data.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        computed: mapState({
            lastSearch: "lastSearch"
        }),
        methods: {
            async checkPrice(isAvailable) {
                if(!isAvailable) {
                    this.total = null;
                    return;
                }

                try {
                    this.total = (await axios.get(`/api/bookables/${this.item.id}/total?from=${this.lastSearch.from}&to=${this.lastSearch.to}`)).data.total;
                } catch (e) {
                    this.total = null;
                    console.log(e);
                }
            }
        },
    }
</script>

<style scoped>

</style>
