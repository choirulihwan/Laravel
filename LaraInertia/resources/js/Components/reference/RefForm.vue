<template>

    <div v-if="isOpen"> 
            <form>
            <div class="bg-white px-4 py-4 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-2 pt-4">
                        <label class="block text-sm font-medium text-gray-700">Kode Group</label>
                    </div>
                    <div class="col-span-4">
                        <input type="text" placeholder="Input kode group..." v-model="form.id_ref" ref="id_ref"
                            class="mt-1 block w-6/12 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <!-- <div v-if="$page.props.errors.id_ref" class="text-red-500 text-sm">{{ $page.props.errors.id_ref }}</div> -->
                        <InputError :message="$page.props.errors.id_ref"></InputError>
                    </div>
                </div>

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-2 pt-4">
                        <label class="block text-sm font-medium text-gray-700">Kode Ref</label>
                    </div>
                    <div class="col-span-4">
                        <input type="text" placeholder="Input no.ref..." v-model="form.no_ref"
                            class="mt-1 block w-9/12 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <InputError :message="$page.props.errors.no_ref"></InputError>
                    </div>
                </div>

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-2 pt-4">
                        <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                    </div>
                    <div class="col-span-4">
                        <input type="text" placeholder="Input keterangan..." v-model="form.keterangan"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <InputError :message="$page.props.errors.keterangan"></InputError>
                    </div>
                </div>

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-2 pt-4">
                        <label class="block text-sm font-medium text-gray-700">Keterangan Label</label>
                    </div>
                    <div class="col-span-4">
                        <input type="text" placeholder="Input label reference.." v-model="form.keterangan2"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
            </div>
            </form>       
    </div>
</template>

<script>

import InputError from '../../Components/InputError.vue'

export default {
    props: ['form', 'isEdit', 'isOpen'],

    components: {
        InputError
    },

    mounted() {
        if (this.isOpen) {
            this.focusInput();
        }
        if(!this.isEdit) {
            this.form.id_ref = null;
            this.form.no_ref = null;
            this.form.keterangan = null;
            this.form.keterangan2 = null;
        }
    },

    methods: {
        focusInput() {
            this.$nextTick(() => this.$refs.id_ref.focus())
        },  
    },
}
</script>

