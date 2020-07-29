<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                Checkout form
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-between">
                    <h6 class="text-uppercase text-secondary font-weight-bolder">
                        Your Basket
                    </h6>
                    <h6 class="badge badge-secondary text-uppercase">
                        <span v-if="itemsInBasket">items: {{ itemsInBasket }}</span>
                        <span v-else>Empty</span>
                    </h6>
                </div>
                <div v-for="item in basket" :key="item.bookable.id"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters } from "vuex";
    export default {
        name: "Basket",
        computed: {
            ...mapGetters(['itemsInBasket']),
            ...mapState({
                basket: state => state.basket.items,
            }),
        }
    }
</script>

<style scoped lang="sass">
    h6.badge
        font-size: 100%
</style>
