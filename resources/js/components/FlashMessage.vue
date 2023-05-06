<template>
  <div>
    <span v-if="flashShoots === 'success'" class="badge bg-success flash-position">Success</span>
    <span v-if="flashShoots === 'failure'" class="badge bg-danger flash-position">Name is required</span>
  </div>
</template>
 
<script>
export default {

  props: [
    'flashShoots'
  ],

  updated() {
    setTimeout(() => {
      this.$emit("flashoffed")
    }, 1000)
    
  }
}
</script>

<style>
.flash-position {
  margin: 30px 0 0 0;
}
</style>