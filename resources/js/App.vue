<template>
    <a href="/">
      <img href="/" src="/pics/villa-verify-logo.png" alt="logo" style="width:12rem; margin:10px">
    </a>
    <div class="wrapper">
      <div class="wrapper-in"><h1 style="margin-left:1rem">Real Property Register</h1></div>
      <div>
        <p>This page is a facade of <b>Villa Verify</b> public API, providing access to  
          its real property register. You can download OpenAPI definitions in YAML by 
            <a href="/openapi.yaml">clicking here</a>.</p>
      </div>      
    </div>
    <Body /> 
    <p style="margin-left:15px">Created by <a href="https://www.linkedin.com/in/artem-pokhiliuk/">Artem Pokhiliuk</a>.</p>
    <p style="margin-left:15px; margin-top:-15px">Source code - <a href="https://github.com/Marre-86/api-property">github</a>.</p>
</template>

<script>
import Body from './components/Body.vue'

export default {
  components: {
    Body
  }
}
</script>
<style>
.borderline {
    height: 12px;
    border: 0;
    box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
}
.wrapper {
  vertical-align:middle; 
  width:32rem;
  padding: 0 20px;
  display:inline-block;
}
.wrapper-in {
  border-right: 2px solid;
  padding: 10px;
  box-shadow: 6px 4px 8px;
  margin-bottom:20px;
}
@media (max-width: 1250px) {
  .wrapper {
  width:22rem;
}
}
</style>