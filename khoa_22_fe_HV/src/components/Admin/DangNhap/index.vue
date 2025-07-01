<template>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow p-4 text-center" style="max-width: 400px; width: 100%;">
    
    <!-- Logo -->
    <img src="https://scontent.fdad3-5.fna.fbcdn.net/v/t39.30808-6/358154271_807802734213662_8397899367268683547_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=zAhSU0WurxoQ7kNvwHuGe25&_nc_oc=AdkV1P2EK3DwuCrxqki0j5ptnRszI0YfENkQfpVVvoyOddWHffY3kCQTXlZdAK6Sq-Ezd8qLe88j5lo5rt4XeMbJ&_nc_zt=23&_nc_ht=scontent.fdad3-5.fna&_nc_gid=cNFy7bT_eI0Bb9K-XyPzOg&oh=00_AfLrj9_odaFikLW6HkwxeO9CA9mNJNXE_7qlMgF96eIWYg&oe=68326989" alt="DZCINEMA Logo" class="mb-3" style="max-width: 100px; height: auto; margin: 0 auto;">

    <!-- Tiêu đề -->
    <h5 class="fw-bold">ĐĂNG NHẬP ADMIN <span class="text-primary">DZCINEMA</span></h5>

    <!-- Form đăng nhập -->
    <div class="text-start mt-4">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
          <input v-model="tt_login.email" type="email" class="form-control" id="email" placeholder="Email">
        </div>
      </div>

      <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
          <input v-model="tt_login.password" type="password" class="form-control" id="password" placeholder="Password">
        </div>
      </div>

      <div class="d-grid">
        <button v-on:click="login()" type="submit" class="btn btn-primary">
          <i class="fa-solid fa-arrow-right-to-bracket"></i> Đăng Nhập
        </button>
      </div>
    </div>

  </div>
</div>
</template>
<script>
import axios from 'axios';
export default {
  data() {
    return {
      tt_login: {},
    }
  },
  methods: {
    login(){
      axios
        .post("http://localhost:8000/api/admin/dang-nhap", this.tt_login)
        .then((res)=>{
          if(res.data.status){
            this.$toast.success(res.data.message)
            this.$router.push("/admin/phim")
            localStorage.setItem('key_admin',res.data.token)
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