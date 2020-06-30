<template>
    <div class="reviews-wrap">
        <h6 class="text-uppercase text-secondary font-weight-bolder">
            Review List
            <star-rating :rating=4.4></star-rating>
            <star-rating :rating=4.9></star-rating>
            <star-rating :rating=0.9></star-rating>
            <star-rating :rating=3.3></star-rating>
            <star-rating :rating=2.5></star-rating>

        </h6>
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div class="border-bottom pb-3 mb-3 d-none d-md-block" v-for="(review, index) in reviews" :key="index">
                <div class="row">
                    <div class="col-md-6">
                        Rus Skazkin
                    </div>
                    <div class="col-md-6 text-uppercase d-flex justify-content-end">
                        <star-rating :rating="review.rating"></star-rating>
                    </div>
                    <div class="col-md-12">
                        {{ review.created_at | fromNow }}
                    </div>
                    <div class="col-md-12">
                        {{ review.content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ReviewList",
        props: {
            bookableId: String,
        },
        data() {
            return {
                loading: false,
                reviews: [],

            }
        },
        created() {
            this.loading = true;
            (async () => {
                try {
                    const response = await axios.get(`/api/bookables/${this.bookableId}/reviews`);
                    this.reviews = response.data.data;
                } catch (e) {
                    console.log(e.response);
                } finally {
                    this.loading = false;
                }
            })();
        }
    }
</script>

<style lang="sass" scoped>
.reviews-wrap
    padding: 1.25rem
</style>
