<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t('Roles') }}
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
          <!-- <RoleList :roles="roles"></RoleList> -->
          <div class="bg-white px-4 py-4 sm:p-6">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div class="flex justify-end">
                          

                              <SuccessButton class="mb-2">   
                                <!-- <template #default>{{ $t('Create') }}</template>                              -->
                                  <NavLinkButton :href="route('roles.create')">
                                      <template #default>{{ $t('Create') }}</template>
                                  </NavLinkButton>
                              </SuccessButton>
                          
                        </div>

                        <table class="w-full text-center border">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">#</th>
                                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">{{ $t('Name') }}</th>
                                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">{{ $t('Guard') }}</th>                                    
                                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b" v-for="(item, index) in roles" :key="item.id">
                                    <td class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap border-r">{{ ++index }}</td>
                                    <td class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap border-r">{{ item.name }}</td>
                                    <td class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap border-r">{{ item.guard_name }}</td>                                    
                                    <td class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap">
                                        <WarningButton class="mx-2">                                            
                                            <NavLinkButton :href="route('roles.edit', item.id)">
                                                <template #default>{{ $t('Edit') }}</template>
                                            </NavLinkButton>
                                        </WarningButton>                                        
                                        <DangerButton @click="confirmDelete(item)">
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
  props: ['roles'],

  data() {
    return {
      alert_type: 'success',
      isEdit: false,      
      isConfirm: false, 
    }    
  },

  mounted() {    
  },  

  components: {    
    AlertMessage
  }, 

  methods: {
    // openForm() {
    //   location.href='/roles/create'
    // },

    confirmDelete(item) {
      this.isConfirm = true      
      this.form = item ? item : defaultFormObject
    },

    closeConfirmation() {
      this.isConfirm = false
    },

    deleteItem(item) {      
      this.$inertia.post('/roles/' + item.id, { 
        _method:'DELETE'        
      })
      this.closeConfirmation()
    },
  }

  
}

</script>