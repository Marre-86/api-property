<template>
      <div style="display:inline-block; border: solid 1px #c7cfd3; border-radius: 10px; vertical-align:middle; margin-top:10px; padding-left: 10px; padding-right:10px">
            <div style="text-align: center; margin:5px 0 -15px 0"><h5>Add new house </h5></div>
            <hr>
            <form v-on:submit.prevent="submitForm">
              <div>
                <div class="formInput">
                    <label for="name">Name</label>
                    <input v-model="form.name" type="text" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="formInput">
                    <label for="name">Price</label>
                    <input v-model="form.price" type="number" class="form-control" id="price" placeholder="Price">
                </div>
                <div class="formInput">
                    <label for="name">Bedrooms</label>
                    <input v-model="form.bedrooms" type="number" class="form-control" id="bedrooms" placeholder="Bedrooms">
                </div>
              </div>
              <div>
                <div class="formInput">
                    <label for="name">Bathrooms</label>
                    <input v-model="form.bathrooms" type="number" class="form-control" id="bathrooms" placeholder="Bathrooms">
                </div>
                <div class="formInput">
                    <label for="name">Storeys</label>
                    <input v-model="form.storeys" type="number" class="form-control" id="storeys" placeholder="Storeys">
                </div>
                <div class="formInput">
                    <label for="name">Garages</label>
                    <input v-model="form.garages" type="number" class="form-control" id="garages" placeholder="Garages">
                </div>
                <div class="formSubmit">
                    <button class="btn btn-primary">Submit</button>
                </div>
                <FlashMessage :flashShoots="flashShoots" @flashoffed="handleFlashOffed" />
              </div>
            </form>
    </div>
</template>
 
<script>

import axios from 'axios';
import FlashMessage from './FlashMessage.vue'

export default {
    components: {
      FlashMessage
    },
    data(){
        return{
            flashShoots: 0,
            api_url: "",
            form: {
                name: '',
                price: 0,
                bedrooms: 2,
                bathrooms: 2,
                storeys: 2,
                garages: 2
            }
        }
    },
    methods:{
        submitForm(){
            axios.post('api/v1/houses', this.form)
                 .then((res) => {
                  this.$emit("house-added")
                  this.flashShoots = 'success';
                 })
                 .catch((error) => {
                  this.flashShoots = 'failure';
                 }).finally(() => {
                     //Perform action in always
                 });
        },
        handleFlashOffed() {
          this.flashShoots = 0;
        }
    }
}
  
</script>
<style>
  .formInput {
    width: 8rem;
    margin-left:10px;
    margin-bottom:16px;
    float:left;
  }
  .formSubmit {
    width: 8rem;
    margin: 24px 0 10px 10px;
    float:left;
  }
</style>