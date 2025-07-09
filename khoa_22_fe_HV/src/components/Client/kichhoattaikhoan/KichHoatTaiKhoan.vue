<template>
  <div class="activation-container">
        <div class="activation-card">
            <div class="card-header">
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <h2>Kích hoạt tài khoản</h2>
            </div>
            
            <div class="card-body">
                <!-- Loading State -->
                <div  v-if="status === 'loading' " class="status-content" id="loading-content">
                    <div class="loading-spinner"></div>
                    <div class="status-message text-muted">
                        <strong>Đang xác minh liên kết kích hoạt...</strong>
                        <br>
                        <small>Vui lòng đợi trong giây lát</small>
                    </div>
                </div>
                
                <!-- Success State -->
                <div v-if="status === 'success'" class="status-content" id="success-content">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div  class="status-message text-success">
                        <strong>Tài khoản đã được kích hoạt thành công!</strong>
                        <br>
                        <small>Bây giờ bạn có thể đăng nhập vào hệ thống</small>
                    </div>
                    <a href="/client/dang-nhap" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i>
                        Đăng nhập ngay
                    </a>
                </div>
                
                <!-- Error State -->
                <div v-if="status === 'error'" class="status-content" id="error-content">
                    <div class="error-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div  class="status-message text-danger">
                        <strong>Liên kết không hợp lệ hoặc đã được sử dụng</strong>
                        <br>
                        <small>Vui lòng kiểm tra lại email hoặc yêu cầu gửi lại liên kết kích hoạt</small>
                    </div>
                    <div class="d-flex gap-2 justify-content-center flex-wrap">
                        <a href="/client/dang-ky" class="btn btn-outline-primary">
                            <i class="fas fa-redo"></i>
                            Đăng ký lại
                        </a>
                        <a href="/client/dang-nhap" class="btn btn-outline-secondary">
                            <i class="fas fa-sign-in-alt"></i>
                            Đăng nhập
                        </a>
                    </div>
                </div>
                
                <div class="footer-text">
                    <p class="mb-0">
                        Cần hỗ trợ? <a href="/lien-he">Liên hệ với chúng tôi</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  props: ['key'],
  data() {
    return {
      status: 'loading',
    };
  },
  mounted() {
    const hashKey = this.$route.params.key;
    axios
      .post("http://localhost:8000/api/kich-hoat-tai-khoan", { key: hashKey })
      .then(() => {
        this.status = "success";
      })
      .catch(() => {
        this.status = "error";
      });
  }
};
</script>
<style>
  .activation-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .activation-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            max-width: 500px;
            width: 100%;
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 30px;
            text-align: center;
            border: none;
        }
        
        .card-header h2 {
            margin: 0;
            font-weight: 600;
            font-size: 1.8rem;
        }
        
        .card-header .icon {
            font-size: 3rem;
            margin-bottom: 15px;
            opacity: 0.9;
        }
        
        .card-body {
            padding: 40px;
            text-align: center;
        }
        
        .status-content {
            margin-bottom: 30px;
        }
        
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .success-icon {
            font-size: 4rem;
            color: #28a745;
            margin-bottom: 20px;
            animation: bounceIn 0.8s ease-out;
        }
        
        .error-icon {
            font-size: 4rem;
            color: #dc3545;
            margin-bottom: 20px;
            animation: bounceIn 0.8s ease-out;
        }
        
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
        
        .status-message {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 25px;
        }
        
        .btn-login {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            font-size: 1rem;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .btn-login i {
            margin-right: 8px;
        }
        
        .footer-text {
            margin-top: 30px;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .footer-text a {
            color: #667eea;
            text-decoration: none;
        }
        
        .footer-text a:hover {
            text-decoration: underline;
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .card-header {
                padding: 20px;
            }
            
            .card-header h2 {
                font-size: 1.5rem;
            }
            
            .card-header .icon {
                font-size: 2.5rem;
            }
            
            .card-body {
                padding: 30px 20px;
            }
            
            .success-icon, .error-icon {
                font-size: 3rem;
            }
          }
</style>