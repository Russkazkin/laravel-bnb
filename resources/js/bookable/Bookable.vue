<template>
    <div class="container">

        <div class="row">
            <div class="col-md-8 mb-md-3">
                <div v-if="this.loading">Loading...</div>
                <div v-else class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">{{ item.name }}</h5>
                    </div>
                    <img :src="item.image" alt="" width="100%">
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
                <availability @availability="checkPrice($event)" class="mb-5"></availability>
                <transition name="fade">
                    <price-breakdown v-if="total" :total="this.total" class="mb-3"></price-breakdown>
                </transition>
                <transition name="fade">
                    <button class="btn btn-outline-secondary btn-block btn-sm mb-2"
                            v-if="total"
                            @click="addToBasket"
                            :disabled="inBasketAlready">
                        Book now
                    </button>
                </transition>
                <transition name="fade">
                    <button class="btn btn-outline-secondary btn-block btn-sm mb-2"
                            v-if="inBasketAlready"
                            @click="removeFromBasket">
                        Remove from basket
                    </button>
                </transition>
                <div v-if="inBasketAlready" class="text-secondary text-small">
                    Seems like you've added this item in the basket already. If you want to change the dates, first empty the basket
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Availability from "./Availability";
    import ReviewList from "./ReviewList";
    import PriceBreakdown from "./PriceBreakdown";
    import {mapState} from "vuex";

    export default {
        name: "Bookable",
        components: {
            Availability,
            ReviewList,
            PriceBreakdown,
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
        computed: {
            ...mapState({
                lastSearch: "lastSearch",
            }),
            inBasketAlready() {
                if (this.item === null) {
                    return false;
                }
                return this.$store.getters.inBasketAlready(this.item.id);
            },
        },
        methods: {
            async checkPrice(isAvailable) {
                if(!isAvailable) {
                    this.total = null;
                    return;
                }

                try {
                    this.total = (await axios.get(`/api/bookables/${this.item.id}/total?from=${this.lastSearch.from}&to=${this.lastSearch.to}`)).data;
                } catch (e) {
                    this.total = null;
                    console.log(e);
                }
            },
            addToBasket() {
                this.$store.dispatch("addToBasket", {
                    bookable: this.item,
                    total: this.total,
                    dates: this.lastSearch,
                })
            },
            removeFromBasket() {
                this.$store.dispatch("removeFromBasket", this.item.id);
            }
        },
    }
</script>

<style scoped lang="sass">
    .text-small
        font-size: .75rem
</style>
