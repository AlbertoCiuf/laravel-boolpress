<template>
  <aside>

    <div class="box categories">
      <h3>Categorie</h3>
      <span v-for="category in categories" :key="`cat${category.id}`"
      @click="$emit('getPostCat', category.slug)">
        {{category.name}}
      </span>
    </div>

    <div class="box tags">
      <h3>Tag</h3>
      <span v-for="tag in tags" :key="`tag${tag.id}`"
      @click="$emit('getPostTag', tag.slug)">
        {{tag.name}}
      </span>  
    </div>

    <a class="button" @click="$emit('getAllPosts')">Visualizza tutti</a>

  </aside>
</template>

<script>
export default {
  name: 'Sidebar',
  props: {
    "categories": Array,
    "tags": Array
  }
}
</script>

<style lang="scss" scoped>
  aside {
    max-width: 30%;
    .box {
      border: 2px solid cornflowerblue;
      border-radius: 10px;
      padding: 20px; 
      margin-bottom: 20px;
      span {
        cursor: pointer;
        display: inline-block;
        margin: 10px;
        border-radius: 10px;
        padding: 5px 7px;
      }
      &.categories span {
        background-color: lightgreen;
        &:hover {
          background-color: rgb(174, 233, 174);
        }
      }
      &.tags span {
        background-color: cornflowerblue;
        &:hover {
          background-color: rgb(130, 167, 235);
        }
      }
    }
    a.button {
      text-decoration: none;
      padding: 5px;
      color: black;
      background-color: #FAC20A;
      border-radius: 5px;
      cursor: pointer;
      &:hover {
        background-color: #e0c66f;
      }
    }
  }
</style>