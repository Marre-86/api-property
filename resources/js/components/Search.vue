<template>
  <div>
    <div class="searchDropdown">
      <p class="caption">---Name  ---</p>
      <input v-model="filter_name" type="text" class="form-control" placeholder="Default input">
    </div>
    <div class="searchDropdown">
      <p class="caption">---Price (from)---</p>
      <input  v-model="filter_price_gte" type="range" class="form-range" min="0" max="1000000" step="100000">
      <p style="text-align: center;">{{ filter_price_gte }}</p>
    </div>
    <div class="searchDropdown">
      <p class="caption">---Price (to)---</p>
      <input  v-model="filter_price_lte" type="range" class="form-range" min="0" max="1000000" step="100000">
      <p style="text-align: center;">{{ filter_price_lte }}</p>
    </div>
  </div>
  <div style="clear:both">
    <div class="searchDropdown">
      <p class="caption">---Bedrooms---</p>
      <select v-model="filter_bedrooms" class="form-select form-control">
        <option value="">---- doesn't matter ----</option>
        <option value="filter[bedrooms]=3&">3</option>
        <option value="filter[bedrooms]=4&">4</option>
        <option value="filter[bedrooms]=5&">5</option>
      </select>
    </div>
    <div class="searchDropdown">
      <p class="caption">---Bathrooms---</p>
      <select v-model="filter_bathrooms" class="form-select form-control">
        <option value="">---- doesn't matter ----</option>
        <option value="filter[bathrooms]=2&">2</option>
        <option value="filter[bathrooms]=3&">3</option>
      </select>
    </div>
    <div class="searchDropdown">
      <p class="caption">---Storeys---</p>
      <select v-model="filter_storeys" class="form-select form-control">
        <option value="">---- doesn't matter ----</option>
        <option value="filter[storeys]]=1&">1</option>
        <option value="filter[storeys]=2&">2</option>
      </select>
    </div>
    <div class="searchDropdown">
      <p class="caption">---Garages---</p>
      <select v-model="filter_garages" class="form-select form-control">
        <option value="">---- doesn't matter ----</option>
        <option value="filter[garages]=1&">1</option>
        <option value="filter[garages]=2&">2</option>
        <option value="filter[garages]=3&">3</option>
      </select>
    </div>
  </div>
  <hr style="clear:both">

<HouseList :api_url="`api/v1/houses?${filter_name ? `filter[name]=${filter_name}&` : ''}${filter_price_gte ? `filter[price-gte]=${filter_price_gte}&` : ''}${filter_price_lte ? `filter[price-lte]=${filter_price_lte}&` : ''}${filter_bedrooms}${filter_bathrooms}${filter_storeys}${filter_garages}`"/>
</template>
 
<script>
import HouseList from './HouseList.vue'

export default {
  components: {
    HouseList
  },
  data() {
      return {
        api_url: "",
        filter_name: "",
        filter_price_gte: "",
        filter_price_lte: "",
        filter_bedrooms: "",
        filter_bathrooms: "",
        filter_storeys: "",
        filter_garages: "",
    };
  },
}
</script>

<style>
.caption {
  margin: 0;
  margin-bottom: 10px;
  margin-left:20px;
}
  .searchDropdown {
    width: 13rem;
    margin-left:10px;
    margin-bottom:16px;
    float:left;
  }
</style>