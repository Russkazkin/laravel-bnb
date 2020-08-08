<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="">
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" v-model="customer.name">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" v-model="customer.email">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" v-model="customer.address">
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" id="country" v-model="customer.country">
                        </div>
                        <div class="col-md-4">
                            <label for="state">State</label>
                            <input type="text" class="form-control" name="state" id="state" v-model="customer.state">
                        </div>
                        <div class="col-md-2">
                            <label for="zip">ZIP</label>
                            <input type="text" class="form-control" name="zip" id="zip" v-model="customer.zip">
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn btn-primary btn-block">Book Now</button>
                </form>
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
                <transition-group name="fade" tag="div">
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
                </transition-group>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters } from "vuex";
    export default {
        name: "Basket",
        data() {
            return {
                customer: {
                    name: null,
                    email: null,
                    address: null,
                    country: null,
                    state: null,
                    zip: null,
                }
            }
        },
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
