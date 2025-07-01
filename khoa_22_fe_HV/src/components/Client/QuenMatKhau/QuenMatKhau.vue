<template >
     <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4" style="max-width: 400px; width: 100%;">
      <div class="icon-circle">
        <i class="fa-solid fa-lock"></i>
      </div>
      <h4 class="text-center fw-bold mb-2">Quên mật khẩu</h4>
      <p class="text-center text-muted mb-4">
        Đừng lo! Nhập địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn hướng dẫn để đặt lại mật khẩu.
      </p>

      <div class="mb-3">
        <label for="email" class="form-label">Địa chỉ Email</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
          <input v-model="user.email" type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email của bạn">
        </div>
      </div>

      <div class="d-grid">
        <button @click="quenMatKhau()" class="btn btn-primary">
          <i class="fa-solid fa-paper-plane"></i> Gửi lại mật khẩu
        </button>
      </div>

      <div class="text-center mt-3">
        <RouterLink to="/client/dang-nhap" class="text-decoration-none"><i class="fa-solid fa-arrow-left"></i> Quay lại trang <b>Đăng nhập </b></RouterLink>
      </div>

      <div class="alert alert-info mt-4 d-flex align-items-start" role="alert">
        <i class="fa-solid fa-info-circle me-2"></i>
        <div>
          <strong>Cần giúp đỡ?</strong><br>
          Nếu bạn không nhận được email trong vài phút, vui lòng kiểm tra thư mục spam hoặc liên hệ với bộ phận hỗ trợ.
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
import { RouterLink } from 'vue-router';
  axios
export default {
    data() {
      return {
        user:{},
      }
    },
    methods: {
      quenMatKhau(){
         axios
                .post("http://127.0.0.1:8000/api/client/quen-mat-khau", this.user)
                .then((res) => {
                    if (res.data.status) {
                       this.$toast.success(res.data.message);
                    } else {
                       this.$toast.error(res.data.message);
                    }
                })
      }
    },
}
</script>
<style >
     body {
      background-color: #f5f6fa;
    }
    .card {
      border: none;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .icon-circle {
      width: 60px;
      height: 60px;
      background-color: #e6f0ff;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 20px;
      font-size: 30px;
      color: #007bff;
    }
    .form-control::placeholder {
      color: #ccc;
    }
</style>