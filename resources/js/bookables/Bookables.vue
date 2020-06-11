<template>
<div class="container">
    <bookable-list-item item-title="Cheap villa 1"
                        item-content="A very cheap villa 1"
                        :item-price="10000">
    </bookable-list-item>
    <bookable-list-item item-title="Cheap villa 2"
                        item-content="A very cheap villa 2"
                        :item-price="10000">
    </bookable-list-item>
    <bookable-list-item item-title="Cheap villa 3"
                        item-content="A very cheap villa 3"
                        :item-price="10000">
    </bookable-list-item>
    <bookable-list-item item-title="Cheap villa 4"
                        item-content="A very cheap villa 4"
                        :item-price="10000">
    </bookable-list-item>
    <bookable-list-item item-title="Cheap villa 5"
                        item-content="A very cheap villa 5"
                        :item-price="10000">
    </bookable-list-item>
</div>
</template>

<script>
    import BookableListItem from "./BookableListItem";
    export default {
        name: "Bookables",
        components: {
            BookableListItem
        }
    }
</script>

<style scoped>

</style>
