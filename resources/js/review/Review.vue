<template>
    <div class="container">
        <div v-if="error" class="alert alert-danger">
            Unknown error has occurred. Please try again later
        </div>
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
                                      class="form-control" v-model="review.content">
                            </textarea>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {is404} from '../shared/utils/responce';
    export default {
        name: "Review",
        data() {
            return {
                review: {
                    rating: 5,
                    content: '',
                    date: null,
                },
                loading: false,
                booking: null,
                error: false,
            }
        },
        created() {
            this.loading = true;
            (async () => {
                try {
                    const response = await axios.get(`/api/reviews/${this.$route.params.id}`);
                    this.review.date = response.data.data;
                } catch (e) {
                    if (is404(e)) {
                        await (async () => {
                            try {
                                const res = await axios.get(`/api/booking-by-review/${this.$route.params.id}`);
                                this.booking = res.data.data;
                            } catch (e) {
                                this.error = !is404(e);
                            }
                        })();
                    }
                    this.error = true;
                    console.log(e.response);
                } finally {
                    this.loading = false;
                }
            })();
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
    }
</script>

<style scoped>

</style>
