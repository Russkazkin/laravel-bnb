<template>
    <div>
        <h6 class="text-uppercase font-weight-bolder text-secondary">Check availability</h6>
        <form action="">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="from">From</label>
                    <input type="text"
                           name="from"
                           id="from"
                           placeholder="Start Date"
                           class="form-control form-control-sm">
                </div>
                <div class="form-group col-md-6">
                    <label for="to">To</label>
                    <input type="text"
                           name="to"
                           id="to"
                           placeholder="End Date"
                           class="form-control form-control-sm">
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-block btn-secondary">Check</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Availability"
    }
</script>

<style lang="sass" scoped>
    label
        font-weight: bolder
        color: gray
        text-transform: uppercase
        font-size: .75rem
</style>
