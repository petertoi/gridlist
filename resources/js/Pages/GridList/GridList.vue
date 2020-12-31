<template>
    <ul v-if="list.items" class="grid-list flex flex-wrap p-2 dark:bg-gray-900">
        <grid-list-item
            v-for="(item, index) in list.items"
            :key="index"
            :index="index"
            :item="item"
            :list="list"
            :mode="mode"
            v-on="$listeners"
        />
        <grid-list-item-new
            v-if="'edit' === mode"
            :list="list"
            :mode="mode"
            v-on="$listeners"
        />
    </ul>
</template>

<script>
import GridListItem from '@/Pages/GridList/GridListItem'
import GridListItemNew from '@/Pages/GridList/GridListItemNew'

export default {
    name: 'GridList',
    components: {
        GridListItem,
        GridListItemNew,
    },
    props: {
        list: {
            type: Object,
            default: function () {
                return {
                    items: [],
                    cols: 3,
                }
            },
        },
        mode: {
          type: String,
          default: 'show'
        },
    },
}
</script>

<style scoped>

</style>
