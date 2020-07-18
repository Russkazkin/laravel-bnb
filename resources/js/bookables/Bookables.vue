<template>
<div>
    <div v-if="loading" class="container">Loading...</div>
    <div v-else class="container d-flex justify-content-center flex-wrap">
        <bookable-list-item v-bind="item"
                            v-for="item in items"
                            :key="item.id"
        ></bookable-list-item>
    </div>
</div>
</template>

<script>
    import BookableListItem from "./BookableListItem";
    export default {
        name: "Bookables",
        components: {
            BookableListItem
        },
        data() {
            return {
                items: null,
                loading: false,
                columns: 3,
            }
        },
        computed: {
            rows() {
                return this.items ? Math.ceil(this.items.length / this.columns) : 0;
            },
        },
        methods: {},
        async created() {
            this.loading = true;
            try {
                this.items = (await axios.get("/api/bookables")).data.data;
            } catch (e) {
                console.log(e);
            } finally {
                this.loading = false;
            }
        }
    }
</script>


<style scoped>

</style>
