<template>
    <li :class="`grid-list-item p-2 ${widthClass}`">
        <button
            :class="[
                'item h-32 w-full flex items-center justify-center',
                colorClass,
                ]"
            @click="toggleListItem"
        >
            {{ item.title }}
        </button>
    </li>
</template>

<script>

export default {
    name: 'GridListItem',
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
        item: {
            type: Object,
            default: function () {
                return {
                    complete: false,
                    title: '',
                }
            },
        },
        mode: {
            type: String,
            default: 'show',
        },
    },
    computed: {
        colorClass: function () {
            if ('edit' === this.mode) {
                return 'bg-gray-200'
            }
            return this.item.complete ? 'bg-green-300' : 'bg-red-300'
        },
        widthClass: function () {
            console.log('widthClass', this.list.cols)
            return ( 1 === this.list.cols ) ? 'w-full' : `w-1/${ this.list.cols }`
        },
    },
    methods: {
        toggleListItem: function () {
            this.$emit('item-toggle', this.item)
        },

    },
}
</script>

<style scoped>
</style>
