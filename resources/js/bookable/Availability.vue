<template>
    <div>
        <h6 class="text-uppercase font-weight-bolder text-secondary">Check availability</h6>
        <form method="POST" id="checkoutForm" @submit.prevent="check()">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="from">From</label>
                    <input type="text"
                           name="from"
                           id="from"
                           v-model="from"
                           placeholder="Start Date"
                           class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-6">
                    <label for="to">To</label>
                    <input type="text"
                           name="to"
                           id="to"
                           v-model="to"
                           placeholder="End Date"
                           class="form-control form-control-sm">
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-block btn-secondary" :disabled="loading">Check</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Availability",
        data(){
            return {
                from: null,
                to: null,
                loading: false,
                status: null,
                errors: null,
            }
        },
        methods: {
            check() {
                this.loading = true;
                this.errors = null;
                axios
                    .get(`/api/bookables/${this.$route.params.id}/availability?from=${this.from}&to=${this.to}`)
                    .then(response => {
                        this.status = response.status;
                    })
                    .catch(error => {
                        if(error.response.status === 422) {
                            this.errors = error.response.data.errors;
                        }
                        this.status = error.response.status;
                    })
                    .then(() => {
                        console.log(this.status);
                        this.loading = false;
                    });
            }
        },
    }
</script>

<style lang="sass" scoped>
    label
        font-weight: bolder
        color: gray
        text-transform: uppercase
        font-size: .75rem
</style>
