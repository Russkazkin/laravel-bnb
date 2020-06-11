<template>
<div>
    <h1>{{ itemTitle }}</h1>
    <p>{{ itemContent }}</p>

</div>
</template>

<script>
    export default {
        name: "BookableListItem",
        props: {
            itemTitle: String,
            itemContent: String,
            itemPrice: Number
        }
    }
</script>

<style scoped>

</style>
