<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Users') }}
      </h2>
    </template>

    <div class="py-3" v-if="$page.props.flash.message">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <AlertMessage :show="true" :alert_type="alert_type">
          <template #message><strong>{{ $page.props.flash.message }}</strong></template>
        </AlertMessage>
      </div>
    </div>

    <div class="py-3">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="bg-white px-4 py-4 sm:p-6">
            <div class="flex flex-col">
              <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                    <div class="flex justify-end">

                      <SuccessButton class="mb-2" v-if="$page.props.user_permission.includes('user-create')">                        
                        <NavLinkButton :href="route('users.create')">
                          <template #default>{{ $t('Create') }}</template>
                        </NavLinkButton>
                      </SuccessButton>

                    </div>

                    <table class="w-full text-center border">
                      <thead class="border-b bg-gray-50">
                        <tr>
                          <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">#</th>
                          <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">{{ $t('Name') }}
                          </th>
                          <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">{{ $t('Email') }}
                          </th>
                          <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">{{ $t('Role') }}
                          </th>
                          <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="bg-white border-b" v-for="(item, index) in users" :key="item.id">
                          <td class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap border-r">{{ ++index }}</td>
                          <td class="text-sm text-gray-900 text-start font-light px-3 py-2 whitespace-nowrap border-r">{{ item.name }}</td>
                          <td class="text-sm text-gray-900 text-start font-light px-3 py-2 whitespace-nowrap border-r">{{ item.email }}</td>
                          <td class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap border-r">                            
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ user_role[item.id][0] }}</span>
                          </td>
                          <td class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap">
                            <WarningButton class="mx-2" v-if="$page.props.user_permission.includes('user-edit')">
                              <NavLinkButton :href="route('users.edit', item.id)">
                                <template #default>{{ $t('Edit') }}</template>
                              </NavLinkButton>
                            </WarningButton>
                            <DangerButton @click="confirmDelete(item)" v-if="$page.props.user_permission.includes('user-delete')">
                              <template #default>{{ $t('Delete') }}</template>
                            </DangerButton>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <ConfirmationModal :show="isConfirm">
                      <template #title>
                        Confirm Delete
                      </template>
                      <template #content>
                        Are you sure want to delete {{ form.keterangan }}
                      </template>
                      <template #footer>
                        <SecondaryButton @click="closeConfirmation()">
                          <template #default>Close</template>
                        </SecondaryButton>

                        <DangerButton @click="deleteItem(form)">
                          <template #default>Continue Delete</template>
                        </DangerButton>
                      </template>
                    </ConfirmationModal>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
<script>

import AlertMessage from '@/Components/AlertMessage.vue'
import NavLinkButton from '@/Components/NavLinkButton.vue'
import SuccessButton from '@/Components/SuccessButton.vue'
import WarningButton from '@/Components/WarningButton.vue'
import DangerButton from '@/Components/DangerButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import ConfirmationModal from '@/Components/ConfirmationModal.vue'

export default { 

  props: ['users', 'user_role'],

  data() {
    return {
      alert_type: 'success',
      isEdit: false,
      isConfirm: false,
    }
  },

  mounted() {
    // console.log(this.$page.props.user_permission)
  },

  components: {
    AlertMessage
  },

  methods: {    

    confirmDelete(item) {
      this.isConfirm = true
      this.form = item ? item : defaultFormObject
    },

    closeConfirmation() {
      this.isConfirm = false
    },

    deleteItem(item) {
      this.$inertia.post('/users/' + item.id, {
        _method: 'DELETE'
      })
      this.closeConfirmation()
    },
  }


}

</script>