<template>
    <li
        class="grid-list-item p-2 relative"
        :class="1 === list.cols ? 'w-full' : `w-1/${list.cols}`"
    >
        <button
            v-if="!isEditMode"
            class="h-32 w-full flex items-center justify-center bg-gray-200"
            @click="handleClick"
        >
            <div class="heroicon-24">
                <!-- Heroicons: plus-circle -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </button>

        <form
            v-else
            action=""
            class="h-32 w-full flex items-center justify-center bg-gray-200"
            @submit.prevent="handleSubmit"
        >
            <input
                type="text"
                class="text-center"
                name="new-grid-list-item-title"
                ref="new-grid-list-item-title"
                v-model="form.title"
            />
            <div v-if="isEditMode" class="absolute left-0 bottom-4 w-full flex justify-center">
                <button
                    type="reset"
                    class="heroicon-24"
                    @click="handleCancel"
                >
                    <!-- Heroicons: x-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
                <button
                    type="submit"
                    class="heroicon-24"
                    @click.prevent="handleSubmit"
                >
                    <!-- Heroicons: check-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
        </form>

    </li>
</template>

<script>
export default {
    name: 'GridListItemNew',
    props: [
        'list',
    ],
    data: function () {
        return {
            isEditMode: false,
            form: {
                list: {
                    uuid: this.list.uuid,
                },
                title: null,
            },
        }
    },
    methods: {
        handleClick: function (event) {
            console.log('click', event)
            if (this.isEditMode) {
                this.$refs[ 'new-grid-list-item-title' ].focus()
                return
            }
            this.isEditMode = true
            this.$nextTick(() => {
                this.$refs[ 'new-grid-list-item-title' ].focus()
            })
        },
        handleSubmit: function (event) {
            console.log('submit', event)
            console.log('form', this.form)
            this.$emit('item-new', this.form)
            this.$nextTick(() => {
                this.form.title = null
            })
        },
        handleCancel: function (event) {
            console.log('cancel', event)
            this.isEditMode = false
        },
    },
}
</script>

<style scoped>
</style>
