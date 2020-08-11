<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8" v-if="itemsInBasket">
                <form @submit.prevent="book">
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   id="name"
                                   v-model="customer.name"
                                   :class="[{'is-invalid' : errorsFor('customer.name')}]">
                            <validation-errors :errors="errorsFor('customer.name')"></validation-errors>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   id="email"
                                   v-model="customer.email"
                                   :class="[{'is-invalid' : errorsFor('customer.email')}]">
                            <validation-errors :errors="errorsFor('customer.email')"></validation-errors>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text"
                               class="form-control"
                               name="address"
                               id="address"
                               v-model="customer.address"
                               :class="[{'is-invalid' : errorsFor('customer.address')}]">
                        <validation-errors :errors="errorsFor('customer.address')"></validation-errors>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label for="country">Country</label>
                            <input type="text"
                                   class="form-control"
                                   name="country"
                                   id="country"
                                   v-model="customer.country"
                                   :class="[{'is-invalid' : errorsFor('customer.country')}]">
                            <validation-errors :errors="errorsFor('customer.country')"></validation-errors>
                        </div>
                        <div class="col-md-4">
                            <label for="state">State</label>
                            <input type="text"
                                   class="form-control"
                                   name="state"
                                   id="state"
                                   v-model="customer.state"
                                   :class="[{'is-invalid' : errorsFor('customer.state')}]">
                            <validation-errors :errors="errorsFor('customer.state')"></validation-errors>
                        </div>
                        <div class="col-md-2">
                            <label for="zip">ZIP</label>
                            <input type="text"
                                   class="form-control"
                                   name="zip"
                                   id="zip"
                                   v-model="customer.zip"
                                   :class="[{'is-invalid' : errorsFor('customer.zip')}]">
                            <validation-errors :errors="errorsFor('customer.zip')"></validation-errors>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn btn-primary btn-block" :disabled="loading">Book Now</button>
                </form>
            </div>
            <div class="col-md-8" v-else>
                <div class="jumbotron jumbotron-fluid text-center">
                    <h1>
                        Empty
                    </h1>
                </div>
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
    import validationErrors from "../shared/mixins/validationErrors";
    import {is422} from "../shared/utils/responce";
    export default {
        name: "Basket",
        mixins: [validationErrors],
        data() {
            return {
                loading: false,
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
        },
        methods: {
            async book() {
                this.loading = true;
                this.errors = null;
                try {
                    await axios.post(`/api/checkout`, {
                        customer: this.customer,
                        bookings: this.basket.map(basketItem => ({
                            bookable_id: basketItem.bookable.id,
                            from: basketItem.dates.from,
                            to: basketItem.dates.to
                        })),
                    });
                    this.$store.dispatch("clearBasket");
                } catch (error) {
                    if(is422(error)) {
                        this.errors = error.response.data.errors;
                    }
                    this.status = error.response.status;
                } finally {
                    this.loading = false;
                }
            }
        },
    }
</script>

<style scoped lang="sass">
    a
        color: black
</style>
