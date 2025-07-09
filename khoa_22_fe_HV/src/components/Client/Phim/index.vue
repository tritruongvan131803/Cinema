<template>
    <div class="movie-homepage">
    <!-- Hero Carousel Section -->
    <div class="hero-section">
      <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="carousel-overlay"></div>
            <img src="https://pbs.twimg.com/media/GDV8gAmXUAAKimD.jpg:large" class="d-block w-100 carousel-img" alt="Movie 1" />
            <div class="carousel-caption d-none d-md-block">
              <h1  class="display-4 fw-bold mb-3">Trải Nghiệm Điện Ảnh Tuyệt Vời</h1>
              <p class="lead mb-4">Khám phá những bộ phim hot nhất hiện tại</p>
              <button class="btn btn-primary btn-lg px-4 py-2">
                <i class="fas fa-play me-2"></i>Xem Ngay
              </button>
            </div>
          </div>
          
          <div class="carousel-item">
            <div class="carousel-overlay"></div>
            <img src="https://sadesign.vn/pictures/picfullsizes/2024/12/03/aly1733193356.jpg" class="d-block w-100 carousel-img" alt="Movie 2" />
            <div class="carousel-caption d-none d-md-block">
              <h1 class="display-4 fw-bold mb-3">Phim Mới Nhất 2024</h1>
              <p class="lead mb-4">Cập nhật liên tục những bộ phim blockbuster</p>
              <button class="btn btn-primary btn-lg px-4 py-2">
                <i class="fas fa-ticket-alt me-2"></i>Đặt Vé
              </button>
            </div>
          </div>
          
          <div class="carousel-item">
            <div class="carousel-overlay"></div>
            <img src="https://www.elleman.vn/app/uploads/2018/04/25/Avengers-Infinity-War-ELLE-Man-featured-01-01.jpg" class="d-block w-100 carousel-img" alt="Movie 3" />
            <div class="carousel-caption d-none d-md-block">
              <h1 class="display-4 fw-bold mb-3">Siêu Phẩm Marvel</h1>
              <p class="lead mb-4">Hành trình anh hùng đầy kịch tính</p>
              <button class="btn btn-primary btn-lg px-4 py-2">
                <i class="fas fa-star me-2"></i>Khám Phá
              </button>
            </div>
          </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!-- Movies Section -->
    <div class="movies-section">
      <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center mb-5">
          <h2 class="section-title">
            <i class="fas fa-film me-3"></i>
            Phim Đang Chiếu
          </h2>
          <p class="section-subtitle">Những bộ phim hot nhất đang được công chiếu tại rạp</p>
          <div class="title-underline"></div>
        </div>

        <!-- Movies Grid -->
        <div class="row g-4" v-if="list_phim.length > 0">
          <template v-for="(value, index) in list_phim" :key="index">
            <template v-if="value.tinh_trang == 2">
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                <div class="movie-card">
                  <div class="movie-poster">
                    <img :src="value.hinh_anh" class="img-fluid" :alt="value.ten_phim || 'Movie poster'" />
                    <div class="movie-overlay">
                      <div class="movie-actions">
                        <a :href="'/chi-tiet-phim/' + value.id" class="btn btn-primary btn-action mb-2">
                          <i class="fas fa-ticket-alt me-2"></i>Mua Vé
                        </a>
                        <button class="btn btn-outline-light btn-action" @click="playTrailer(value)">
                          <i class="fas fa-play me-2"></i>Trailer
                        </button>
                      </div>
                      <div class="movie-info">
                        <h5 class="movie-title">{{ value.ten_phim || 'Tên phim' }}</h5>
                        <p class="movie-genre">{{ value.the_loai || 'Thể loại' }}</p>
                        <div class="movie-rating">
                          <i class="fas fa-star"></i>
                          <span>{{ value.diem_danh_gia || '8.5' }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </template>
          </template>
        </div>

        <!-- Loading State -->
        <div v-else class="text-center py-5">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <p class="mt-3 text-muted">Đang tải danh sách phim...</p>
        </div>

        <!-- View More Button -->
        <div class="text-center mt-5">
          <button class="btn btn-outline-primary btn-lg px-5">
            <i class="fas fa-plus me-2"></i>Xem Thêm Phim
          </button>
        </div>
      </div>
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
<style>
.movie-homepage {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  min-height: 100vh;
}

/* Hero Section */
.hero-section {
  position: relative;
  height: 70vh;
  overflow: hidden;
}

.carousel-img {
  height: 70vh;
  object-fit: cover;
  filter: brightness(0.7);
}

.carousel-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, rgba(0,0,0,0.6), rgba(0,0,0,0.3));
  z-index: 1;
}

