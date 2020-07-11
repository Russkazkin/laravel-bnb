<template>
    <div class="container">
        <div class="row">
            <div :class="[{'col-md-4' : loading || !alreadyReviewed}, {'d-none' : !loading && alreadyReviewed}]">
                First column
            </div>
            <div :class="[{'col-md-8' : loading || !alreadyReviewed}, {'col-md-12' : !loading && alreadyReviewed}]">
                <div v-if="loading">Loading</div>
                <div v-else>
                    <div v-if="alreadyReviewed" class="alert alert-warning">
                        You've already left a review for this booking!
                    </div>
                    <div v-else class="row">
                        <div class="col-md-6">
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
    </div>
</template>

<script>
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
            }
        },
        created() {
            this.loading = true;
            (async () => {
                try {
                    const response = await axios.get(`/api/reviews/${this.$route.params.id}`);
                    this.review.date = response.data.data;
                } catch (e) {
                    if (e.response && e.response.status && e.response.status === 404) {
                        await (async () => {
                            try {
                                const res = await axios.get(`/api/booking-by-review/${this.$route.params.id}`);
                                this.booking = res.data.data;
                            } catch (e) {
                                console.log(e.response);
                            }
                        })();
                    }
                    console.log(e.response);
                } finally {
                    console.log('final');
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
            }
        },
    }
</script>

<style scoped>

</style>
