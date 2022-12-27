<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Reference
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
          <RefList :refs="refs"></RefList>
        </div>
      </div>
    </div>    
  </AppLayout>
</template>
<script>

import RefList from '../../Components/reference/RefList.vue'
import AlertMessage from '../../Components/AlertMessage.vue'

export default {
  props: ['refs'],

  data() {
    return {
      alert_type: 'success'
    }    
  },

  components: {
    RefList,
    AlertMessage
  }
}

</script>