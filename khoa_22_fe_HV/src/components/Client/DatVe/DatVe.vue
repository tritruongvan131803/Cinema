<template>
    <div class="container mt-4">
        <div class="row">
            <table class="table table-bolderless text-center mt-3">
                <tbody>
                    <tr>
                        <th colspan="100%" class="text-white bg-dark text-center">MÀN HÌNH</th>
                    </tr>
                    <tr v-for="(row, key) in theo_dong" :key="key">
                        <template v-for="(value, index) in row" :key="index">
                            <th v-on:click="giuCho(value)">
                                <div class="border rounded shadow-sm bg-light">
                                    <div class="fw-bold">{{ value.ten_ghe }} <br> {{ formatVND(value.gia_ve) }}</div>
                                    <template v-if="value.id_don_dat_ve > 0">
                                        <i class="fa-solid fa-couch fa-couch fa-2x mt-0 text-danger"></i>
                                        <br>

                                    </template>
                                    <template v-else-if="value.id_don_dat_ve == 0">
                                        <i class="fa-solid fa-couch fa-couch fa-2x mt-0"></i>
                                        <br>

                                    </template>
                                    <template v-else>
                                        <i class="fa-solid fa-couch fa-couch fa-2x mt-0 text-success"></i>
                                        <br>
                                    </template>
                                </div>
                            </th>
                        </template>
                    </tr>
                </tbody>
            </table>
            <div class="col-lg-12">
                <div class="card radius-10 border-top border-0 border-5 border-success"></div>
                <div class=" mb-3 d-flex align-items-center gap-4  p-2 text-black rounded">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-danger rounded" style="width: 20px; height: 20px; border: 1px solid #ccc;">
                        </div>
                        <span>Ghế đã bán</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-success rounded" style="width: 20px; height: 20px;"></div>
                        <span>Ghế đang chọn</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card radius-10 border-top border-0 border-5 border-success">
                    <div class="card-body">
                        <h1 class="mt-2">DANH SÁCH DỊCH VỤ</h1>
                    </div>
                    <div v-for="(value, index) in list_ben_trai" :key="index" class="card">
                        <template v-if="value.tinh_trang == 1">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img :src="value.hinh_anh" alt=""
                                        style="height: 180px; width: 190px; object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ value.ten_dich_vu }}</h5>
                                        <p class="card-text">{{ value.mo_ta }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text fw-bold mb-0">Giá: {{ formatVND(value.gia) }}</p>
                                            <div class="">
                                                <div class="input-group input-group-sm">
                                                    <button class="btn btn-primary" v-on:click="addDichVu(value)">Thêm
                                                        dịch vụ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card radius-10 border-top border-0 border-5 border-warning">
                    <div class="card-body">
                        <div v-if="tt_phim && tt_phim.thoi_gian_bat_dau && tt_phim.ngay_chieu" class="d-flex mb-2">
                            <img :src="tt_phim.hinh_anh" alt="" class="img-fluid rounded me-3" style="width:300px">
                            <div>
                                <h6 class="mb-1 fw-bold">{{ tt_phim.ten_phim }}</h6>
                                <p class="mb-1 text-muted small">{{ tt_phim.the_loai }}</p>
                            </div>
                        </div>
                        <p class="mb-3">Suất chiếu: <strong>{{ tt_phim.thoi_gian_bat_dau }}</strong> - <strong>{{
                            tt_phim.thoi_gian_ket_thuc }}</strong> - Ngày: <strong>{{ tt_phim.ngay_chieu }}
                                <strong></strong></strong></p>
                        <hr class="my-2" style="border: 1px dashed;">
                        <template v-for="(value, index) in list_ben_phai" :key="index">
                            <template v-if="value.type == 1">
                                <div class="d-flex justify-content-between">
                                    <div>{{ value.ten_ghe }}</div>
                                    <div>{{ formatVND(value.gia_ve) }} <button @click="btnXoaGhe(value)"
                                            class="btn btn-danger btn-sm">x</button></div>
                                </div>
                                <hr class="my-2" style="border: 1px dashed;">
                            </template>
                        </template>

                        <template v-for="(value, index) in list_ben_phai" :key="index">
                            <template v-if="value.type == 2">
                                <div class="d-flex justify-content-between">
                                    <div>{{ value.ten_dich_vu }}</div>
                                    <div>{{ formatVND(value.gia_ve) }} <button @click="btnXoaGhe(value)"
                                            class="btn btn-danger btn-sm">x</button></div>
                                </div>
                                <hr class="my-2" style="border: 1px dashed;">
                            </template>
                        </template>


                        <div class="d-flex justify-content-start mt-1">
                            <input v-model="ma_voucher" placeholder="Nhập vào mã voucher" type="text"
                                class="form-control me-4">
                            <button @click="thongTinVoucher()" class="btn btn-info text-light text-nowrap">Áp
                                dụng</button>
                        </div>
                        <hr class="my-2" style="border: 1px dashed;">
                        <div class="d-flex justify-content-between">
                            <strong>Tổng cộng</strong>
                            <strong class="text-danger mb-3">{{ formatVND(tinhTongTien) }}</strong>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-outline-dark w-100 me-2">Quay lại</button>
                                </div>
                                <div class="col-lg-6">
                                    <button @click="thanhToan()" class="btn btn-warning w-100 ">Thanh toán</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    props: ["id_suat_chieu"],
    data() {
        return {
            id_suat_chieu: this.$route.params.id_suat_chieu,
            tt_phim: {},
            list_ve: [],
            list_ben_trai: [],
            list_ben_phai: [],
            so_ghe_1_hang: null,
            ma_voucher: "",
            kq_voucher: {},
        };
    },
    mounted() {
        this.getVe();
        this.getDichVu();
        this.getPhim();
    },
    methods: {
        getPhim() {
            axios
                .post("http://127.0.0.1:8000/api/client/get-phim", { id_suat_chieu: this.id_suat_chieu }) // ✅ nhớ truyền object
                .then((res) => {
                    this.tt_phim = res.data.data 
                })
                .catch((err) => {
                    console.error(err);
                    this.tt_phim = {};
                });
        },
        thongTinVoucher() {
            var payload = {
                ma_code: this.ma_voucher
            };
            axios
                .post("http://127.0.0.1:8000/api/client/ap-voucher", payload)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.kq_voucher = res.data.data;
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
        },
        btnXoaGhe(value) {
            value.id_don_dat_ve = 0;
            this.list_ben_phai = this.list_ben_phai.filter(item => !(item.id === value.id && item.type === value.type))
        },
        addDichVu(value) {
            value.ten_ghe = value.ten_dich_vu
            value.gia_ve = value.gia
            value.type = 2
            this.list_ben_phai.push(value)
        },
        formatVND(number) {
            return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
        },
        getVe() {
            axios
                .get("http://127.0.0.1:8000/api/client/dat-ve/" + this.id_suat_chieu)
                .then((res) => {
                    if (res.data.status) {
                        this.list_ve = res.data.data;
                        this.so_ghe_1_hang = res.data.hang_ngang;
                        console.log(this.so_ghe_1_hang);

                    } else {
                        this.$toast.error(res.data.message);
                        this.$router.push("/phim");
                    }
                });
        },
        getDichVu() {
            axios
                .get("http://127.0.0.1:8000/api/client/dich-vu/get-data")
                .then((res) => {
                    this.list_ben_trai = res.data.data;
                })
        },
        giuCho(value) {
            if (value.id_don_dat_ve > 0) return;
            else if (value.id_don_dat_ve == 0) {
                value.id_don_dat_ve = -1;
                value.type = 1;
                this.list_ben_phai.push(value);
            }
            else {
                value.id_don_dat_ve = 0;
                this.list_ben_phai = this.list_ben_phai.filter(item => !(item.id == value.id && item.type == 1))
            }
        },
        thanhToan() {
            var payload = {
                'ma_code': this.ma_voucher,
                'list_ben_phai': this.list_ben_phai
            };
            axios
                .post("http://127.0.0.1:8000/api/client/dat-ve/thanh-toan", payload, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem('key_khach_hang'),
                    },
                })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);

                    } else {
                        this.$toast.error(res.data.message);
                    }
                })

        },
    },
    computed: {
        theo_dong() {
            let x = [];
            let so_tien_giam = 0;
            for (let i = 0; i < this.list_ve.length; i += this.so_ghe_1_hang) {
                x.push(this.list_ve.slice(i, i + this.so_ghe_1_hang));
            }
            return x;
        },
        tinhTongTien() {
            // return this.list_ben_phai.reduce((sum, value) => sum += value.gia_ve, 0)
            let tong = 0;
            let so_tien_giam = 0;
            for (let i = 0; i < this.list_ben_phai.length; i++) {
                tong += this.list_ben_phai[i].gia_ve;
            }
            if (tong >= this.kq_voucher.so_tien_toi_da) {
                so_tien_giam = tong * this.kq_voucher.so_giam_gia
                if (so_tien_giam > this.kq_voucher.so_tien_giam_gia) {
                    so_tien_giam = this.kq_voucher.so_tien_giam_gia;
                }
            }
            return tong - so_tien_giam;
        },

    },
};
</script>
<style></style>