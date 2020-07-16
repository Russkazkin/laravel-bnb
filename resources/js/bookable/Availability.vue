<template>
    <div>
        <h6 class="text-uppercase font-weight-bolder text-secondary">
            Check availability
            <span v-if="notAvailable" class="text-danger">(not available)</span>
            <span v-if="isAvailable" class="text-success">(available)</span>
        </h6>
        <form method="POST" id="checkoutForm" @submit.prevent="check()">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="from">From</label>
                    <input type="text"
                           name="from"
                           id="from"
                           v-model="from"
                           placeholder="Start Date"
                           class="form-control form-control-sm"
                           :class="[{'is-invalid' : errorsFor('from')}]">
                    <validation-errors :errors="errorsFor('from')"></validation-errors>
                </div>

                <div class="form-group col-md-6">
                    <label for="to">To</label>
                    <input type="text"
                           name="to"
                           id="to"
                           v-model="to"
                           placeholder="End Date"
                           class="form-control form-control-sm"
                           :class="[{'is-invalid' : errorsFor('to')}]">
                    <validation-errors :errors="errorsFor('to')"></validation-errors>
                </div>

            </div>
            <button type="submit" class="btn btn-sm btn-block btn-secondary" :disabled="loading">Check</button>
        </form>
    </div>
</template>

<script>
    import { is422 } from "../shared/utils/responce";

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
                (async () => {
                    try {
                        const response = await axios.get(`/api/bookables/${this.$route.params.id}/availability?from=${this.from}&to=${this.to}`);
                        this.status = response.status;
                    } catch (error) {
                        if(is422(error)) {
                            this.errors = error.response.data.errors;
                        }
                        this.status = error.response.status;
                    } finally {
                        this.loading = false;
                    }
                })();
            },
            errorsFor(field){
                return this.hasErrors && this.errors[field] ? this.errors[field] : null;
            },
        },
        computed: {
            hasErrors() {
                return this.status === 422 && this.error !== null;
            },
            isAvailable() {
                return this.status === 200;
            },
            notAvailable() {
                return this.status === 404;
            },
        }
    }
</script>

<style lang="sass" scoped>
    label
        font-weight: bolder
        color: gray
        text-transform: uppercase
        font-size: .75rem
</style>
