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
                            <inertia-link :href="route('l.show', [list.uuid])" class="block">{{
                                    list.title
                                }}
                            </inertia-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <jet-dialog-modal :show="modal.show" @close="modal.show = false">
            <template #title>
                New List
            </template>

            <template #content>
                <form @submit.prevent="submitNewListForm">
                    <label for="new-grid-list-title" class="block`">List Title</label>
                    <input
                        type="text"
                        id="new-grid-list-title"
                        class="form-input w-full"
                        v-model="form.title"
                    />
                    <div class="flex justify-between mt-4">
                        <jet-secondary-button @click.native="cancelNewListForm">
                            Cancel
                        </jet-secondary-button>
                        <jet-button
                            @click.native="submitNewListForm"
                            :disabled="form.processing"
                        >
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
            form: this.$inertia.form({
                title: '',
            }),
            modal: {
                show: false,
            }
        }
    },
    methods: {
        createNewList: function () {
            this.modal.show = true
        },
        cancelNewListForm: function () {
            console.log('cancelNewListForm')
            this.modal.show = false
            this.$nextTick(() => {
                this.form.title = null
            })
        },
        submitNewListForm() {
            console.log('submitNewListForm', this.form)
            this.form.post(route('l.store'))
        },
    },
}
</script>

<style scoped>

</style>
