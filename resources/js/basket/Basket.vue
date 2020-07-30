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
                    <h6 class="badge badge-secondary text-uppercase text-small-3">
                        <span v-if="itemsInBasket">items: {{ itemsInBasket }}</span>
                        <span v-else>Empty</span>
                    </h6>
                </div>
                <div v-for="item in basket" :key="item.bookable.id">
                    <div class="pt-2 pb-2 border-top d-flex justify-content-between">
                        <div>
                            <router-link :to="{ name: 'bookable', params: { id: item.bookable.id }}">{{ item.bookable.name }}</router-link>
                        </div>
                        <div class="font-weight-bolder">${{ item.total.total }}.00</div>
                    </div>
                    <div class="pb-2 d-flex justify-content-between text-secondary text-small-3">
                        <div>From {{ item.dates.from | dateFormatted }}</div>
                        <div>To {{ item.dates.to | dateFormatted }}</div>
                    </div>
                    <div class="pb-3 d-flex justify-content-between text-secondary">
                        <button
                            role="button"
                            class="btn btn-outline-secondary btn-sm btn-block"
                            @click="$store.dispatch('removeFromBasket', item.bookable.id)">
                            <i class="fas fa-trash-alt"></i> Remove
                        </button>
                    </div>
                </div>
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
    a
        color: black
</style>
