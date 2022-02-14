<template>
  <main class="container">
    <h2>Tutti i post</h2>
    <div class="d-flex">
      <div v-if="posts">
        <SinglePost 
          v-for="(post, index) in posts" :key="`p${index}`"
          :post="post"
        />
      </div>
      <div v-else>
        <em>loading...</em>
      </div>

      <Sidebar :categories="categories" :tags="tags"
      @getPostCat="getPostCat"
      @getPostTag="getPostTag"
      @getAllPosts="getApiPosts"/>

    </div>
  </main>
</template>

<script>
import SinglePost from '../SinglePost.vue';
import Sidebar from '../partials/Sidebar.vue';
export default {
  name: 'PostContainer',
  components: {
    SinglePost,
    Sidebar
  },
  data() {
    return {
      posts: null,
      categories: [],
      tags: []
    }
  },
  methods: {
    getApiPosts() {
      this.posts = null;
      axios.get('http://127.0.0.1:8000/api/posts/')
      .then(res => {
        this.posts = res.data.posts;
        this.categories = res.data.categories;
        this.tags = res.data.tags;
      })
    },

    getPostCat($catSlug) {
      axios.get('http://127.0.0.1:8000/api/posts/postcategory/' + $catSlug)
          .then(res => {
            this.posts = res.data.category.posts;
          })

    },
    
    getPostTag($tagSlug) {
      axios.get('http://127.0.0.1:8000/api/posts/posttag/' + $tagSlug)
          .then(res => {
            this.posts = res.data.tag.posts;
          })

    },
  },
  mounted() {
    this.getApiPosts();
  }
}
</script>

<style lang="scss" scoped>
main.container {
  .d-flex {
    display: flex;
    gap: 20px;
  }
  h2 {
    margin-bottom: 20px;
  }
}
</style>