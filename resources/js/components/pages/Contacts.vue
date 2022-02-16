<template>
  <main class="container">
    <h1>Contatti Vue</h1>
    <p>Pagina 'Contatti' con Componente di Vue.</p>

    <h2 v-if="success">Email inviata correttamente</h2>

    <div class="form-contatti">
      <form @submit.prevent="sendForm">
        <div>
          <label for="name">Nome</label>
          <input type="text" id="name" v-model="name" placeholder="Il tuo nome">
            <!-- errors.name è un array, devo stampare il primo elemento -->
          <p class="errors" v-if="errors.name">
            {{errors.name[0]}}
          </p>

        </div>
        <div>
          <label for="email">Indirizzo email mittente</label>
          <input type="email" id="email" v-model="email" placeholder="Il tuo indirizzo email">
          <p class="errors" v-if="errors.email">
            {{errors.email[0]}}
          </p>

        </div>
        <div>
          <label for="message">Messaggio</label>
          <textarea name="" id="message" v-model="message" cols="30" rows="10" placeholder="Testo della mail"></textarea>
          <p class="errors" v-if="errors.message">
            {{errors.message[0]}}
          </p>

        </div>
        <button type="submit" :disabled="isSending">
          {{ isSending ? 'Invio in corso' : 'Invia' }}
        </button>
        <button type="reset" class="r">Reset</button>
      </form>
    </div>

  </main>
</template>

<script>
export default {
  name: 'Contacts',
  data() {
    return {
      name: '',
      email: '',
      message: '',
      errors: {},
      isSending: false,
      success: false
    }
  },
  methods: {
    sendForm() {
      // console.log('form');
      this.isSending = true;
      this.success = false;
      axios.post('api/contacts', {
        'name': this.name,
        'email': this.email,
        'message': this.message,
      }).then(res => {
        console.log(res.data);
        this.isSending = false;
        if (!res.data.success) {
          this.errors = res.data.errors;
          console.log(this.errors);
        }else {
          this.success = true;
          this.errors = {};
          this.name = '';
          this.email = '';
          this.message = '';
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
  main.container {
      margin: 30px auto;
      h1 {
        padding-bottom: 20px;
      }

      h2 {
        display: inline-block;
        width: 40%;
        color: green;
        background-color: lightgreen;
        border-radius: 10px;
        margin-top: 30px;
        padding: 10px 15px;
      }

      .form-contatti {
        margin: 50px 0;
        div {
          margin-bottom: 15px;
          label { 
            display: block; 
            margin-bottom: 5px;
          }
          input, textarea {
            padding: 6px 8px;
            width: 40%;
          }
          .errors {
            font-size: 14px;
            color: red;
            padding-top: 10px;
          }
        }
        button {
          text-decoration: none;
          padding: 5px 10px;
          color: black;
          background-color: #FAC20A;
          border-radius: 5px;
          cursor: pointer;
          border: none;
          font-size: 16px;
          &:hover {
            background-color: #e0c66f;
          }
          &.r {
            background-color: coral;
            &:hover {
              background-color: lightcoral;
            }
          }
        }
      }

    }
</style>