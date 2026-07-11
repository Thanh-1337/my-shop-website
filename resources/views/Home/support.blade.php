@extends('layouts.main')
@section('noidung')
    <main>
      <!-- Khối container Hỗ Trợ -->
      <section class="support-container">
        <!-- Cột trái: Thông tin liên hệ -->
        <div class="support-info">
          <h2>Trung Tâm Hỗ Trợ & Khiếu Nại</h2>
          <p>Nếu bạn gặp bất kỳ vấn đề gì về đơn hàng, chất lượng sản phẩm hoặc dịch vụ kỹ thuật, vui lòng gửi phản hồi qua form bên cạnh hoặc liên hệ trực tiếp với chúng tôi:</p>

          <div class="contact-card">
            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
            <div class="contact-details">
              <h4>Trụ sở chính</h4>
              <p>Toà nhà MyStore, Quận 1, TP. Hồ Chí Minh</p>
            </div>
          </div>

          <div class="contact-card">
            <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
            <div class="contact-details">
              <h4>Hotline Hỗ Trợ</h4>
              <p>1900 88xx (8:00 - 22:00 hằng ngày)</p>
            </div>
          </div>

          <div class="contact-card">
            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
            <div class="contact-details">
              <h4>Email Tiếp Nhận</h4>
              <p>support@mystore.com</p>
            </div>
          </div>

          <div class="contact-card">
            <div class="contact-icon"><i class="fas fa-clock"></i></div>
            <div class="contact-details">
              <h4>Thời gian làm việc</h4>
              <p>Thứ 2 - Chủ Nhật: 8:00 sáng - 10:00 tối</p>
            </div>
          </div>

          <!-- Bản đồ Mock -->
          <div class="mock-map">
            <i class="fas fa-map-marked-alt" style="font-size: 36px; color: var(--primary);"></i>
            <span>Bản đồ trụ sở MyStore (Mock Map)</span>
            <small style="opacity: 0.6;">Tòa nhà MyStore, Quận 1, TP.HCM</small>
          </div>
        </div>

        <!-- Cột phải: Form liên hệ -->
        <div class="support-form-wrapper">
          <h3>Gửi Yêu Cầu Hỗ Trợ</h3>
          <form class="support-form">
            <div class="form-group">
              <label for="support-name">Họ và tên của bạn</label>
              <input type="text" id="support-name" class="form-control" placeholder="Nguyễn Văn A" required />
            </div>

            <div class="form-group">
              <label for="support-email">Địa chỉ Email</label>
              <input type="email" id="support-email" class="form-control" placeholder="name@example.com" required />
            </div>

            <div class="form-group">
              <label for="support-topic">Vấn đề cần hỗ trợ</label>
              <select id="support-topic" class="form-control" required>
                <option value="" disabled selected>Chọn chủ đề hỗ trợ...</option>
                <option value="order">Tư vấn mua hàng & Đơn hàng</option>
                <option value="warranty">Bảo hành & Sửa chữa</option>
                <option value="feedback">Góp ý & Khiếu nại chất lượng</option>
                <option value="other">Vấn đề khác</option>
              </select>
            </div>

            <div class="form-group">
              <label for="support-message">Nội dung chi tiết</label>
              <textarea id="support-message" class="form-control" rows="5" placeholder="Mô tả cụ thể vấn đề hoặc phản hồi sản phẩm của bạn..." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-submit">Gửi Yêu Cầu <i class="fas fa-paper-plane"></i></button>
          </form>
        </div>
      </section>
    </main>

    <!-- Slide-out Cart Drawer -->
    <div class="cart-drawer-overlay"></div>
    <div class="cart-drawer">
      <div class="cart-header">
        <h3>Giỏ hàng của bạn</h3>
        <button class="close-cart-btn" aria-label="Close Cart"><i class="fas fa-times"></i></button>
      </div>
      <div class="cart-items-list">
        <!-- Các mặt hàng sẽ hiển thị ở đây từ JavaScript -->
      </div>
      <div class="cart-footer">
        <div class="cart-subtotal">
          <span>Tổng cộng:</span>
          <span class="cart-subtotal-val">0 đ</span>
        </div>
        <button class="btn btn-primary cart-checkout-btn">Thanh Toán Ngay</button>
      </div>
    </div>
        <script>
      document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('.support-form');
        const wrapper = document.querySelector('.support-form-wrapper');

        if (form && wrapper) {
          form.addEventListener('submit', (e) => {
            e.preventDefault();

            const name = document.getElementById('support-name').value;
            const email = document.getElementById('support-email').value;

            // Render nội dung thành công trực quan thay thế form
            wrapper.innerHTML = `
              <div class="success-msg-box" style="animation: float 4s ease-in-out infinite;">
                <i class="fas fa-check-circle" style="font-size: 60px; color: var(--primary); margin-bottom: 20px; display: block;"></i>
                <h4 style="font-size: 20px; font-weight: 700; margin-bottom: 10px;">Gửi yêu cầu hỗ trợ thành công!</h4>
                <p style="color: var(--text-muted); font-size: 14px; margin-bottom: 20px; line-height: 1.6;">
                  Chào <strong>${name}</strong>, chúng tôi đã tiếp nhận yêu cầu phản hồi của bạn. Một email xác nhận chi tiết đã được gửi tới <strong>${email}</strong>. Đội ngũ kỹ thuật của MyStore sẽ phản hồi bạn trong vòng 2 giờ làm việc.
                </p>
<a href="index.php" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px;">
                  <i class="fas fa-home"></i> Quay lại trang chủ
                </a>
              </div>
            `;

            // Hiển thị toast thông báo
            if (typeof showToast === 'function') {
              showToast('Đã gửi yêu cầu hỗ trợ!', 'fa-paper-plane');
            }
          });
        }
      });
    </script>
@endsection
