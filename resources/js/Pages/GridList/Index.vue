<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lists
            </h2>
            <div>
                <jet-button
                    @click.native="createNewList"
                >
                    New List
                </jet-button>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl lg:max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ul v-if="lists" class="">
                        <li
                            v-for="(list, index) in lists"
                            class="p-4"
                            :class="{'bg-gray-100': index % 2}"
                        >
                            <inertia-link :href="route('l.show', [list.uuid])" class="block">{{ list.title }}</inertia-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <jet-dialog-modal :show="isCreatingList" @close="isCreatingList = false">
            <template #title>
                New List
            </template>

            <template #content>
                <form>
                    <label for="new-grid-list-title" class="block`">Title</label>
                    <input
                        type="text"
                        id="new-grid-list-title"
                        class="form-input w-full"
                        v-model="form.title"
                    />
                    <div class="flex justify-between mt-4">
                        <jet-secondary-button @click.native="cancelNewList">
                            Cancel
                        </jet-secondary-button>
                        <jet-button @click.native="saveNewList">
                            Create
                        </jet-button>
                    </div>

                </form>
            </template>

            <template #footer>
            </template>
        </jet-dialog-modal>


    </app-layout>

</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetButton from '@/Jetstream/Button'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'
import JetDangerButton from '@/Jetstream/DangerButton'
import JetDialogModal from '@/Jetstream/DialogModal'

export default {
    name: 'Index',
    components: {
        AppLayout,
        JetButton,
        JetSecondaryButton,
        JetDangerButton,
        JetDialogModal,
    },
    computed: {
        lists: function () {
            return this.$page.lists
        },
    },
    data: function () {
        return {
            isCreatingList: false,
            form: {
                title: null,
                processing: false,
            },
        }
    },
    methods: {
        createList (data) {
            console.log('createList', data)
            this.$inertia.post(`/l`, data)
        },
        createNewList: function () {
            this.isCreatingList = true
        },
        saveNewList: function () {
            this.createList(this.form)
            this.isCreatingList = false
            this.$nextTick(() => {
                this.form.title = null
            })
        },
        cancelNewList: function () {
            this.isCreatingList = false
            this.$nextTick(() => {
                this.form.title = null
            })
        },
    },
}
</script>

<style scoped>

</style>
