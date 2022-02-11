<template>
  <div class="post">
    <h3>
      <router-link :to="{name: 'detail', params: {slug: post.slug}}">{{post.title}}</router-link>
    </h3>
    <p>{{post.content}}</p>
  </div>
</template>

<script>
export default {
  name: 'SinglePost',
  props: {
    "post": Object
  }
}
</script>

<style lang="scss">
  .post {
    margin: 50px 10px;
    border: 1px solid black;
    border-radius: 10px;
    padding: 20px;
    h3 {
      padding-bottom: 15px;
    }
    a, a:visited {
      text-decoration: none;
      color: black;
      &:hover {
        text-decoration: underline;
      }
    }
  }
</style>