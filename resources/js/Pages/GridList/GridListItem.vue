<template>
    <li :class="`grid-list-item p-2 ${widthClass}`">
        <button
            :class="[
                'item h-32 w-full flex items-center justify-center',
                ]"
            :style="{'background-color': bgColorHex}"
            @click="handleClick"
        >
            <span class="text-xl font-bold">{{ item.title }}</span>
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
        bgColorHex: function () {
            return this.item.complete ? '#EDF2F7' : this.item.meta.color
        },
        widthClass: function () {
            console.log('widthClass', this.list.cols)
            return (1 === this.list.cols) ? 'w-full' : `w-1/${this.list.cols}`
        },
    },
    methods: {
        handleClick: function () {
            const event = 'edit' === this.mode ? 'item-edit' : 'item-toggle'
            this.$emit(event, this.item)
        },

    },
}
</script>

<style scoped>
</style>
