<template>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://pbs.twimg.com/media/GDV8gAmXUAAKimD.jpg:large" class="d-block w-100"
                    style="width: 100%; height: 250px; object-fit: cover" />
            </div>
            <div class="carousel-item">
                <img src="https://sadesign.vn/pictures/picfullsizes/2024/12/03/aly1733193356.jpg" class="d-block w-100"
                    style="width: 100%; height: 250px; object-fit: cover" />
            </div>
            <div class="carousel-item">
                <img src="https://www.elleman.vn/app/uploads/2018/04/25/Avengers-Infinity-War-ELLE-Man-featured-01-01.jpg"
                    class="d-block w-100 img-fluid" style="width: 100%; height: 250px; object-fit: cover" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container mt-3">
        <h4>Phim Đang Chiếu</h4>

        <div class="row">
            <template v-for="(value, index) in list_phim" :key="index">
                <template v-if="value.tinh_trang == 2">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-img-top">
                                <img :src="value.hinh_anh" style="height: 500px;" class="img-fluid" alt="" />
                            </div>
                            <div class="card-img-overlay text-center" style="margin-top: 200px">
                                <div class="col">
                                    <a :href="'/chi-tiet-phim/' + value.id" class="btn btn-warning p-2"
                                        style="width: 170px">
                                        <i class="fa-solid fa-ticket"></i>Mua vé
                                    </a>
                                    <br />
                                    <button class="btn btn-outline-light p-2 mt-2" style="width: 170px">
                                        <i class="fa-solid fa-circle-play"></i>Trailer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

            </template>
        </div>

    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            list_phim: [],
        };
    },
    mounted() {
        this.getPhim();
    },
    methods: {
        getPhim() {
            axios
                .get("http://127.0.0.1:8000/api/client/phim-dang-chieu", this.list_phim)
                .then((res) => {
                    this.list_phim = res.data.data;
                })
                .catch((err) => {
                    console.log("====================================");
                    console.log(res.data.err);
                    console.log("====================================");
                });
        },
    },
};
</script>
<style></style>
