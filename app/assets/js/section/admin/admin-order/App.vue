<template>
  <div class="table-additional-selection">
    <hr/>
    <OrderProductItem
        v-for="(orderProduct, index) in staticStore.orderProducts"
        :key="orderProduct.id"
        :order-product="orderProduct"
        :index="index"
    />
    <hr/>
  </div>
</template>

<script>
import {mapState} from "vuex";
import OrderProductItem from "./components/OrderProductItem.vue";

export default {
  components: {OrderProductItem},
  computed: {
    ...mapState("products", ["staticStore"]),
  }
}
</script>
