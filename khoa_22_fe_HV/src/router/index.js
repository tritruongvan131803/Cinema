import { createRouter, createWebHistory } from "vue-router"; // cài vue-router: npm install vue-router@next --save
import checkadmin from "./checkadmin";

const routes = [
  {
    path: "/",
    component: () => import("../components/Client/TrangChu/index.vue"),
    meta: { layout: "client" },
  },
  {
    path: "/client/dat-ve/:id_suat_chieu",
    component: () => import("../components/Client/DatVe/DatVe.vue"),
    meta: { layout: "client" },
    props: true,
  },
  {
    path: "/phim",
    component: () => import("../components/Client/Phim/index.vue"),
    meta: { layout: "client" },
  },
  {
    path: "/chi-tiet-phim/:id_phim",
    component: () => import("../components/Client/ChiTietPhim/index.vue"),
    meta: { layout: "client" },
    props: true,
  },
  {
    path: "/bai-viet",
    component: () => import("../components/Client/BaiViet/index.vue"),
    meta: { layout: "client" },
  },
  {
    path: "/chi-tiet-bai-viet/:id_bai_viet",
    component: () => import("../components/Client/ChiTietBaiViet/index.vue"),
    meta: { layout: "client" },
    props: true,
  },
  {
    path: "/about",
    component: () => import("../components/Client/About/index.vue"),
    meta: { layout: "client" },
  },
  {
    path: "/admin",
    component: () => import("../components/Admin/Dashboard/index.vue"),
  },
  {
    path: "/client/dang-nhap",
    component: () => import("../components/Client/DangNhap/index.vue"),
    meta: { layout: "blank" },
  },
  {
    path: "/client/dang-ky",
    component: () => import("../components/Client/DangKy/index.vue"),
    meta: { layout: "blank" },
  },
  {
    path: "/client/quen-mat-khau",
    component: () => import("../components/Client/QuenMatKhau/QuenMatKhau.vue"),
    meta: { layout: "blank" },
  },
  {
    path: "/client/doi-mat-khau/:key",
    component: () => import("../components/Client/DoiMatKhau/DoiMatKhau.vue"),
    meta: { layout: "blank" },
    props: true,
  },
  {
    path: "/admin/phong-chieu",
    component: () => import("../components/Admin/PhongChieu/index.vue"),
  },
  {
    path: "/admin/dang-nhap",
    component: () => import("../components/Admin/DangNhap/index.vue"),
    meta: { layout: "blank" },
  },
  {
    path: "/admin/dich-vu",
    component: () => import("../components/Admin/DichVu/index.vue"),
    beforeEnter: checkadmin,
  },
  {
    path: "/admin/voucher",
    component: () => import("../components/Admin/Voucher/index.vue"),
  },
  {
    path: "/admin/don-hang",
    component: () => import("../components/Admin/DonHang/DonHang.vue"),
  },
  {
    path: "/admin/nhan-vien",
    component: () => import("../components/Admin/NhanVien/index.vue"),
  },
  {
    path: "/admin/phan-quyen",
    component: () => import("../components/Admin/PhanQuyen/index.vue"),
  },
  {
    path: "/admin/khach-hang",
    component: () => import("../components/Admin/KhachHang/index.vue"),
  },
  {
    path: "/admin/phim",
    component: () => import("../components/Admin/Phim/index.vue"),
  },
  {
    path: "/admin/ve",
    component: () => import("../components/Admin/Ve/index.vue"),
  },
  {
    path: "/admin/suat-chieu",
    component: () => import("../components/Admin/SuatChieu/index.vue"),
  },
  {
    path: "/admin/ghe",
    component: () => import("../components/Admin/Ghe/index.vue"),
  },
  {
    path: "/admin/bai-viet",
    component: () => import("../components/Admin/BaiViet/index.vue"),
  },
  {
    path: "/client/kich-hoat/:key",
    component: () => import("../components/Client/kichhoattaikhoan/KichHoatTaiKhoan.vue"),
    meta: { layout: "blank" },
    props: true,
  },
  {
    path: "/admin/in-ve/:ma_hoa_don",
    component: () => import("../components/Admin/InVe/InVe.vue"),
    meta: { layout: "blank" },
    props: true,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes: routes,
});

export default router;
