<template>
    <modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="handleClose">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div
                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                    <!-- Heroicons: pencil-alt -->
                    <svg
                        class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>

                <div class="mt-3 flex-grow text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg">
                        {{ title }}
                    </h3>

                    <div class="mt-4">
                        <form @submit.prevent="handleSubmit">
                            <!-- title -->
                            <jet-label class="block">Title</jet-label>
                            <jet-input :class="`mt-2 w-full ${form.error('title') && 'border-red-400'}`"
                                       type="text" v-model="form.title"/>
                            <jet-input-error :message="form.error('title')" class="mt-2"/>

                            <!-- color -->
                            <jet-label class="block mt-4">Colour</jet-label>
                            <v-swatches
                                class="mt-2"
                                v-model="form.meta.color"
                                :swatches="swatches"
                                inline
                                row-length="7"
                                shapes="circles"
                            ></v-swatches>

                            <div class="mt-4 flex justify-between">
                                <jet-secondary-button type="button" @click.native="handleClose">
                                    Cancel
                                </jet-secondary-button>
                                <jet-button type="submit" :disabled="form.processing" @click.prevent="handleSubmit">
                                    Save
                                </jet-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-100 text-right">
            <slot name="footer">
            </slot>
        </div>
    </modal>
</template>

<script>
import Modal from '@/Jetstream/Modal'
import JetLabel from "@/Jetstream/Label";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError"
import JetButton from "@/Jetstream/Button";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import VSwatches from 'vue-swatches'
import { cloneDeep } from 'lodash'


export default {
    name: 'GridListItemModal',
    components: {
        JetInput,
        JetLabel,
        JetInputError,
        Modal,
        JetButton,
        JetSecondaryButton,
        VSwatches,
    },
    props: {
        show: {
            type: Boolean,
            default: false,
        },
        maxWidth: {
            type: String,
            default: '2xl',
        },
        closeable: {
            type: Boolean,
            default: true,
        },
        item: {
            type: Object,
            default: function () {
                return {
                    'uuid': null,
                    'title': null,
                    'meta' : {
                        'color': '#F56565'
                    }
                }
            },
        },
        list: {
            type: Object,
            default: null,
        }
    },
    data: function () {
        console.log('data', this.item)
        return {
            form: this.$inertia.form(cloneDeep(this.item)),
            swatches: ['#F56565', '#ED8936', '#ECC94B', '#48BB78', '#4299E1', '#9F7AEA', '#ED64A6']
        }
    },
    watch: {
        item: function (item) {
            console.log('itemWatch', item)
            this.form = this.$inertia.form(
                cloneDeep(item),
                {
                    bag: 'gridListItemModal',
                    resetOnSuccess: false,
                }
            )
        },
    },
    computed: {
        title() {
            return !!this.item.uuid ? 'Edit Item' : 'New Item'
        },
    },
    methods: {
        handleClose() {
            if (this.closeable) {
                this.$emit('modal-close')
            }
        },
        handleSubmit() {
            const method = !!this.item.uuid ? 'put' : 'post'

            const url = !!this.item.uuid
                ? route('l.i.update', {list: this.list.uuid, item: this.item.uuid})
                : route('l.i.store', {list: this.list.uuid})

            this.form.submit(method, url, {
                onSuccess: page => {
                    console.log('onSuccess', page)
                    if (this.form.hasErrors('gridListItemModal')) {
                        //fail
                        this.$emit('modal-fail')
                    } else {
                        //success
                        this.$emit('modal-save')
                    }
                },
                onFail: errors => {
                    console.log('onFail', errors)
                },
            })
        },
    },
}
</script>
