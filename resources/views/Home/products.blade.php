@extends('layouts.main')
@section('noidung')
     <main>
      <!-- Tiêu đề & Bộ lọc sản phẩm -->
      <section class="products-header">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="filter-bar">
          <!-- Các tabs danh mục -->
          <div class="category-tabs">
            <button class="category-tab active" data-category="all">Tất Cả</button>
            <button class="category-tab" data-category="keyboard">Bàn phím & Chuột</button>
            <button class="category-tab" data-category="audio">Thiết bị âm thanh</button>
            <button class="category-tab" data-category="smartwear">Đồng hồ</button>
            <button class="category-tab" data-category="lighting">Đèn trang trí</button>
          </div>

          <!-- Tìm kiếm & Sắp xếp -->
          <div class="search-sort-group">
            <div class="search-box">
              <i class="fas fa-search"></i>
              <input type="text" placeholder="Tìm kiếm sản phẩm..." />
            </div>
            <select class="sort-select" aria-label="Sắp xếp sản phẩm">
              <option value="default">Mặc định</option>
              <option value="price-asc">Giá: Thấp đến Cao</option>
              <option value="price-desc">Giá: Cao đến Thấp</option>
            </select>
          </div>
        </div>
      </section>

      <!-- Grid hiển thị sản phẩm -->
      <section class="product-section">
        <div class="product-grid products-page-grid">
          <!-- Sản phẩm sẽ được render tự động từ JS -->
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

    <!-- Modal Xem Nhanh (Sử dụng chung overlay và chèn nội dung động) -->
    <div class="modal-overlay"></div>
        <script src="{{ asset('/js/products.js') }}"></script>
@endsection
