<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ list.title }}
            </h2>
            <div>
                <jet-secondary-button
                    @click.native="handleCancel"
                >
                    Cancel
                </jet-secondary-button>
                <jet-button
                    @click.native="handleSave"
                >
                    Save
                </jet-button>
            </div>
        </template>

        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form
                        action=""
                        @submit.prevent
                    >
                        <input
                            type="number"
                            v-model="form.cols"
                        >
                    </form>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <grid-list
                        :list="list"
                        mode="edit"
                        v-on:item-new="createListItem"
                    />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetButton from '@/Jetstream/Button'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'
import GridList from '@/Pages/GridList/GridList'

export default {
    name: 'Show',
    components: {
        AppLayout,
        GridList,
        JetButton,
        JetSecondaryButton,
    },
    data: function () {
        return {
            list: this.$page.list,
            form: {
                title: this.$page.list.title,
                cols: this.$page.list.cols,
            },
        }
    },
    methods: {
        handleCancel: function () {
            console.log('handleCancel')
            this.$inertia.get(`/l/${ this.list.uuid }`)

        },
        handleSave: function () {
            console.log('handleSave')
            this.$inertia.put(`/l/${ this.list.uuid }`,
                {
                    ...this.list,
                    title: this.form.title,
                    cols: this.form.cols,
                },
            )

        },
    },
    createListItem (item) {
        console.log('createListItem', item)
        this.list.items.push({
            title: item.title,
        })
    },
}
</script>

<style scoped>

</style>
