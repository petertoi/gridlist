<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ list.title }}
            </h2>
            <div>
                <toggle-switch
                    checked
                    @click.native="toggleMode"
                >
                    Edit Mode
                </toggle-switch>
            </div>
        </template>

        <div class="pt-12">
            <div class="mx-auto sm:px-6 lg:px-8">
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
            form: {
                title: this.$page.list.title,
                cols: this.$page.list.cols,
            },
            modal: {
                show: false,
                item: {
                    title: null
                }
            },
        }
    },
    watch: {
        $page: function (newPage) {
            this.list = {...newPage.list}
        },
    },
    methods: {
        toggleMode() {
            this.$inertia.get(`/l/${this.list.uuid}`)
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
            this.$nextTick(() => {
                this.modal.item = null
            })
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
