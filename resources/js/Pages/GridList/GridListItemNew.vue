<template>
    <li
        class="grid-list-item p-2 relative"
        :class="1 === list.cols ? 'w-full' : `w-1/${list.cols}`"
    >
        <button
            class="h-32 w-full flex items-center justify-center bg-gray-200"
            @click="handleClick"
        >
            <div class="heroicon-24">
                <!-- Heroicons: plus-circle -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </button>
    </li>
</template>

<script>
export default {
    name: 'GridListItemNew',
    props: [
        'list',
    ],
    methods: {
        handleClick: function (event) {
            console.log('click', event)
            this.$emit('item-create')
        },
    },
}
</script>

<style scoped>
</style>
