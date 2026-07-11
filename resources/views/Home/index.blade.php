@extends('layouts.main')
@section('noidung')
    <main>
      <!-- Hero Section -->
      <section class="hero">
        <div class="hero-content">
          <span class="hero-tagline">Kiến Tạo Không Gian Làm Việc</span>
          <h1>Trải nghiệm thiết bị <span>Công Nghệ Cao Cấp</span></h1>
          <p>Khám phá bộ sưu tập bàn phím cơ, tai nghe chống ồn, đồng hồ thông minh và phụ kiện setup phòng làm việc đỉnh cao từ MyStore.</p>
          <div style="display: flex; gap: 15px;">
            <a href="products.php" class="btn btn-primary">Mua Ngay <i class="fas fa-arrow-right"></i></a>
            <a href="support.php" class="btn btn-secondary">Yêu Cầu Hỗ Trợ</a>
          </div>
        </div>
        <div class="hero-img">
          <img src="images/keyboard.png" alt="Nebula Custom Keyboard" />
        </div>
      </section>

      <!-- Featured Products Section -->
      <section class="featured-section">
        <div class="section-title">
          <h2>Sản Phẩm Nổi Bật</h2>
          <p>Những thiết bị công nghệ hàng đầu được khách hàng yêu thích và lựa chọn nhiều nhất trong tuần qua.</p>
        </div>
        <div class="product-grid featured-grid">
          <!-- Sản phẩm sẽ được render tự động bằng JS -->
        </div>
      </section>

      <!-- Testimonials Section -->
      <section class="testimonials-section">
        <div class="section-title">
          <h2>Đánh Giá Từ Khách Hàng</h2>
          <p>Cảm nhận thực tế của các lập trình viên và người dùng công nghệ sau khi trải nghiệm sản phẩm tại MyStore.</p>
        </div>
        <div class="testimonials-grid">
          <!-- Đánh giá 1 -->
          <div class="testimonial-card">
            <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
            <p>"Bàn phím Nebula gõ cực kỳ êm tay, switch được lube sẵn rất mượt. Dịch vụ chăm sóc khách hàng và vận chuyển của MyStore vô cùng nhanh chóng."</p>
            <div class="reviewer">
              <div class="reviewer-avatar"><i class="fas fa-user-check"></i></div>
              <div class="reviewer-info">
                <h4>Nguyễn Chí Thanh</h4>
                <p>Software Engineer</p>
              </div>
            </div>
          </div>
          <!-- Đánh giá 2 -->
          <div class="testimonial-card">
            <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
            <p>"Tai nghe SonicWave chống ồn rất tốt, giúp tôi hoàn toàn tập trung vào code trong văn phòng ồn ào. Pin dùng cả tuần chưa hết. Rất đáng tiền."</p>
            <div class="reviewer">
              <div class="reviewer-avatar"><i class="fas fa-user-check"></i></div>
              <div class="reviewer-info">
                <h4>Nguyễn Chí Nên</h4>
                <p>Backend Developer</p>
              </div>
            </div>
          </div>
          <!-- Đánh giá 3 -->
          <div class="testimonial-card">
            <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
            <p>"Sản phẩm đóng gói đẹp, cẩn thận. Đồng hồ thông minh ChronoFit đo các chỉ số sức khỏe khá chuẩn xác. Sẽ tiếp tục ủng hộ cửa hàng trong tương lai."</p>
            <div class="reviewer">
              <div class="reviewer-avatar"><i class="fas fa-user-check"></i></div>
              <div class="reviewer-info">
                <h4>Nguyễn Chí Anti</h4>
                <p>UI/UX Designer</p>
              </div>
            </div>
          </div>
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
        <script src="{{ asset('/js/products.js') }}"></script>
@endsection
