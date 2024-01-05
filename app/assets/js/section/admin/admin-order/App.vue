<template>
  <div class="table-additional-selection">
    <OrderProductAdd/>
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
import OrderProductAdd from "./components/OrderProductAdd.vue";

export default {
  components: {OrderProductAdd, OrderProductItem},
  computed: {
    ...mapState("products", ["staticStore"]),
  }
}
</script>
