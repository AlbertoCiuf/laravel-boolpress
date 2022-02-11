<template>
  <main class="container">
    <h1>Home Component</h1>
    <p>Homepage del sito realizzata con un componente di Vue.</p>
  </main>
</template>

<script>
export default {
  name: 'Home'
}
</script>

<style lang="scss" scoped>
  main.container {
    margin-top: 30px;
    h1 {
      padding-bottom: 20px;
    }
  }
</style>