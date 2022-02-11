<template>
  <main class="container">
    <h1>{{post.title}}</h1>
    <small v-if="post.category">Categoria: <em>{{post.category.name}}</em></small>
    <p>{{post.content}}</p>
    <ul v-if="post.tags">
      <li v-for="(tag, index) in post.tags" :key="`tag${index}`">
        {{tag.name}}
      </li>
    </ul>
    <router-link class="button" :to="{name: 'blog'}">Torna alla lista</router-link>
  </main>
</template>

<script>
export default {
  name: 'PostDetail',
  data(){
    return {
      post: {
        title: '',
        content: '',
        category: {},
        tags: []
      },
      apiUrl: 'http://127.0.0.1:8000/api/posts/'
    }
  },
  methods: {
    getApi(){
      axios.get(this.apiUrl + this.$route.params.slug)
          .then(res => {
            this.post = res.data;
          })
    }
  },
  mounted() {
    this.getApi();
  }
}
</script>

<style lang="scss" scoped>
  main.container {
      margin-top: 30px;
      h1 {
        padding-bottom: 20px;
      }
      p {
        margin-bottom: 10px;
        margin-top: 5px;
      }
      ul {
        list-style: none;
        li {
          display: inline-block;
          margin-right: 5px;
          background-color: #42C273;
          font-size: 10px;
          border-radius: 10px;
          color: white;
          padding: 5px;
          margin-bottom: 20px;
        }
      }
      .button {
        text-decoration: none;
        padding: 5px;
        color: black;
        background-color: #FAC20A;
        border-radius: 5px;
      }
    }
</style>