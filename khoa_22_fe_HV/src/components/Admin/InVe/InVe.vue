<template>
  <div class="container-fluid">
    <!-- Ticket -->
    <div class="ticket-container">
      <!-- Header -->
      <div class="ticket-header">
        <div class="cinema-name">DZCINEMA</div>
        <div class="premium-text">Premium Experience</div>
        <div class="cinema-info">
          32 Xuân Diệu, Hải Châu<br />
          Đà Nẵng, Việt Nam<br />
          Tel: 0236.3888.999<br />
          Hotline: 1900.6017
        </div>
      </div>

      <!-- Title Section -->
      <div class="ticket-title-section">
        <i class="fas fa-ticket-alt me-2"></i>
        HÓA ĐƠN BÁN VÉ
      </div>

      <!-- Movie Section -->
      <div class="movie-section">
        <div class="movie-title">{{ tt_phim.ten_phim }}</div>
        <div class="movie-details">
          <div class="detail-item">
            <div class="detail-label">Suất chiếu</div>
            <div class="detail-value">{{ tt_phim.thoi_gian_bat_dau }}</div>
          </div>
          <div class="detail-item">
            <div class="detail-label">Ngày</div>
            <div class="detail-value">{{ tt_phim.ngay_chieu }}</div>
          </div>
          <div class="detail-item">
            <div class="detail-label">Phòng</div>
            <div class="detail-value">{{ tt_phim.ten_phong }}</div>
          </div>
          <div class="detail-item">
            <div class="detail-label">Thể loại</div>
            <div class="detail-value">{{ tt_phim.the_loai }}</div>
          </div>
        </div>
      </div>

      <!-- Tickets Section -->
      <div class="tickets-section">
        <div class="section-title">
          <i class="fas fa-list me-2"></i>
          CHI TIẾT VÉ
        </div>

        <!-- Ticket 1 -->
        <template v-for="(value, index) in ds_ve" :key="index">
          <div class="ticket-item">
            <div class="ticket-info">
              <span class="ticket-code">{{ value.ten_ghe }}</span>
              <span class="ticket-price">{{ formatVND(value.gia_ve) }}</span>
            </div>
            <div class="barcode">
              <div class="barcode-lines">
                <img
                  :src="`https://barcode.tec-it.com/barcode.ashx?data=${value.ma_ve}&code=Code128&multiplebarcodes=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0`"
                />
              </div>
              <div class="barcode-number">{{ value.ma_ve }}</div>
            </div>
          </div>
        </template>
      </div>

      <!-- Summary Section -->
      <div class="summary-section">
        <div class="summary-row">
          <span class="summary-label">Số lượng vé:</span>
          <span class="summary-value">{{ ds_ve.length }}</span>
        </div>
        <div class="summary-row">
          <span class="summary-label">Tổng tiền hàng:</span>
          <span class="summary-value">{{ formatVND(thanh_toan.tong_tien) }}</span>
        </div>
        <div class="summary-row">
          <span class="summary-label">VAT (8%):</span>
          <span class="summary-value">{{ formatVND(thanh_toan.vat) }}</span>
        </div>
        <div class="summary-row total-row">
          <span class="summary-label">TỔNG THANH TOÁN:</span>
          <span class="summary-value">{{ formatVND(thanh_toan.tong_thanh_toan) }}</span>
        </div>
      </div>

      <!-- Footer -->
      <div class="ticket-footer">
        <div class="timestamp">{{ tt_phim.ngay_dat }}</div>
        <div class="transaction-id">Mã GD: {{ tt_phim.ma_don_hang }}</div>

        <div class="qr-code">
          <div class="qr-pattern"></div>
        </div>
        <div class="qr-text">Quét mã để xác thực vé</div>
      </div>
      <footer>
        <div style="text-align: center; padding: 20px" class="center">
          <h1 style="font-size: 15px">Cảm ơn quý khách</h1>
          <p>Vui lòng giữ vé để vào phòng chiếu</p>
          <p>Không hoàn trả vé đã mua</p>
          <p>Vào phòng trước 10 phút</p>
          <a style="color: blueviolet" href="">www.BINICinema.vn</a>
        </div>
      </footer>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      hoa_don: {
        ma_hoa_don: this.$route.params.ma_hoa_don,
      },
      tt_phim: {},
      ds_ve: [],
      thanh_toan: {
        tong_tien: 0,
        giam_gia: 0,
        phi_dich_vu: 5000, // mặc định hoặc lấy từ DB
        vat: 0,
        tong_thanh_toan: 0,
      },
    };
  },
  mounted() {
    this.getPhim();
  },
  methods: {
    getPhim() {
      axios
        .post("http://127.0.0.1:8000/api/admin/in-ve/get-phim", this.hoa_don)
        .then((res) => {
          this.tt_phim = res.data.data;
          this.ds_ve = res.data.ds_ve;
          this.thanh_toan.tong_tien = this.tt_phim.tong_tien;
          this.thanh_toan.giam_gia = this.tt_phim.giam_gia;
          this.thanh_toan.vat = Math.round(this.tt_phim.tong_tien * 0.08);
          this.thanh_toan.tong_thanh_toan = this.tt_phim.tong_tien + this.thanh_toan.vat;
        })
        .catch((err) => {
          console.log("====================================");
          console.log(err.response.data);
          console.log("====================================");
        });
    },
    formatVND(number) {
      return new Intl.NumberFormat("vi-VI", {
        style: "currency",
        currency: "VND",
      }).format(number);
    },
  },
};
</script>
<style>
.ticket-container {
  max-width: 400px;
  margin: 0 auto;
  background: #f8f9fa;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
  border: 2px solid #fff;
}

