<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ list.title }}
            </h2>
            <div>
                <toggle-switch
                    @click.native="toggleMode"
                >
                    Edit Mode
                </toggle-switch>

            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <grid-list
                        :list="list"
                        mode="show"
                        v-on:item-toggle="toggleListItem"
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
import ToggleSwitch from "@/Pages/GridList/ToggleSwitch";

export default {
    name: 'Show',
    components: {
        AppLayout,
        GridList,
        JetButton,
        JetSecondaryButton,
        ToggleSwitch,
    },
    computed: {
        list: function () {
            return this.$page.list
        },
    },
    methods: {
        toggleMode: function () {
            this.$inertia.get(`/l/${this.list.uuid}/edit`)
        },
        toggleClear: function () {
            console.log('toggleClear')
            this.$page.list.items.map((item) => item.complete = false)
        },
        toggleListItem (item) {
            console.log('toggleListItem', item)
            item.complete = !item.complete
        },

    },
}
</script>

<style scoped>

</style>
