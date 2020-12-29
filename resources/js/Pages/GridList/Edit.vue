<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ list.title }}
            </h2>
            <div class="flex flex-row items-center">
                <label for="grid-list-cols" class="sr-only">Columns</label>
                <span class="flex flex-row items-center mt-2">
                    <button
                        type="button"
                        @click="handleListColsDecrement"
                    >
                        <!-- Heroicons: minus-circle -->
                        <svg class="heroicon-24 text-gray-500 hover:text-gray-800"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </button>
                    <input
                        id="grid-list-cols"
                        type="text"
                        class="form-input text-center w-16 mx-4"
                        v-model="list.cols"
                    >
                    <button
                        type="button"
                        @click="handleListColsIncrement"
                    >
                        <!-- Heroicons: plus-circle -->
                        <svg class="heroicon-24 text-gray-500 hover:text-gray-800"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </button>
                </span>
            </div>
            <div>
                <toggle-switch
                    checked
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
                        mode="edit"
                        v-on:item-create="handleItemCreate"
                        v-on:item-edit="handleItemEdit"
                    />
                </div>
            </div>
        </div>
        <grid-list-item-modal
            :show="modal.show"
            :item="modal.item"
            :list="list"
            @modal-close="handleModalClose"
            @modal-save="handleModalSave"
        />
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetButton from '@/Jetstream/Button'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'
import GridList from '@/Pages/GridList/GridList'
import GridListItemModal from "@/Pages/GridList/GridListItemModal"
import ToggleSwitch from "@/Pages/GridList/ToggleSwitch"

export default {
    name: 'Edit',
    components: {
        AppLayout,
        JetButton,
        JetSecondaryButton,
        GridList,
        GridListItemModal,
        ToggleSwitch
    },
    data: function () {
        return {
            list: this.$page.list,
            modal: {
                show: false,
            },
            form: this.$inertia.form({
                title: this.$page.list.title,
                cols: this.$page.list.cols,
            }),
        }
    },
    watch: {
        $page: function (newPage) {
            this.list = {...newPage.list}
            this.form = this.$inertia.form({
                    title: newPage.list.title,
                    cols: newPage.list.cols,
                },
                {
                    bag: 'gridListEdit'
                })
        },
    },
    methods: {
        toggleMode() {
            this.$inertia.get(`/l/${this.list.uuid}`)
        },
        handleListColsIncrement() {
            console.log('handleListColsIncrement', this.list.cols)
            if (6 > this.form.cols) {
                this.form.cols++
                this.saveList()
            }
        },
        handleListColsDecrement() {
            console.log('handleListColsDecrement', this.list.cols)
            if (1 < this.form.cols) {
                this.form.cols--
                this.saveList()
            }
        },
        saveList() {
            this.form.put(
                route('l.update', {list: this.list.uuid}),
                {
                    onSuccess: page => {
                        console.log('onSuccess', page)
                    },
                    onFail: errors => {
                        console.log('onFail', errors)
                    },
                }
            )
        },
        handleItemCreate() {
            console.log('handleItemCreate')
            this.modal = {
                show: true,
            }
        },
        handleItemEdit(item) {
            console.log('handleItemEdit', item)
            this.modal = {
                show: true,
                item: item,
            }
        },
        handleModalClose() {
            console.log('handleModalClose')
            this.modal.show = false
        },
        handleModalSave() {
            console.log('handleModalSave')
            this.handleModalClose()
        },
    },
}
</script>

<style scoped>

</style>
