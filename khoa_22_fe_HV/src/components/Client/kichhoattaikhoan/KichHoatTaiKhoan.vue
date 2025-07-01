<template>
  <div class="container text-center mt-5">
    <h2>Kích hoạt tài khoản</h2>
    <p v-if="status === 'loading'">Đang xác minh liên kết kích hoạt...</p>
    <p v-if="status === 'success'" class="text-success">Tài khoản đã được kích hoạt thành công!</p>
    <p v-if="status === 'error'" class="text-danger">Liên kết không hợp lệ hoặc đã được sử dụng.</p>
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: ['key'],
  data() {
    return {
      status: 'loading',
    };
  },
  mounted() {
    const hashKey = this.$route.params.key;
    axios
      .post("http://localhost:8000/api/kich-hoat-tai-khoan", { key: hashKey })
      .then(() => {
        this.status = "success";
      })
      .catch(() => {
        this.status = "error";
      });
  }
};
</script>
