<template>
  <div>
    <div v-if="houses.length > 0" v-for="house in houses" :key="house.id" class="card text-white bg-primary mb-3" style="width: 13rem; float:left; margin-left:10px">
      <div class="card-header">{{ house.name }}</div>
      <div class="card-body">
        <h4 class="card-title">Price: {{ house.price }}</h4><hr>
        <div style="float:left;font-size: 0.9rem;">Bedrooms: {{ house.bedrooms }}<br>Bathrooms: {{ house.bathrooms }}</div>
        <div style="float:right; text-align: right;font-size: 0.9rem;">Storeys: {{ house.storeys }}<br>Garages: {{ house.garages }}</div>
      </div>
    </div>
    <div v-else class="card border-primary mb-3" style="max-width: 20rem; text-align: center; margin:auto">
      <div class="card-body">
        <h4 class="card-title">No results</h4>
        <p class="card-text">Try to change your conditions</p>
    </div>
</div>
  </div>
</template>

<script>
import axios from "axios";
export default {

  props: [
    'api_url'
  ],
  data() {
    return {
      houses: []
    };
  },
  watch: {
    api_url: {
      handler(){
        axios.get(this.api_url)
        .then(res => {
          this.houses = res.data;
          console.log(this.houses)
        })
        .catch(error => {
          console.log(error)
          // Manage errors if found any
        })
      },
      immediate: true
    }
  }
};
</script>