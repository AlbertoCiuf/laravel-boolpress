<template>
  <header>
    <div class="container">
      <nav>
        <ul>
          <li>
            <router-link :to="{name: 'home'}">Home</router-link>
          </li>
          <li>
            <router-link :to="{name: 'blog'}">Blog</router-link>
          </li>
          <li>
            <router-link :to="{name: 'contacts'}">Contatti</router-link>
            <!-- <router-link to="/contatti">Contatti</router-link> -->
          </li>
        </ul>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
  name: 'Header'
}
</script>

<style lang="scss" scoped>
  header {
    height: 70px;

    background-color: cornflowerblue;
    nav {
      height: 100%;
      line-height: 70px;
      ul {
        list-style: none;
        li {
          display: inline-block;
          margin-right: 10px;
          a {
            text-decoration: none;
            color: black;
            &:hover {
              color: white;
              text-decoration: underline;
            }
            &.active {
              color: white;
              text-decoration: underline;
              font-weight: bold;
            }
          }
        }
      }
    }
  }
</style>