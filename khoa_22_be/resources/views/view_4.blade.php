<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vé điện tử DZCinemar</title>
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
      min-height: 100vh;
    }
    
    .container {
      max-width: 650px;
      margin: 0 auto;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      overflow: hidden;
    }
    
    .header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 40px 30px;
      text-align: center;
      color: white;
      position: relative;
    }
    
    .header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="10" cy="90" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
      opacity: 0.3;
    }
    
    .header h1 {
      font-size: 2.5em;
      margin-bottom: 10px;
      font-weight: 700;
      position: relative;
      z-index: 1;
    }
    
    .header p {
      font-size: 1.1em;
      opacity: 0.9;
      position: relative;
      z-index: 1;
    }
    
    .success-badge {
      background: linear-gradient(135deg, #4CAF50, #45a049);
      color: white;
      padding: 15px 30px;
      text-align: center;
      font-size: 1.2em;
      font-weight: 600;
      border-radius: 50px;
      margin: 30px;
      box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
    }
    
    .content-section {
      padding: 30px;
      border-bottom: 1px solid #f0f0f0;
    }
    
    .content-section:last-child {
      border-bottom: none;
    }
    
    .section-title {
      font-size: 1.3em;
      font-weight: 700;
      color: #333;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .section-title::before {
      content: '';
      width: 4px;
      height: 30px;
      background: linear-gradient(135deg, #667eea, #764ba2);
      border-radius: 2px;
    }
    
    .order-info {
      background: linear-gradient(135deg, #fff3e0, #ffe8cc);
      padding: 25px;
      border-radius: 15px;
      margin-bottom: 20px;
      border: 2px solid #ffb74d;
    }
    
    .movie-info {
      background: linear-gradient(135deg, #f3e5f5, #e8d5e8);
      padding: 25px;
      border-radius: 15px;
      margin-bottom: 20px;
      border: 2px solid #ba68c8;
    }
    
    .ticket-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    
    .ticket-table th {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      padding: 15px;
      text-align: left;
      font-weight: 600;
    }
    
    .ticket-table td {
      padding: 15px;
      border-bottom: 1px solid #f0f0f0;
      background: white;
    }
    
    .ticket-table tr:hover td {
      background: #f8f9fa;
    }
    
    .price {
      color: #4CAF50;
      font-weight: 700;
      font-size: 1.1em;
    }
    
    .discount-section {
      background: linear-gradient(135deg, #fff8e1, #ffecb3);
      border: 2px solid #ffc107;
      border-radius: 15px;
      padding: 25px;
      margin: 20px 0;
    }
    
    .payment-section {
      background: linear-gradient(135deg, #e8f5e8, #d4edda);
      border: 2px solid #28a745;
      border-radius: 15px;
      padding: 25px;
      margin: 20px 0;
    }
    
    .total-section {
      background: linear-gradient(135deg, #1a1a2e, #16213e);
      color: white;
      padding: 30px;
      border-radius: 15px;
      text-align: center;
      margin: 30px 0;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    
    .total-amount {
      font-size: 2.5em;
      font-weight: 700;
      color: #ffc107;
      margin: 15px 0;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    
    .qr-section {
      text-align: center;
      background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      padding: 30px;
      border-radius: 15px;
      border: 2px dashed #6c757d;
      margin: 20px 0;
    }
    
    .qr-code {
      width: 150px;
      height: 150px;
      background: #fff;
      border: 3px solid #667eea;
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 15px;
      font-size: 1.2em;
      color: #667eea;
      font-weight: 600;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    
    .instructions {
      background: linear-gradient(135deg, #e3f2fd, #bbdefb);
      border: 2px solid #2196f3;
      border-radius: 15px;
      padding: 25px;
      margin: 20px 0;
    }
    
    .instructions ul {
      list-style: none;
      padding: 0;
    }
    
    .instructions li {
      padding: 8px 0;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .instructions li::before {
      content: '✓';
      background: #4CAF50;
      color: white;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.8em;
      font-weight: bold;
    }
    
    .support-section {
      background: linear-gradient(135deg, #f3e5f5, #e1bee7);
      border: 2px solid #9c27b0;
      border-radius: 15px;
      padding: 25px;
      margin: 20px 0;
    }
    
    .contact-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 15px;
      margin-top: 15px;
    }
    
    .contact-item {
      background: rgba(255,255,255,0.7);
      padding: 15px;
      border-radius: 10px;
      text-align: center;
    }
    
    .footer {
      background: linear-gradient(135deg, #2c3e50, #34495e);
      color: white;
      padding: 40px 30px;
      text-align: center;
    }
    
    .footer-brand {
      font-size: 2em;
      font-weight: 700;
      margin-bottom: 10px;
      background: linear-gradient(135deg, #667eea, #764ba2);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    
    .footer-tagline {
      font-size: 1.1em;
      opacity: 0.9;
      margin-bottom: 20px;
    }
    
    .footer-info {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 15px;
      margin: 20px 0;
    }
    
    .footer-divider {
      border: none;
      height: 1px;
      background: linear-gradient(90deg, transparent, #667eea, transparent);
      margin: 30px 0 20px;
    }
    
    .footer-copyright {
      font-size: 0.9em;
      opacity: 0.8;
      line-height: 1.6;
    }
    
    .highlight {
      background: linear-gradient(135deg, #ffd54f, #ffb74d);
      padding: 2px 8px;
      border-radius: 20px;
      font-weight: 600;
      color: #333;
    }
    
    .status-success {
      color: #4CAF50;
      font-weight: 600;
    }
    
    .status-discount {
      color: #f44336;
      font-weight: 600;
    }
    
    a {
      color: #667eea;
      text-decoration: none;
      font-weight: 600;
    }
    
    a:hover {
      text-decoration: underline;
    }
    
    @media (max-width: 600px) {
      .container {
        margin: 0;
        border-radius: 0;
      }
      
      .header {
        padding: 30px 20px;
      }
      
      .content-section {
        padding: 20px;
      }
      
      .total-amount {
        font-size: 2em;
      }
      
      .contact-grid, .footer-info {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Header -->
    <div class="header">
      <h1>🎬 DZCinemar</h1>
      <p>Trải nghiệm điện ảnh đỉnh cao</p>
    </div>

    <!-- Success Badge -->
    <div class="success-badge">
      ✅ Đơn hàng thành công!
    </div>

    <!-- Welcome Message -->
    <div class="content-section">
      <p style="font-size: 1.1em; text-align: center; color: #666; line-height: 1.6;">
        Chào <span class="highlight">{{$data['ho_va_ten']}}</span>,<br>
        Cảm ơn bạn đã lựa chọn DZCinemar! Đơn hàng của bạn đã được thanh toán thành công.
      </p>
    </div>

    <!-- Order Info -->
    <div class="content-section">
      <div class="section-title">🎟️ Thông tin đơn hàng</div>
      <div class="order-info">
        <p><strong>Mã đơn hàng:</strong> <span class="highlight">{{$data['ma_don_hang']}}</span></p>
        <p><strong>Thời gian giao dịch:</strong> {{$data['thoi_gian_giao_dich']}}</p>
      </div>
    </div>

    <!-- Movie Info -->
    <div class="content-section">
      <div class="section-title">🎬 Thông tin phim</div>
      <div class="movie-info">
        <p><strong>{{$data['ten_phim']}}</strong></p>
        <p><strong>Suất chiếu:</strong> {{$data['suat_chieu']}}</p>
      </div>
    </div>

    <!-- Ticket Details -->
    <div class="content-section">
      <div class="section-title">📋 Chi tiết vé</div>
      <table class="ticket-table">
        <thead>
          <tr>
            <th>Số ghế</th>
            <th>Loại ghế</th>
            <th style="text-align: right;">Đơn giá</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data['ds_ghe'] as $index => $value)
              <tr>
                <td><strong>{{$value->ten_ghe}}</strong></td>
                <td>{{$value->loai_ghe}}</td>
                <td style="text-align: right;" class="price">{{number_format($value->gia_ve, 0)}}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>

    <!-- Discount Section -->
    <div class="content-section">
      <div class="discount-section">
        <h4 style="margin-bottom: 15px; color: #f57c00; display: flex; align-items: center; gap: 10px;">
          💰 Mã giảm giá áp dụng
        </h4>
        <p><strong>Mã:</strong> <span class="highlight">{{$data['ma_giam_gia']}}</span></p>
        <p><strong>Giảm giá:</strong> <span class="status-discount">-{{number_format($data['tien_giam_gia'], 0)}}</span></p>
      </div>
    </div>

    <!-- Payment Info -->
    <div class="content-section">
      <div class="payment-section">
        <h4 style="margin-bottom: 15px; color: #2e7d32; display: flex; align-items: center; gap: 10px;">
          📄 Thông tin thanh toán
        </h4>
        <p><strong>Phương thức:</strong> {{$data['phuong_thuc_thanh_toan']}}</p>
        <p><strong>Trạng thái:</strong> <span class="status-success">Đã thanh toán thành công</span></p>
        <p><strong>Mã giao dịch:</strong> {{$data['ma_giao_dich']}}</p>
      </div>
    </div>

    <!-- Total Amount -->
    <div class="content-section">
      <div class="total-section">
        <h3 style="margin-bottom: 10px;">Tổng cộng</h3>
        <div class="total-amount">{{number_format($data['so_tien'], 0)}}</div>
        <p style="opacity: 0.8; font-size: 0.9em;">Đã bao gồm VAT</p>
      </div>
    </div>

    <!-- QR Code -->
    <div class="content-section">
      <div class="section-title">📱 Mã QR vé điện tử</div>
      <p style="text-align: center; margin-bottom: 20px; color: #666;">
        Vui lòng xuất trình mã QR này tại quầy để nhận vé
      </p>
      <div class="qr-section">
        <div class="qr-code">
          <img style="border-radius: 15px;" src="{{$data['link_qr_code']}}" alt="QR Code">
        </div>
        <p style="font-weight: 600; color: #667eea;">Mã vé điện tử</p>
      </div>
    </div>

    <!-- Instructions -->
    <div class="content-section">
      <div class="instructions">
        <h4 style="color: #1976d2; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
          📝 Hướng dẫn sử dụng vé
        </h4>
        <ul>
          <li><strong>Đến rạp trước giờ chiếu 15-30 phút</strong> để làm thủ tục nhận vé</li>
          <li><strong>Xuất trình mã QR</strong> hoặc mã đơn hàng tại quầy vé</li>
          <li><strong>Giữ vé cẩn thận</strong> trong suốt thời gian xem phim</li>
          <li><strong>Không được chuyển nhượng</strong> vé cho người khác</li>
          <li><strong>Đến đúng ghế đã đặt</strong> theo thông tin trên vé</li>
          <li><strong>Tắt điện thoại</strong> khi xem phim</li>
        </ul>
        <p style="font-size: 0.9em; color: #d32f2f; margin-top: 15px; padding: 10px; background: rgba(255,235,235,0.8); border-radius: 8px;">
          <strong>Lưu ý:</strong> Vé không được hoàn trả sau khi đã thanh toán thành công.
        </p>
      </div>
    </div>

    <!-- Support Section -->
    <div class="content-section">
      <div class="support-section">
        <h4 style="color: #7b1fa2; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
          📞 Hỗ trợ khách hàng
        </h4>
        <div class="contact-grid">
          <div class="contact-item">
            <strong>📞 Hotline</strong><br>
            1900 1234
          </div>
          <div class="contact-item">
            <strong>✉️ Email</strong><br>
            <a href="mailto:support@dzcinema.com">support@dzcinema.com</a>
          </div>
          <div class="contact-item">
            <strong>🕒 Giờ làm việc</strong><br>
            8:00 - 22:00 hàng ngày
          </div>
        </div>
      </div>
    </div>

    <!-- Final Message -->
    <div class="content-section">
      <p style="text-align: center; font-size: 1.2em; color: #4CAF50; font-weight: 600; padding: 20px;">
        🎬 Chúc bạn có những phút giây giải trí tuyệt vời tại DZCinemar! 🍿
      </p>
    </div>

    <!-- Footer -->
    <div class="footer">
      <h2 class="footer-brand">DZCinemar</h2>
      <p class="footer-tagline">Trải nghiệm điện ảnh đỉnh cao</p>
      <div class="footer-info">
        <div>📍 123 Đường ABC, Quận XYZ, TP.HCM</div>
        <div>📞 Hotline: 1900-1234</div>
        <div>✉️ Email: support@dzcinema.com</div>
        <div>🌐 Website: <a href="https://dzcinema.com">www.dzcinema.com</a></div>
      </div>
      <hr class="footer-divider" />
      <div class="footer-copyright">
        © 2024 DZCinemar. Tất cả quyền được bảo lưu.<br />
        Email này được gửi tự động, vui lòng không phản hồi.
      </div>
    </div>
  </div>
</body>
</html>