.ticket-header {
  background: linear-gradient(135deg, #e9ecef 0%, #ffffff 100%);
  padding: 25px 20px;
  text-align: center;
  border-bottom: 2px dashed #dee2e6;
}

.cinema-name {
  font-size: 28px;
  font-weight: 800;
  color: #495057;
  margin-bottom: 5px;
  letter-spacing: 2px;
}

.premium-text {
  font-size: 12px;
  color: #6c757d;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 15px;
}

.cinema-info {
  font-size: 11px;
  color: #6c757d;
  line-height: 1.4;
}

.ticket-title-section {
  background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
  color: white;
  padding: 12px 20px;
  text-align: center;
  font-weight: 600;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.movie-section {
  padding: 20px;
  background: white;
  border-bottom: 2px dashed #dee2e6;
}

.movie-title {
  font-size: 18px;
  font-weight: 700;
  color: #212529;
  text-align: center;
  margin-bottom: 15px;
  text-transform: uppercase;
}

.movie-details {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 15px;
  font-size: 12px;
}

.detail-item {
  display: flex;
  flex-direction: column;
}

.detail-label {
  color: #6c757d;
  font-weight: 500;
  margin-bottom: 2px;
}

.detail-value {
  color: #212529;
  font-weight: 600;
}

.tickets-section {
  padding: 20px;
  background: white;
}

.section-title {
  text-align: center;
  font-weight: 600;
  color: #495057;
  margin-bottom: 15px;
  font-size: 14px;
  text-transform: uppercase;
}

.ticket-item {
  background: #f8f9fa;
  border: 1px solid #dee2e6;
  border-radius: 8px;
  padding: 15px;
  margin-bottom: 15px;
  position: relative;
}

.ticket-item:last-child {
  margin-bottom: 0;
}

.ticket-info {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}

.ticket-code {
  font-weight: 600;
  color: #495057;
}

.ticket-price {
  font-weight: 700;
  color: #dc3545;
  font-size: 16px;
}

.barcode {
  text-align: center;
  margin: 10px 0;
}

.barcode-lines {
  background: repeating-linear-gradient(
    90deg,
    #000 0px,
    #000 2px,
    transparent 2px,
    transparent 4px
  );
  height: 40px;
  margin: 5px 0;
  border-radius: 2px;
}

.barcode-number {
  font-family: "Courier New", monospace;
  font-size: 10px;
  color: #6c757d;
  letter-spacing: 1px;
}

.summary-section {
  padding: 20px;
  background: #f8f9fa;
  border-top: 2px dashed #dee2e6;
}

.summary-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 8px;
  font-size: 13px;
}

.summary-label {
  color: #6c757d;
}

.summary-value {
  color: #212529;
  font-weight: 600;
}

.total-row {
  border-top: 1px solid #dee2e6;
  padding-top: 10px;
  margin-top: 10px;
  font-size: 16px;
  font-weight: 700;
}

.total-row .summary-value {
  color: #dc3545;
}

.ticket-footer {
  padding: 15px 20px;
  background: white;
  text-align: center;
  border-top: 1px dashed #dee2e6;
}

.timestamp {
  font-size: 11px;
  color: #6c757d;
  margin-bottom: 8px;
}

.transaction-id {
  font-size: 10px;
  color: #adb5bd;
  margin-bottom: 15px;
}

.qr-code {
  width: 80px;
  height: 80px;
  background: #212529;
  margin: 0 auto 10px;
  border-radius: 8px;
  position: relative;
  overflow: hidden;
}

.qr-pattern {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: repeating-linear-gradient(
      0deg,
      transparent,
      transparent 2px,
      white 2px,
      white 4px
    ),
    repeating-linear-gradient(
      90deg,
      transparent,
      transparent 2px,
      white 2px,
      white 4px
    );
}

.qr-text {
  font-size: 10px;
  color: #6c757d;
}

/* Card Footer */
.card-footer-custom {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  border-top: 1px solid #dee2e6;
  padding: 20px;
  border-radius: 0 0 15px 15px;
}

.footer-actions {
  display: flex;
  gap: 10px;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.footer-btn {
  padding: 8px 16px;
  border-radius: 25px;
  border: none;
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 6px;
}

.btn-print {
  background: linear-gradient(45deg, #28a745, #20c997);
  color: white;
}

.btn-print:hover {
  background: linear-gradient(45deg, #20c997, #28a745);
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
}

.btn-download {
  background: linear-gradient(45deg, #007bff, #0056b3);
  color: white;
}

.btn-download:hover {
  background: linear-gradient(45deg, #0056b3, #007bff);
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
}

.btn-share {
  background: linear-gradient(45deg, #6f42c1, #563d7c);
  color: white;
}

.btn-share:hover {
  background: linear-gradient(45deg, #563d7c, #6f42c1);
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(111, 66, 193, 0.3);
}

.footer-note {
  margin-top: 15px;
  padding-top: 15px;
  border-top: 1px solid #dee2e6;
  font-size: 11px;
  color: #6c757d;
  text-align: center;
  line-height: 1.4;
}

.footer-note .highlight {
  color: #dc3545;
  font-weight: 600;
}

@media (max-width: 576px) {
  .ticket-container {
    margin: 0 15px;
  }

  .cinema-name {
    font-size: 24px;
  }

  .movie-details {
    grid-template-columns: 1fr;
    gap: 10px;
  }
}

.barcode-lines img {
  max-width: 100%;
  height: auto;
  display: block;
  margin: 0 auto;
  object-fit: contain;
}
</style>
