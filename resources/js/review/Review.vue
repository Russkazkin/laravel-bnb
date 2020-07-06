<template>
    <div class="container">
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
                }
            }
        },
        created() {
            (async () => {
                try {
                    const response = await axios.get(`/api/reviews/${this.$route.params.id}`);
                    this.review.date = response.data.data;
                } catch (e) {
                    console.log(e.response);
                }
            })();
        },
        computed: {
            alreadyReviewed() {
                return this.review.date !== null;
            }
        },
    }
</script>

<style scoped>

</style>
