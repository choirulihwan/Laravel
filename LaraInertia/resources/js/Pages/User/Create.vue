<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 v-if="isEdit" class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Update User') }}
      </h2>
      <h2 v-else class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Create User') }}
      </h2>
    </template>

    <div class="py-3">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="bg-white px-4 py-4 sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-2 pt-4">
                <label class="block text-sm font-medium text-gray-700">{{ $t('User Name') }}</label>
              </div>
              <div class="col-span-4">
                <input type="text" placeholder="Input data..." v-model="form.name" ref="name"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <InputError :message="$page.props.errors.id_ref"></InputError>
              </div>
            </div>

            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-2 pt-4">
                <label class="block text-sm font-medium text-gray-700">{{ $t('Email') }}</label>
              </div>
              <div class="col-span-4">
                <input type="email" placeholder="Input data.." v-model="form.email"
                  class="mt-1 mb-4 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <InputError :message="$page.props.errors.no_ref"></InputError>
              </div>
            </div>

            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700">{{ $t('Select Roles') }}</label>
              </div>
              <div class="col-span-4">               
                <!-- <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select roles</label> -->
                <select v-model="form.roles" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  
                  <option v-for="item in roles" :key="item.id" :value="item.id">{{ item.name }}</option>
                </select>
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
  id:null, name: null, email: '', roles:[]
}

import InputError from '@/Components/InputError.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import NavLinkButton from '@/Components/NavLinkButton.vue';

export default {
  props: ['roles', 'isEdit', 'user_role', 'user'],

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
      this.form.id = this.user.id
      this.form.name = this.user.name
      this.form.email = this.user.email
      this.form.roles = this.user_role
    },

    saveItem(item) {      
      let url = '/users'
      if (item.id) {
        url = '/users/' + item.id
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