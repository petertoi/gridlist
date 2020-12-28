<template>
    <li :class="`grid-list-item p-2 w-1/${cols}`">
        <div>
            <button
                class="item h-32 w-full flex items-center justify-center bg-blue-300"
                contenteditable="true"
                @focus="handleFocus"
                @blur="handleBlur"
                @change="handleChange"
                @input="handleChange"
            >
                {{ item.title }}
            </button>
            <div v-if="this.isFocused" class="actions text-center">
                <button
                    class="action"
                    @click="handleCancel"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <button
                    class="action"
                    @click="handleSubmit"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
            </div>
        </div>
    </li>
</template>

<script>
export default {
    name: 'GridListItemEdit',
}
</script>

<style scoped>

</style>