.carousel-caption {
  z-index: 2;
  bottom: 30%;
}

.carousel-caption h1 {
  text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
  animation: fadeInUp 1s ease-out;
  color: #f1f1f1;
}

.carousel-caption p {
  text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
  animation: fadeInUp 1s ease-out 0.3s both;
}

.carousel-caption .btn {
  animation: fadeInUp 1s ease-out 0.6s both;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
  transition: all 0.3s ease;
}

.carousel-caption .btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0,0,0,0.4);
}

/* Movies Section */
.movies-section {
  background: #f8f9fa;
  padding: 80px 0;
  position: relative;
}

.movies-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 100px;
  background: linear-gradient(to bottom, rgba(102, 126, 234, 0.1), transparent);
}

.section-header {
  margin-bottom: 60px;
}

.section-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: #2c3e50;
  margin-bottom: 15px;
}

.section-subtitle {
  font-size: 1.1rem;
  color: #6c757d;
  margin-bottom: 30px;
}

.title-underline {
  width: 80px;
  height: 4px;
  background: linear-gradient(45deg, #667eea, #764ba2);
  margin: 0 auto;
  border-radius: 2px;
}

/* Movie Card */
.movie-card {
  position: relative;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  transition: all 0.3s ease;
  background: white;
}

.movie-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.movie-poster {
  position: relative;
  height: 450px;
  overflow: hidden;
}

.movie-poster img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.movie-card:hover .movie-poster img {
  transform: scale(1.05);
}

.movie-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(to bottom, 
    rgba(0,0,0,0) 0%, 
    rgba(0,0,0,0.3) 50%, 
    rgba(0,0,0,0.8) 100%
  );
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.movie-card:hover .movie-overlay {
  opacity: 1;
}

.movie-actions {
  text-align: center;
  margin-bottom: 20px;
}

.btn-action {
  width: 150px;
  border-radius: 25px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: all 0.3s ease;
}

.btn-action:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.movie-info {
  text-align: center;
  color: white;
  padding: 0 20px;
}

.movie-title {
  font-size: 1.2rem;
  font-weight: 700;
  margin-bottom: 8px;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
}

.movie-genre {
  font-size: 0.9rem;
  opacity: 0.9;
  margin-bottom: 10px;
}

.movie-rating {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;
}

.movie-rating i {
  color: #ffc107;
}

/* Animations */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-section {
    height: 50vh;
  }
  
  .carousel-img {
    height: 50vh;
  }
  
  .section-title {
    font-size: 2rem;
  }
  
  .movie-poster {
    height: 400px;
  }
  
  .btn-action {
    width: 120px;
    font-size: 0.9rem;
  }
}

@media (max-width: 576px) {
  .movies-section {
    padding: 60px 0;
  }
  
  .movie-poster {
    height: 350px;
  }
  
  .section-title {
    font-size: 1.8rem;
  }
  
  .carousel-caption h1 {
    font-size: 1.8rem;
  }
  
  .carousel-caption p {
    font-size: 1rem;
  }
}

/* Custom scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: linear-gradient(45deg, #667eea, #764ba2);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: linear-gradient(45deg, #764ba2, #667eea);
}
</style>
