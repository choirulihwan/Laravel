<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 v-if="isEdit" class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Update Role') }}
      </h2>
      <h2 v-else class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Create Role') }}
      </h2>
    </template>

    <div class="py-3">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="bg-white px-4 py-4 sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-2 pt-4">
                <label class="block text-sm font-medium text-gray-700">{{ $t('Role Name') }}</label>
              </div>
              <div class="col-span-4">
                <input type="text" placeholder="Input data..." v-model="form.name" ref="name"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <InputError :message="$page.props.errors.name"></InputError>
              </div>
            </div>

            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-2 pt-4">
                <label class="block text-sm font-medium text-gray-700">{{ $t('Guard Name') }}</label>
              </div>
              <div class="col-span-4">
                <input type="text" disabled placeholder="Input data.." v-model="form.guard_name"
                  class="mt-1 mb-4 block w-full rounded-md bg-gray-100 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">                
              </div>
            </div>

            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-2 pt-4">
                <label class="block text-sm font-medium text-gray-700">{{ $t('Permissions') }}</label>
              </div>
              <div class="col-span-4">
                <div class="flex items-center mb-2" v-for="item in permission" :key="item.id">
                  <input type="checkbox" :value="item.id" :name="item.id" v-model="form.rolepermission"
                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label :for="item.id" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ item.name }}</label>
                  
                </div>
                <InputError :message="$page.props.errors.rolepermission"></InputError>
              </div>
            </div>
          </div>

          
          

          <div
            class="flex flex-row items-center px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
            
            <div class="flex basis-1/2">
              <SecondaryButton class="mr-2">              
                <NavLinkButton :href="route('roles.index')">
                    <template #default>{{ $t('Close') }}</template>
                </NavLinkButton>
              </SecondaryButton>  
            </div>
            
            <div class="basis-1/2">
              <SecondaryButton @click="resetItem()" class="mr-2">
                <template #default>Reset</template>
              </SecondaryButton>

              <PrimaryButton @click="saveItem(form)">
                <template #default>Save</template>
              </PrimaryButton>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
<script>

const defaultFormObject = {
  id:null, name: null, guard_name: 'web', rolepermission: []
}

import InputError from '@/Components/InputError.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import NavLinkButton from '@/Components/NavLinkButton.vue';

export default {
  props: ['role', 'permission', 'rolepermission', 'isEdit'],

  data() {
    return {
      alert_type: 'success',
      form: defaultFormObject,      
    }
  },

  mounted() {
    this.focusInput();
    this.$page.props.errors = {}

    if (this.isEdit) {
      this.fillItem()
    }
  },

  components: {
    InputError,
    PrimaryButton,
    SecondaryButton
  },

  methods: {
    focusInput() {
      this.$nextTick(() => this.$refs.name.focus())
    },

    resetItem() {
      if (this.isEdit) {
        this.fillItem()
      } else {
        this.form = defaultFormObject
      }
    },    

    fillItem() {
      this.form.id = this.role.id
      this.form.name = this.role.name
      this.form.guard_name = this.role.guard_name
      this.form.rolepermission = this.rolepermission
    },

    saveItem(item) {      
      let url = '/roles'
      if (item.id) {
        url = '/roles/' + item.id
        item._method = 'PUT'
      }

      this.$inertia.post(url, item, {
        onError: () => {
        },
        onSuccess: () => {

        }
      });
    },
  },


}

</script>