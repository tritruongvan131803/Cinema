<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card radius-10 border-top border-0 border-5 border-primary p-3">
                    <form class="row g-2 align-items-end">
                        <!-- Tìm kiếm đơn đặt -->
                        <div class="col-md-4">
                            <label for="search" class="form-label">Tìm kiếm</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm đơn đặt..." id="search" />
                                <button class="btn btn-primary" type="submit">Tìm Kiếm</button>
                            </div>
                        </div>

                        <!-- Từ ngày -->
                        <div class="col-md-3">
                            <label for="fromDate" class="form-label">Từ ngày</label>
                            <input type="date" class="form-control" id="fromDate" placeholder="dd/mm/yyyy" />
                        </div>

                        <!-- Đến ngày -->
                        <div class="col-md-3">
                            <label for="toDate" class="form-label">Đến ngày</label>
                            <input type="date" class="form-control" id="toDate" placeholder="dd/mm/yyyy" />
                        </div>

                        <!-- Nút lọc -->
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Lọc</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card border-top border-0 border-5 border-success">
                    <div class="card-body">
                        <h5 class="card-title">DANH SÁCH ĐƠN ĐẶT HÀNG</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Mã Hóa Đơn</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Tổng Tiền</th>
                                        <th>Giảm Giá</th>
                                        <th>Tiền Thực Nhận</th>
                                        <th>Ngày Đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Chi Tiết</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(value, index) in list_donhang" :key="index">
                                        <tr>
                                            <td>{{ value.ma_don_hang }}</td>
                                            <td>{{ value.ten_khach_hang }}</td>
                                            <td>{{ value.tong_tien }} ₫</td>
                                            <td>{{ value.giam_gia }} ₫</td>
                                            <td>{{ value.tien_thuc_nhan }} ₫</td>
                                            <td>{{ value.ngay_dat }}</td>
                                            <td>
                                                <button class="btn btn-success">Đã Thanh Toán</button>
                                            </td>
                                            <td>
                                                <button @click="chitiet_DonHang = value" data-bs-toggle="modal"
                                                    data-bs-target="#updateModal" class="btn btn-info text-white">
                                                    <i class="fa-solid fa-eye ms-1"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button @click="delete_DonHang = value" class="btn btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                    <b>X</b>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- models Xoá -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa Đơn Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Bạn có chắc chắn muốn xóa đơn hàng
                        <strong>{{ delete_DonHang.ma_don_hang }}</strong>?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" v-on:click="xoaDonHang()">
                        Xác nhận
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cập Nhật -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết Thông Tin Đơn Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table-container">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Dịch Vụ</th>
                                            <th scope="col">Đơn Giá</th>
                                            <th scope="col">Ghi Chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(value, index) in chi_tiet_DonHang" :key="index">
                                            <tr>
                                                <th scope="row">{{ index + 1 }}</th>
                                                <td>{{ value.ten_dich_vu }}</td>
                                                <td>{{ value.don_gia }} ₫</td>
                                                <td>{{ value.ghi_chu }}</td>
                                            </tr>
                                        </template>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Combo gia đình</td>
                                            <td>120.000 ₫</td>
                                            <td>combo gia đình ghi chú</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-container">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên Ghế</th>
                                            <th scope="col">Tên Phim</th>
                                            <th scope="col">Suất Chiếu</th>
                                            <th scope="col">Giá Vé</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Ghế C12</td>
                                            <td>Doraemon</td>
                                            <td>09:00 - 30/05/2025</td>
                                            <td>120.000 ₫</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
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
            list_donhang: [],
            chi_tiet_DonHang:[],
            delete_DonHang: {},
            chitiet_DonHang: {},
        }
    },
    mounted() {
        this.loadDonHang();
    },
    methods: {
        loadDonHang() {
            axios
                .get("http://127.0.0.1:8000/api/admin/don-hang/load-Data")
                .then((res) => {
                    this.list_donhang = res.data.data;
                })
                .catch(err => {
                    console.error("Server trả về:", err.response?.data || err.message);
                });
        },
        xoaDonHang() {
            axios
                .get('http://127.0.0.1:8000/api/admin/don-hang/delete/${id}', this.delete_DonHang)
                .then((res) => {
                    if (res.data.status) {
                        this.loadDonHang();
                        this.$toast.success(res.data.message);
                    } else {
                        this.$toast.error("Xóa đơn hàng thất bại");
                    }
                })
                .catch((err) => {
                    console.error(err);
                    this.$toast.error("Lỗi khi xóa đơn hàng");
                });
        },

    },
};
</script>
<style></style>
