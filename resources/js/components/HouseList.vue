<template>
  <div class="card text-white bg-primary mb-3" style="width: 13rem; float:left; margin-left:10px" v-for="house in houses" :key="house.id">
    <div class="card-header">{{ house.name }}</div>
    <div class="card-body">
      <h4 class="card-title">Price: {{ house.price }}</h4><hr>
      <div style="float:left;font-size: 0.9rem;">Bedrooms: {{ house.bedrooms }}<br>Bathrooms: {{ house.bathrooms }}</div>
      <div style="float:right; text-align: right;font-size: 0.9rem;">Storeys: {{ house.storeys }}<br>Garages: {{ house.garages }}</div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      houses: []
    };
  },
  mounted() {
    axios.get("http://localhost:8000/api/v1/houses")
      .then(res => {
        this.houses = res.data;
        console.log(this.houses)
      })
      .catch(error => {
        console.log(error)
         // Manage errors if found any
      })
  }
};
</script>