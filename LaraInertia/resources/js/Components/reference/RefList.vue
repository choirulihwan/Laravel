<template>
    <div class="bg-white px-4 py-4 sm:p-6">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div class="flex justify-end">
                            <SuccessButton @click="openForm()" class="mb-2">
                                <template #default>Create</template>
                            </SuccessButton>
                        </div>

                        <table class="w-full text-center border">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">#</th>
                                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">Kode
                                        Group</th>
                                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">Kode
                                        Ref</th>
                                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">
                                        Keterangan</th>
                                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 border-r">
                                        Keterangan Label
                                    </th>
                                    <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b" v-for="(item, index) in refs.data" :key="item.id">
                                    <td class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap border-r">{{
        ++index
}}</td>
                                    <td class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap border-r">{{
        item.id_ref
}}</td>
                                    <td class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap border-r">{{
        item.no_ref
}}</td>
                                    <td
                                        class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap border-r text-left">
                                        {{ item.keterangan }}</td>
                                    <td
                                        class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap text-left border-r">
                                        {{ item.keterangan2 }}</td>
                                    <td class="text-sm text-gray-900 font-light px-3 py-2 whitespace-nowrap">
                                        <WarningButton class="mx-2" @click="openForm(item)">
                                            <template #default>Edit</template>
                                        </WarningButton>
                                        <!-- onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()"  -->
                                        <DangerButton @click="confirmDelete(item)">
                                            <template #default>Delete</template>
                                        </DangerButton>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <pagination :links="refs.links"></pagination>

                        <dialog-modal :show="isOpen">
                            <template #title>
                                <h1 v-if="!isEdit">Create Reference</h1>
                                <h1 v-if="isEdit">Update Reference</h1>
                            </template>
                            <template #content>
                                <ref-form :form="form" :isEdit="isEdit" :isOpen="isOpen"></ref-form>
                            </template>
                            <template #footer>
                                <SecondaryButton @click="closeModal()">
                                    <template #default>Close</template>
                                </SecondaryButton>

                                <PrimaryButton @click="saveItem(form)">
                                    <template #default>Save</template>
                                </PrimaryButton>

                            </template>
                        </dialog-modal>

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
  id_ref: null, no_ref: null, keterangan: null, keterangan2: null
}

import Pagination from '../../Components/Pagination.vue'
import DialogModal from '../../Components/DialogModal.vue'
import DangerButton from '../../Components/DangerButton.vue'
import WarningButton from '../../Components/WarningButton.vue'
import SuccessButton from '../../Components/SuccessButton.vue'
import ConfirmationModal from '../../Components/ConfirmationModal.vue'
import SecondaryButton from '../../Components/SecondaryButton.vue'
import PrimaryButton from '../../Components/PrimaryButton.vue'
import RefForm from '../../Components/reference/RefForm.vue'

export default {
  props: ['refs'],
  components: {
    Pagination,
    RefForm,
    DialogModal,
    DangerButton,
    WarningButton,
    SuccessButton,
    ConfirmationModal,
    SecondaryButton,
    PrimaryButton,    
  },

  data() {
    return {
      isEdit: false,
      form: defaultFormObject,
      isOpen:false,
      isConfirm: false, 
    }
  },

  methods: {
    saveItem(item) {
      let url = '/reference'
      
      if (item.id) {
        url = '/reference/' + item.id
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
      this.$inertia.post('/reference/' + item.id, { 
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
