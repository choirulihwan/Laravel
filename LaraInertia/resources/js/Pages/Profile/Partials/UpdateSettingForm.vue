<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: 'PUT',
    name: props.user.name,
    lang: props.user.default_lang,  
    recentlySuccessful: false,
});

const onSelectChange = (evt) => {
  form.lang = evt.target.value  
}

const updateUserSetting = () => {    
    form.post(route('setting.update'), {       
        // errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => {
            // form.recentlySuccessful = true
            // location.reload()
        },
    });
};


</script>

<template>
    <FormSection @submitted="updateUserSetting">
        <template #title>
            Update Settings
        </template>

        <template #description>
            Update your setting application (inc: language).
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <template v-if="form">
                    <InputLabel for="lang" value="Language" />
                    <select 
                        ref="lang" 
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                        v-model="form.lang"
                        @change="onSelectChange"
                        >
                        <option value="id">Indonesian</option>
                        <option value="en">English</option>                    
                    </select>
                    <InputError :message="form.errors.lang" class="mt-2" />
                </template>
            </div>         
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
