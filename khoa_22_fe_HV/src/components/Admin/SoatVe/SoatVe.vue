<template>
  <div class="container my-4">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="input-group mb-4">
          <input v-on:change="timKiem()" v-model="search.noi_dung" type="text" class="form-control"
            placeholder="Nhập mã vé...">
          <button v-on:click="timKiem()" class="btn btn-primary">
            <i class="fas fa-search me-2"></i>
            Tìm kiếm
          </button>
        </div>

        <div v-if="status == 1" class="card bg-light p-3 shadow-sm search-result">
          <div class="row g-4 align-items-center">
            <!-- Cột hình ảnh -->
            <div class="col-md-4 text-center">
              <div class="movie-poster">
                <img :src="ve.hinh_anh" class="img-fluid rounded shadow" alt="Poster phim" style="height:400px;" />
              </div>
            </div>
            <!-- Cột thông tin -->
            <div class="col-md-8">
              <h5 class="mb-3">
                <i class="fas fa-ticket-alt me-2 text-secondary"></i>Thông tin vé
              </h5>
              <ul class="list-unstyled fs-6">
                <li>
                  <strong><i class="fas fa-barcode me-2"></i>Mã vé: {{ ve.ma_ve }}</strong>
                </li>
                <li>
                  <strong><i class="fas fa-film me-2"></i>Tên phim: {{ ve.ten_phim }}</strong>
                </li>
                <li>
                  <strong><i class="fas fa-clock me-2"></i>Suất chiếu: {{ ve.thoi_gian_bat_dau }} - {{
                    ve.thoi_gian_ket_thuc }}</strong>
                </li>
                <li>
                  <strong><i class="fas fa-door-open me-2"></i>Phòng chiếu: {{ ve.ten_phong }}</strong>
                </li>
                <li>
                  <strong><i class="fas fa-chair me-2"></i>Ghế: {{ ve.ten_ghe }}</strong>
                </li>
              </ul>

              <div class="mt-4">
                <button  class="btn btn-success me-2">
                  <i class="fas fa-print me-2"></i>In vé
                </button>
                <button @click="openShareModal()" class="btn btn-outline-primary">
                  <i class="fas fa-share me-2"></i>Chia sẻ
                </button>
              </div>
            </div>
          </div>
        </div>

        <div v-else-if="status == 0" class="card bg-light p-4 text-center">
          <div class="text-muted">
            <i class="fas fa-search fa-3x mb-3"></i>
            <h5>Không tìm thấy thông tin vé</h5>
            <p>Vui lòng kiểm tra lại mã vé và thử lại.</p>
          </div>
        </div>

        <div v-else-if="status === 'loading'" class="card bg-light p-4 text-center">
          <div class="text-muted">
            <i class="fas fa-ticket-alt fa-3x mb-3"></i>
            <h5>Tra cứu thông tin vé</h5>
            <p>Nhập mã vé để xem thông tin chi tiết.</p>
          </div>
        </div>
      </div>
    </div>
        <!-- Share Modal -->
    <div v-if="showShareModal" class="share-modal" @click="closeShareModal">
      <div class="share-content" @click.stop>
        <button class="share-close" @click="closeShareModal">×</button>
        <h2 class="share-title">Chia sẻ thông tin vé</h2>
        <p style="color: #666; margin-bottom: 10px;">Chọn nền tảng để chia sẻ</p>
        
        <div class="share-options">
          <div class="share-option facebook" @click="shareToFacebook()">
            <div class="share-icon">f</div>
            <div class="share-label">Facebook</div>
          </div>
          
          <div class="share-option zalo" @click="shareToZalo()">
            <div class="share-icon">Z</div>
            <div class="share-label">Zalo</div>
          </div>
          
          <div class="share-option messenger" @click="shareToMessenger()">
            <div class="share-icon">💬</div>
            <div class="share-label">Messenger</div>
          </div>
          
          <div class="share-option telegram" @click="shareToTelegram()">
            <div class="share-icon">✈️</div>
            <div class="share-label">Telegram</div>
          </div>
          
          <div class="share-option whatsapp" @click="shareToWhatsApp()">
            <div class="share-icon">📱</div>
            <div class="share-label">WhatsApp</div>
          </div>
          
          <div class="share-option twitter" @click="shareToTwitter()">
            <div class="share-icon">🐦</div>
            <div class="share-label">Twitter</div>
          </div>
          
          <div class="share-option copy" @click="copyToClipboard()">
            <div class="share-icon">📋</div>
            <div class="share-label">Copy link</div>
          </div>
          
          <div class="share-option email" @click="shareViaEmail()">
            <div class="share-icon">✉️</div>
            <div class="share-label">Email</div>
          </div>
          
          <div class="share-option sms" @click="shareViaSMS()">
            <div class="share-icon">💬</div>
            <div class="share-label">SMS</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Copy Notification -->
    <div v-if="showCopyNotification" class="copy-notification">
      ✅ Đã copy link vào clipboard!
    </div>
  </div>

  
</template>
<script>
import axios from 'axios';

export default {
  data() {
    return {
      status: null,
      search: {
        noi_dung: "",
      },
      ve: {},
    }
  },
  methods: {
    timKiem() {
      axios
        .post("http://127.0.0.1:8000/api/admin/soat-ve", this.search)
        .then((res) => {
          if (res.data.status) {
            this.status = res.data.status
            this.ve = res.data.data
            this.search = {}
          }
          else {
            this.status = res.data.status
          }
        })
    },
  },
}
</script>
<style>
.form-control {
  border: 2px solid #e9ecef;
  border-radius: 10px;
  padding: 12px 16px;
  font-size: 16px;
  transition: all 0.3s ease;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.form-control:focus {
  border-color: #667eea;
  box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
  transform: translateY(-2px);
}

.input-group .btn {
  border-radius: 0 10px 10px 0;
  padding: 12px 24px;
  font-weight: 600;
  background: linear-gradient(45deg, #667eea, #764ba2);
  border: none;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.input-group .btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
  background: linear-gradient(45deg, #764ba2, #667eea);
}

.card {
  border: none;
  border-radius: 20px;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.card img {
  border-radius: 15px;
  transition: all 0.3s ease;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.card img:hover {
  transform: scale(1.05);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
}

.card h5 {
  color: #2c3e50;
  font-weight: 700;
  background: linear-gradient(45deg, #667eea, #764ba2);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.list-unstyled li {
  padding: 10px 0;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
  border-radius: 8px;
  margin-bottom: 5px;
}

.list-unstyled li:hover {
  background: rgba(102, 126, 234, 0.1);
  transform: translateX(10px);
  padding-left: 15px;
}

.list-unstyled li:last-child {
  border-bottom: none;
}

.list-unstyled li strong {
  color: #2c3e50;
  min-width: 120px;
  display: inline-block;
}

.text-secondary {
  color: #667eea !important;
}

.loading {
  opacity: 0.7;
  pointer-events: none;
}

.fade-in {
  animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.search-result {
  animation: slideIn 0.5s ease-out;
}

@keyframes slideIn {
  from {
    transform: translateX(-100%);
    opacity: 0;
  }

  to {
    transform: translateX(0);
    opacity: 1;
  }
}

.movie-poster {
  position: relative;
  overflow: hidden;
}

.movie-poster::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
  opacity: 0;
  transition: opacity 0.3s ease;
}

.movie-poster:hover::after {
  opacity: 1;
}

@media (max-width: 768px) {
  .container {
    padding: 0 15px;
  }

  .card {
    margin: 10px 0;
  }

  .input-group .btn {
    padding: 12px 16px;
  }
}
</style>