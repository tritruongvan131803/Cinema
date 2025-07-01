<template>
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
      <h4 class="text-center fw-bold">ĐĂNG NHẬP <span class="text-primary">DZCINEMA</span></h4>
      <p class="text-center">Bạn chưa có tài khoản? <RouterLink to="/client/dang-ky">Đăng ký ngay</RouterLink></p>

      <div class="d-grid mb-2">
        <button class="btn btn-light border d-flex align-items-center justify-content-center">
          <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" width="20" class="me-2">
          Đăng nhập bằng Google
        </button>
      </div>

      <div class="login-separater text-center mb-1"> <span>OR</span>
        <hr />
      </div>

      <form>
        <div class="mb-3">
          <label for="username" class="form-label">Email</label>
          <input v-model="tt_login.email" type="text" class="form-control" id="username" placeholder="Email">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Enter Password</label>
          <div class="input-group">
            <input v-model="tt_login.password" type="password" class="form-control" id="password"
              placeholder="Password">
            <span class="input-group-text"><i class="fa-solid fa-eye-slash"></i></span>
          </div>
          <div class="text-end">
            <RouterLink to="/client/quen-mat-khau" class="mt-2">Quên mật khẩu</RouterLink>
          </div>
        </div>

        <div class="d-grid">
          <button v-on:click="login()" type="button" class="btn btn-success">Đăng Nhập</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>

import axios from 'axios';
import { RouterLink } from 'vue-router';
export default {
  data() {
    return {
      tt_login: {},
    }
  },
  methods: {
    login() {
      axios
        .post("http://127.0.0.1:8000/api/client/dang-nhap", this.tt_login)
        .then((res) => {
          if (res.data.status) {
            this.$toast.success(res.data.message)
            this.$router.push("/phim")
            localStorage.setItem('key_khach_hang', res.data.token)
          }
          else {
            this.$toast.error(res.data.message)
          }
        })
    }
  },
}
</script>
<style></style>