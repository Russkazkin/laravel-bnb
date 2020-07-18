<template>
    <div class="container">
        <fatal-error v-if="error">We've encountered a problem and unfortunately cannot proceed.</fatal-error>
        <div v-else class="row">
            <div :class="[{'col-md-4' : twoColumns}, {'d-none' : oneColumn}]">
                <div class="card">
                    <div class="card-body">
                        <div v-if="loading">Loading</div>
                        <div v-if="!alreadyReviewed">
                            <p>
                                Stayed at
                                <router-link :to="{name: 'bookable', params: {id: booking.bookable.id}}">
                                    {{ booking.bookable.name }}
                                </router-link>
                            </p>
                            <p>
                                From {{ booking.from }} to {{ booking.to }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div :class="[{'col-md-8' : twoColumns}, {'col-md-12' : oneColumn}]">
                <div v-if="loading">Loading</div>
                <div v-else>
                    <div v-if="alreadyReviewed" class="alert alert-warning">
                        You've already left a review for this booking!
                    </div>
                    <div v-else>
                        <form @submit.prevent="submit">
                            <div class="form-group">
                                <label for="" class="text-muted">Please rate your booking</label>
                                <star-rating v-model="review.rating"
                                             class="fa-2x">
                                </star-rating>
                            </div>
                            <div class="form-group">
                                <label for="content" class="text-muted">And add review if you wish</label>
                                <textarea name="content"
                                          id="content"
                                          cols="5" rows="5"
                                          class="form-control"
                                          :class="[{ 'is-invalid' : errorsFor('content') }]"
                                          v-model="review.content">
                                </textarea>
                                <validation-errors :errors="errorsFor('content')"></validation-errors>
                            </div>
                            <button type="submit" class="btn btn-primary" :disabled="sending">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {is404, is422 } from '../shared/utils/responce';
    import validationErrors from '../shared/mixins/validationErrors';
    export default {
        name: "Review",
        mixins: [validationErrors],
        data() {
            return {
                review: {
                    id: null,
                    rating: 5,
                    content: '',
                    date: null,
                },
                loading: false,
                booking: null,
                error: false,
                sending: false,
            }
        },
        async created() {
            this.loading = true;
            this.review.id = this.$route.params.id;

            try {
                this.review.date = (await axios.get(`/api/reviews/${this.review.id}`)).data.data;
            } catch (e) {
                if (is404(e)) {
                    try {
                        this.booking = (await axios.get(`/api/booking-by-review/${this.review.id}`)).data.data;
                    } catch (e) {
                        this.error = !is404(e);
                    }
                } else {
                    this.error = true;
                }
            } finally {
                this.loading = false;
            }
        },
        computed: {
            alreadyReviewed() {
                return this.hasReview || !this.booking
            },
            hasReview() {
                return this.review.date !== null;
            },
            hasBooking() {
                return this.booking !== null;
            },
            oneColumn() {
                return !this.loading && this.alreadyReviewed;
            },
            twoColumns() {
                return this.loading || !this.alreadyReviewed;
            },
        },
        methods: {
            submit() {
                this.errors = null;
                this.sending = true;
                (async () => {
                    try {
                        const response = await axios.post(`/api/reviews`, this.review);
                        console.log(response);
                    } catch (e) {
                        if(is422(e)) {
                            const errors = e.response.data.errors;
                            if(errors["content"] && _.size(errors) === 1) {
                                this.errors = errors;
                                return;
                            }
                            return;
                        }
                        this.error = true;
                        console.log(e.response);
                    } finally {
                        this.sending = false;
                    }
                })();
            },
        }
    }
</script>

<style scoped>

</style>
