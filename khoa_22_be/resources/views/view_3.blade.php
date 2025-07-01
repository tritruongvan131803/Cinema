<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xác nhận đặt vé</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 20px;
      color: #333;
      line-height: 1.6;
    }
    
    .container {
      max-width: 650px;
      margin: 0 auto;
      background: white;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .header {
      background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
      color: white;
      text-align: center;
      padding: 40px 30px;
      position: relative;
    }
    
    .header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><radialGradient id="a"><stop offset="20%" stop-color="%23facc15" stop-opacity=".1"/><stop offset="100%" stop-color="%23facc15" stop-opacity="0"/></radialGradient></defs><circle fill="url(%23a)" cx="10" cy="10" r="10"/><circle fill="url(%23a)" cx="80" cy="5" r="8"/></svg>') repeat;
      opacity: 0.1;
    }
    
    .logo-container {
      position: relative;
      z-index: 1;
    }
    
    .logo-icon {
      display: inline-block;
      padding: 20px;
      background: linear-gradient(135deg, #facc15 0%, #fbbf24 100%);
      color: #1e1b4b;
      border-radius: 50%;
      font-size: 28px;
      margin-bottom: 15px;
      box-shadow: 0 8px 20px rgba(251, 191, 36, 0.3);
    }
    
    .brand-name {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 8px;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .brand-tagline {
      font-size: 16px;
      color: #facc15;
      font-weight: 300;
      letter-spacing: 2px;
      text-transform: uppercase;
    }
    
    .success-badge {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
      color: white;
      text-align: center;
      padding: 20px;
      margin: -10px 30px 30px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
      position: relative;
      z-index: 2;
    }
    
    .success-badge .icon {
      font-size: 24px;
      margin-right: 10px;
    }
    
    .success-text {
      font-size: 18px;
      font-weight: 600;
      letter-spacing: 1px;
    }
    
    .content {
      padding: 30px;
    }
    
    .welcome-text {
      text-align: center;
      font-size: 20px;
      color: #1f2937;
      margin-bottom: 15px;
      font-weight: 600;
    }
    
    .subtitle {
      text-align: center;
      color: #6b7280;
      margin-bottom: 40px;
      font-size: 16px;
    }
    
    .section {
      background: #f8fafc;
      border-radius: 12px;
      padding: 25px;
      margin-bottom: 25px;
      border-left: 4px solid;
    }
    
    .section.movie { border-left-color: #8b5cf6; }
    .section.tickets { border-left-color: #06b6d4; }
    .section.services { border-left-color: #f59e0b; }
    .section.discount { border-left-color: #10b981; }
    .section.payment { border-left-color: #ef4444; }
    
    .section-title {
      font-size: 18px;
      font-weight: 600;
      color: #1f2937;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .section-icon {
      font-size: 20px;
    }
    
    .info-table {
      width: 100%;
      border-collapse: collapse;
    }
    
    .info-table td {
      padding: 12px 0;
      border-bottom: 1px solid #e5e7eb;
    }
    
    .info-table td:last-child {
      border-bottom: none;
    }
    
    .info-table .label {
      font-weight: 600;
      color: #374151;
      width: 40%;
    }
    
    .info-table .value {
      color: #1f2937;
    }
    
    .ticket-table, .service-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    
    .ticket-table th, .service-table th {
      background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
      padding: 15px;
      text-align: left;
      font-weight: 600;
      color: #374151;
      border-radius: 8px 8px 0 0;
    }
    
    .ticket-table td, .service-table td {
      padding: 15px;
      border-bottom: 1px solid #e5e7eb;
    }
    
    .discount-box {
      background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
      border: 2px solid #f59e0b;
      border-radius: 12px;
      padding: 20px;
      text-align: center;
    }
    
    .discount-code {
      font-size: 18px;
      font-weight: 700;
      color: #92400e;
      margin-bottom: 8px;
    }
    
    .discount-amount {
      font-size: 16px;
      color: #b45309;
    }
    
    .total-section {
      background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
      color: white;
      border-radius: 12px;
      padding: 25px;
      margin: 30px 0;
    }
    
    .total-row {
      display: flex;
      justify-content: space-between;
      padding: 10px 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .total-row:last-child {
      border-bottom: none;
      padding-top: 15px;
      font-size: 20px;
      font-weight: 700;
    }
    
    .discount-value {
      color: #fca5a5;
    }
    
    .qr-container {
      text-align: center;
      padding: 30px;
      background: #f9fafb;
      border-radius: 12px;
      margin: 20px 0;
    }
    
    .qr-code {
      width: 180px;
      height: 180px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      margin-bottom: 15px;
    }
    
    .order-id {
      font-size: 16px;
      font-weight: 600;
      color: #374151;
      margin-bottom: 10px;
    }
    
    .payment-warning {
      background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
      color: #dc2626;
      padding: 15px;
      border-radius: 8px;
      font-weight: 600;
      border-left: 4px solid #ef4444;
    }
    
    .notes-section {
      background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
      border-left: 4px solid #3b82f6;
      border-radius: 12px;
      padding: 25px;
      margin-top: 30px;
    }
    
    .notes-title {
      color: #1e40af;
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .notes-list {
      list-style: none;
      padding: 0;
    }
    
    .notes-list li {
      padding: 8px 0;
      color: #1e40af;
      position: relative;
      padding-left: 25px;
    }
    
    .notes-list li::before {
      content: '✓';
      position: absolute;
      left: 0;
      color: #10b981;
      font-weight: bold;
    }
    
    .footer {
      background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
      color: #e2e8f0;
      padding: 40px 30px;
      text-align: center;
    }
    
    .footer-brand {
      font-size: 24px;
      font-weight: 700;
      color: #facc15;
      margin-bottom: 8px;
    }
    
    .footer-tagline {
      color: #cbd5e1;
      margin-bottom: 25px;
      font-style: italic;
    }
    
    .contact-info {
      display: grid;
      gap: 8px;
      margin-bottom: 25px;
      font-size: 14px;
    }
    
    .contact-info a {
      color: #60a5fa;
      text-decoration: none;
    }
    
    .contact-info a:hover {
      color: #93c5fd;
    }
    
    .footer-divider {
      border: 0;
      border-top: 1px solid #475569;
      margin: 25px 0;
    }
    
    .footer-copyright {
      font-size: 12px;
      color: #94a3b8;
      line-height: 1.5;
    }
    
    @media (max-width: 600px) {
      body { padding: 10px; }
      .container { margin: 0; }
      .content { padding: 20px; }
      .header { padding: 30px 20px; }
      .section { padding: 20px; }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Header -->
    <div class="header">
      <div class="logo-container">
        <div class="logo-icon">
          🎬
        </div>
        <h1 class="brand-name">BINICinemar</h1>
        <p class="brand-tagline">Cinema Experience</p>
      </div>
    </div>
    
    <!-- Success Badge -->
    <div class="success-badge">
      <span class="icon">✅</span>
      <span class="success-text">ĐẶT VÉ THÀNH CÔNG</span>
    </div>
   
    <div class="content">
      <h2 class="welcome-text">Cảm ơn bạn đã đặt vé!</h2>
      <p class="subtitle">Chúng tôi đã ghi nhận đơn đặt vé của bạn. Dưới đây là thông tin chi tiết:</p>

      <!-- Thông Tin Phim -->
      <div class="section movie">
        <h3 class="section-title">
          <span class="section-icon" style="color: #8b5cf6;">🎬</span>
          Thông Tin Phim
        </h3>
        <table class="info-table">
          <tr>
            <td class="label">Tên Phim:</td>
            <td class="value">{{$data['ten_phim']}}</td>
          </tr>
          <tr>
            <td class="label">Ngày Chiếu:</td>
            <td class="value">{{$data['ngay_chieu']}}</td>
          </tr>
          <tr>
            <td class="label">Giờ Chiếu:</td>
            <td class="value">{{$data['gio_chieu']}}</td>
          </tr>
        </table>
      </div>

      <!-- Chi Tiết Vé -->
      <div class="section tickets">
        <h3 class="section-title">
          <span class="section-icon" style="color: #06b6d4;">🎫</span>
          Chi Tiết Vé
        </h3>
        <table class="ticket-table">
          <thead>
            <tr>
              <th>Số Ghế</th>
              <th>Đơn Giá</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['ds_ghe'] as $index => $value)
              <tr>
                <td>{{ $value->ten_ghe }}</td>
                <td>{{ number_format($value->gia_ve,0) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Dịch Vụ Đi Kèm -->
      <div class="section services">
        <h3 class="section-title">
          <span class="section-icon" style="color: #f59e0b;">🍿</span>
          Dịch Vụ Đi Kèm
        </h3>
        <table class="service-table">
          <thead>
            <tr>
              <th>Tên Dịch Vụ</th>
              <th>Đơn Giá</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['ds_dv'] as $index => $value)
              <tr>
                <td>{{ $value->ten_dv }}</td>
                <td>{{ number_format($value->gia_ve,0) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Giảm Giá -->
      <div class="section discount">
        <h3 class="section-title">
          <span class="section-icon" style="color: #10b981;">🏷️</span>
          Ưu Đãi
        </h3>
        <div class="discount-box">
          <div class="discount-code">
            ✅ Mã Giảm Giá: {{$data['ma_giam_gia']}}
          </div>
          <div class="discount-amount">Số Tiền Giảm: -{{number_format($data['tien_giam_gia'],0)}}</div>
        </div>
      </div>

      <!-- Tổng Tiền -->
      <div class="total-section">
        <div class="total-row">
          <span>Tạm Tính:</span>
          <span> {{number_format($data['tam_tinh'],0)}}</span>
        </div>
        <div class="total-row">
          <span>Giảm Giá:</span>
          <span class="discount-value"> -{{number_format($data['tien_giam_gia'],0)}}</span>
        </div>
        <div class="total-row">
          <span>TỔNG CỘNG: </span>
          <span> {{number_format($data['so_tien'],0)}}</span>
        </div>
      </div>

      <!-- Thanh Toán -->
      <div class="section payment">
        <h3 class="section-title">
          <span class="section-icon" style="color: #ef4444;">💳</span>
          Thanh Toán
        </h3>
        <p style="margin-bottom: 20px;">Quét mã QR bên dưới để thanh toán:</p>
        <div class="qr-container">
          <img src="{{$data['link_qr_code']}}" alt="QR Code Thanh Toán" class="qr-code" />
          <div class="order-id">Mã đơn hàng: <strong>{{$data['ma_don_hang']}}</strong></div>
          <div class="payment-warning">
            ⚠️ Vui lòng thanh toán trong vòng <strong>15 phút</strong>
          </div>
        </div>
      </div>

      <!-- Lưu ý -->
      <div class="notes-section">
        <h3 class="notes-title">
          📋 Lưu Ý Quan Trọng
        </h3>
        <ul class="notes-list">
          <li>Vui lòng có mặt tại rạp trước giờ chiếu 15 phút</li>
          <li>Mang theo email xác nhận này khi đến rạp</li>
          <li>Không được hoàn vé sau khi thanh toán thành công</li>
          <li>Liên hệ hotline nếu cần hỗ trợ: <strong>1900-xxxx</strong></li>
        </ul>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <h2 class="footer-brand">BINICinemar</h2>
      <p class="footer-tagline">Trải nghiệm điện ảnh đỉnh cao</p>
      <div class="contact-info">
        <div>📍 123 Đường ABC, Quận XYZ, TP.HCM</div>
        <div>📞 Hotline: 1900-xxxx</div>
        <div>✉️ Email: support@biniciema.com</div>
        <div>🌐 Website: <a href="https://binicinema.com">www.binicinema.com</a></div>
      </div>
      <hr class="footer-divider" />
      <div class="footer-copyright">
        © 2024 BINICinemar. Tất cả quyền được bảo lưu.<br />
        Email này được gửi tự động, vui lòng không phản hồi.
      </div>
    </div>
  </div>
</body>
</html>