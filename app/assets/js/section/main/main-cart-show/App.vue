<template>
  <div class="row">
    <div class="col-lg-12 order-block">
      <div class="order-content">
        <Alert/>
        <div v-if="showCartContent">
          <CartProductList/>
          <CartTotalPrice/>
          <a
              class="btn btn-success mb-3 text-white"
              @click="makeOrder"
          >
            MAKE ORDER
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CartProductList from "./components/CartProductList.vue";
import CartTotalPrice from "./components/CartTotalPrice.vue";
import {mapActions} from "vuex";
import Alert from "./components/Alert.vue";

export default {
  name: "App",
  components: {Alert, CartTotalPrice, CartProductList},
  created() {
    this.getCart()
  },
  computed: {
    showCartContent() {
      return true;
    }
  },
  methods: {
    ...mapActions('cart', ['getCart']),
    makeOrder() {
      return true;
    }
  }
}
</script>

<style scoped>

</style>