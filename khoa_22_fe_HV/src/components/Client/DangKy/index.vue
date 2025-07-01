<template>
    <div class="container">
        <div class="form-container">
            <h4 class="text-center fw-bold">
                ĐĂNG KÝ TÀI KHOẢN <span class="text-primary">BINI CINEMA</span>
            </h4>
            <p class="text-center">
                Bạn đã có tài khoản? <RouterLink to="/client/dang-nhap">Đăng nhập tại đây</RouterLink>
            </p>
            <form @submit.prevent="dangKyTaiKhoan">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input v-model="user.ho_va_ten" type="text" class="form-control" placeholder="Họ và tên" />
                    </div>
                    <div class="col-md-6">
                        <input v-model="user.email" type="email" class="form-control" placeholder="Email" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <input v-model="user.so_dien_thoai" type="text" class="form-control"
                            placeholder="Số điện thoại" />
                    </div>
                    <div class="col-md-4">
                        <input v-model="user.cccd" type="text" class="form-control" placeholder="Số CCCD" />
                    </div>
                    <div class="col-md-4">
                        <input v-model="user.ngay_sinh" type="date" class="form-control" placeholder="Ngày sinh" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 position-relative">
                        <input v-model="user.password" type="password" class="form-control" placeholder="Mật khẩu" />
                    </div>
                    <div class="col-md-6 position-relative">
                        <input v-model="user.re_password" type="password" class="form-control"
                            placeholder="Nhập lại mật khẩu" />
                    </div>
                </div>
                <div class="form-check form-switch mb-3">
                    <input v-model="user.check" class="form-check-input" type="checkbox" id="agree" />
                    <label class="form-check-label" for="agree">
                        Bằng việc đăng ký tài khoản, tôi đồng ý với Điều khoản dịch vụ &
                        Chính sách bảo mật của <strong>DZCinema</strong>.
                    </label>
                </div>
                <button @click="dangKyTaiKhoan()" type="submit" class="btn btn-success w-100">
                    <i class="bi bi-person-plus-fill"></i> ĐĂNG KÝ
                </button>
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
            user: {},
        }
    },
    methods: {
        dangKyTaiKhoan() {
            axios
                .post("http://127.0.0.1:8000/api/client/dang-ky", this.user)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                     
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
                .catch((error) => {
                    this.$toast.error("Đã xảy ra lỗi, vui lòng thử lại sau.");
                    console.error(error);
                });
                
        },
    },
};
</script>
<style>
.form-container {
    background: rgba(255, 255, 255, 0.95);
    padding: 30px;
    border-radius: 10px;
    max-width: 700px;
    margin: 100px auto;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

.form-check-label {
    font-size: 14px;
}
</style>
