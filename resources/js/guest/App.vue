<template>
  <div class="wrapper">
    <Header />
    
    <router-view></router-view>

  </div>
</template>

<script>
import Header from '../components/partials/Header.vue';
import PostContainer from '../components/pages/PostContainer.vue';

export default {
  name: 'App',
  components: {
    Header,
    PostContainer
  }
}
</script>

<style lang="scss">
.container {
  width: 70%;
  margin: 0 auto;
}
</style>