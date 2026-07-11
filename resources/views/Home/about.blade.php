@extends('layouts.main')
@section('noidung')
     <main>
      <!-- Khối Giới Thiệu -->
      <section class="about-section">
        <div class="about-intro">
          <h2>Câu Chuyện MyStore</h2>
          <p>
            Được thành lập từ năm 2026, xuất phát điểm từ một nhóm nhỏ các kỹ sư
            đam mê công nghệ và lập trình. MyStore không ngừng tìm kiếm và tuyển
            chọn những thiết bị ngoại vi cùng phụ kiện công nghệ tinh tế nhất từ
            khắp nơi trên thế giới nhằm kiến tạo không gian làm việc lý tưởng và
            năng suất nhất cho bạn.
          </p>
        </div>

        <!-- Tầm nhìn & Sứ mệnh -->
        <div class="vision-mission-grid">
          <div class="vision-card">
            <div class="vision-icon">
              <i class="fas fa-eye"></i>
            </div>
            <h3>Tầm Nhìn</h3>
            <p>
              Trở thành hệ sinh thái trực tuyến hàng đầu cung cấp thiết bị công
              nghệ và giải pháp hỗ trợ không gian làm việc số hóa toàn diện tại
              Việt Nam, mang lại trải nghiệm mua sắm hiện đại và đẳng cấp.
            </p>
          </div>

          <div class="vision-card">
            <div class="vision-icon">
              <i class="fas fa-rocket"></i>
            </div>
            <h3>Sứ Mệnh</h3>
            <p>
              Tiên phong cung cấp sản phẩm chính hãng có nguồn gốc rõ ràng, áp
              dụng công nghệ cao để đơn giản hoá mọi quy trình mua sắm, giao vận
              và mang đến dịch vụ bảo hành hậu mãi tận tâm nhất.
            </p>
          </div>
        </div>

        <!-- Khối Số liệu Thống kê -->
        <div class="stats-bar">
          <div class="stat-item">
            <h4>10K+</h4>
            <p>Khách hàng tin dùng</p>
          </div>
          <div class="stat-item">
            <h4>50+</h4>
            <p>Đối tác chính hãng</p>
          </div>
          <div class="stat-item">
            <h4>20+</h4>
            <p>Giải thưởng uy tín</p>
          </div>
          <div class="stat-item">
            <h4>24/7</h4>
            <p>Hỗ trợ chuyên nghiệp</p>
          </div>
        </div>

        <!-- Khối Đội ngũ Sáng Lập -->
        <div class="team-section">
          <div class="section-title">
            <h2>Đội Ngũ Sáng Lập</h2>
            <p>
              Những người trẻ đầy nhiệt huyết, chịu trách nhiệm vận hành và đưa
              MyStore trở thành thương hiệu công nghệ được yêu mến.
            </p>
          </div>
          <div class="team-grid">
            <!-- Nhân sự 1 -->
            <div class="team-card">
              <div class="team-avatar-wrapper">
                <i
                  class="fas fa-user-tie"
                  style="font-size: 70px; opacity: 0.7"
                ></i>
              </div>
              <div class="team-info">
                <h4>Nguyễn Chí Thanh</h4>
                <p>CEO & Founder</p>
                <div class="team-socials">
                  <a href="#"><i class="fab fa-facebook"></i></a>
                  <a href="#"><i class="fab fa-linkedin"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
            </div>
            <!-- Nhân sự 2 -->
            <div class="team-card">
              <div class="team-avatar-wrapper">
                <i
                  class="fas fa-user-cog"
                  style="font-size: 70px; opacity: 0.7"
                ></i>
              </div>
              <div class="team-info">
                <h4>Nguyễn Chí Nên</h4>
                <p>CTO</p>
                <div class="team-socials">
                  <a href="#"><i class="fab fa-github"></i></a>
                  <a href="#"><i class="fab fa-linkedin"></i></a>
                  <a href="#"><i class="fab fa-facebook"></i></a>
                </div>
              </div>
            </div>
            <!-- Nhân sự 3 -->
            <div class="team-card">
              <div class="team-avatar-wrapper">
                <i
                  class="fas fa-user-ninja"
                  style="font-size: 70px; opacity: 0.7"
                ></i>
              </div>
              <div class="team-info">
                <h4>Nguyễn Chí Anti</h4>
                <p>Design Director</p>
                <div class="team-socials">
                  <a href="#"><i class="fab fa-behance"></i></a>
                  <a href="#"><i class="fab fa-dribbble"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
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
        <button class="close-cart-btn" aria-label="Close Cart">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="cart-items-list">
        <!-- Các mặt hàng sẽ hiển thị ở đây từ JavaScript -->
      </div>
      <div class="cart-footer">
        <div class="cart-subtotal">
          <span>Tổng cộng:</span>
          <span class="cart-subtotal-val">0 đ</span>
        </div>
        <button class="btn btn-primary cart-checkout-btn">
          Thanh Toán Ngay
        </button>
      </div>
    </div>

@endsection
