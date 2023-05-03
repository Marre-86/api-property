<template>
    <h1 class="display-3">Hello, world!</h1>
<p class="lead">This is a simple hero unit!</p>
<hr class="my-4">
  <HouseList />
</template>
<script>
import HouseList from './components/HouseList.vue'

export default {
  components: {
    HouseList
  }
}
</script>