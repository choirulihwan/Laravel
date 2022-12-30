<template>
    <div class="bg-white px-4 py-4 sm:p-6">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div class="flex justify-end">
                            <SuccessButton class="mb-2">                                
                                <NavLink :href="route('roles.create')">
                                    <template #default>{{ $t('Create') }}</template>
                                </NavLink>
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
                                            <NavLink :href="route('roles.edit', item.id)">
                                                <template #default>{{ $t('Edit') }}</template>
                                            </NavLink>
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
</template>

<script>

const defaultFormObject = {
  name: null, guard: null
}

import DialogModal from '../../Components/DialogModal.vue'
import DangerButton from '../../Components/DangerButton.vue'
import WarningButton from '../../Components/WarningButton.vue'
import SuccessButton from '../../Components/SuccessButton.vue'
import ConfirmationModal from '../../Components/ConfirmationModal.vue'
import SecondaryButton from '../../Components/SecondaryButton.vue'
import PrimaryButton from '../../Components/PrimaryButton.vue'
import NavLink from '@/Components/NavLink.vue'

export default {
  props: ['roles', 'permission', 'role_permission'],
  components: {
    DialogModal,
    DangerButton,
    WarningButton,
    SuccessButton,
    ConfirmationModal,
    SecondaryButton,
    PrimaryButton,    
    NavLink,
  },

  data() {
    return {
      isEdit: false,
      form: defaultFormObject,
      isOpen:false,
      isConfirm: false, 
    }
  },

  mounted() {
    // console.log(this.permission)
  },

  methods: {
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
          this.closeModal()          
        }
      });      
    },

    closeModal() {
      this.isOpen = false
    },

    openForm(item) {
      this.isOpen = true
      this.isEdit = !!item
      this.form = this.isEdit ? item : defaultFormObject      
    }, 

    confirmDelete(item) {
      this.isConfirm = true      
      this.form = item ? item : defaultFormObject
    },

    deleteItem(item) {      
      this.$inertia.post('/roles/' + item.id, { 
        _method:'DELETE'        
      })
      this.closeConfirmation()
    },

    closeConfirmation() {
      this.isConfirm = false
    },
  }

  
}
</script>
