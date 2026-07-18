// Biến toàn cục chứa danh sách sản phẩm động từ Database trả về
let PRODUCTS = [];

// Biến lưu trạng thái bộ lọc và tìm kiếm hiện tại
let currentCategory = "all";
let searchQuery = "";
let sortOrder = "default";

// 1. Hàm gọi API lấy dữ liệu từ Laravel MySQL
async function loadProductsFromDB() {
    try {
        // SỬA DÒNG NÀY: Thêm đúng thư mục gốc XAMPP của bạn trước /api/products
        const response = await fetch(
            "http://localhost/my-shop-website/public/products",
        );
        PRODUCTS = await response.json();
        initApp();
    } catch (error) {
        console.error("Lỗi khi tải dữ liệu sản phẩm từ Database:", error);
    }
}

// 2. Hàm định dạng giá tiền sang VND
function formatPrice(price) {
    return new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    }).format(price);
}

// 3. Tạo cấu trúc HTML cho một thẻ sản phẩm dựa trên dữ liệu DB mới
function createProductCardHTML(product) {
    return `
    <div class="product-card">
      ${product.id === 1 ? '<span class="badge-sale">Bán chạy</span>' : ""}
      <div class="product-img-wrapper" onclick="openQuickView(${product.id})">
        <img src="${product.image}" alt="${product.name}">
      </div>
      <div class="product-info">
        <!-- Lấy trực tiếp tên danh mục từ liên kết bảng của MySQL -->
        <span class="product-cat">${product.category.name}</span>
        <a href="#" class="product-title" onclick="event.preventDefault(); openQuickView(${product.id})">${product.name}</a>
        <div class="rating">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <span>(${product.reviews})</span>
        </div>
        <div class="product-footer">
          <span class="price">${formatPrice(product.price)}</span>
          <button class="btn-add-cart" onclick="triggerAddToCart(${product.id})">
            <i class="fas fa-shopping-cart"></i>
            Thêm
          </button>
        </div>
      </div>
    </div>
  `;
}

// 4. Xử lý logic lọc, tìm kiếm và hiển thị danh sách sản phẩm
function filterAndRender() {
    const productsGrid = document.querySelector(".products-page-grid");
    if (!productsGrid) return;

    let filtered = PRODUCTS.filter((p) => {
        // Kiểm tra danh mục dựa vào trường slug của bảng liên kết categories
        const matchesCategory =
            currentCategory === "all" || p.category.slug === currentCategory;
        const matchesSearch = p.name
            .toLowerCase()
            .includes(searchQuery.toLowerCase());
        return matchesCategory && matchesSearch;
    });

    // Xử lý sắp xếp theo giá
    if (sortOrder === "price-asc") {
        filtered.sort((a, b) => a.price - b.price);
    } else if (sortOrder === "price-desc") {
        filtered.sort((a, b) => b.price - a.price);
    }

    // Hiển thị kết quả ra giao diện HTML
    if (filtered.length === 0) {
        productsGrid.innerHTML = `
          <div style="grid-column: 1/-1; text-align: center; color: var(--text-muted); padding: 50px 0;">
            <i class="fas fa-search" style="font-size: 40px; margin-bottom: 15px; display: block; opacity: 0.5;"></i>
            Không tìm thấy sản phẩm nào phù hợp
          </div>
        `;
    } else {
        productsGrid.innerHTML = filtered.map(createProductCardHTML).join("");
    }
}

// 5. Hàm gom logic hiển thị ban đầu khi dữ liệu đã tải xong
function initApp() {
    // Hiển thị sản phẩm nổi bật trên Trang Chủ (Featured Grid) nếu đang ở trang chủ
    const featuredGrid = document.querySelector(".featured-grid");
    if (featuredGrid) {
        const featuredProds = PRODUCTS.slice(0, 3);
        featuredGrid.innerHTML = featuredProds
            .map(createProductCardHTML)
            .join("");
    }

    // Thực hiện render danh sách sản phẩm mặc định
    filterAndRender();
}

// 6. Bắt đầu thêm giỏ hàng từ nút sản phẩm
function triggerAddToCart(productId) {
    const product = PRODUCTS.find((p) => p.id === productId);
    if (product) {
        // Hàm addToCart() này nằm trong file xử lý giỏ hàng riêng của bạn, giữ nguyên
        addToCart(product);
    }
}

// 7. Mở Modal Xem Nhanh Sản Phẩm với dữ liệu liên kết mới
function openQuickView(productId) {
    const product = PRODUCTS.find((p) => p.id === productId);
    if (!product) return;

    let modalOverlay = document.querySelector(".modal-overlay");
    if (!modalOverlay) {
        modalOverlay = document.createElement("div");
        modalOverlay.className = "modal-overlay";
        document.body.appendChild(modalOverlay);
    }

    let specHtml = "";
    for (const [key, value] of Object.entries(product.specs)) {
        specHtml += `<li><strong>${key}:</strong> <span>${value}</span></li>`;
    }

    modalOverlay.innerHTML = `
    <div class="modal-box">
      <button class="close-modal-btn" onclick="closeQuickView()"><i class="fas fa-times"></i></button>
      <div class="modal-content-grid">
        <div class="modal-img-container">
          <img src="${product.image}" alt="${product.name}">
        </div>
        <div class="modal-details">
          <!-- Thay thế bằng tên danh mục động lấy từ MySQL -->
          <span class="product-cat">${product.category.name}</span>
          <h3>${product.name}</h3>
          <p class="price">${formatPrice(product.price)}</p>
          <p>${product.desc}</p>
          <ul class="spec-list">
            ${specHtml}
          </ul>
          <div class="modal-actions">
            <button class="btn btn-primary" onclick="triggerAddToCart(${product.id}); closeQuickView()">
              <i class="fas fa-shopping-cart"></i> Thêm Vào Giỏ Hàng
            </button>
          </div>
        </div>
      </div>
    </div>
  `;

    modalOverlay.classList.add("open");
    document.body.style.overflow = "hidden";
}

// 8. Đóng Modal Xem Nhanh
function closeQuickView() {
    const modalOverlay = document.querySelector(".modal-overlay");
    if (modalOverlay) {
        modalOverlay.classList.remove("open");
        document.body.style.overflow = "";
    }
}

// 9. Lắng nghe sự kiện hành động của trang
document.addEventListener("DOMContentLoaded", () => {
    // Tự động tải dữ liệu từ MySQL ngay khi mở trang
    loadProductsFromDB();

    // Sự kiện Click cho các Tabs Danh mục
    const tabs = document.querySelectorAll(".category-tab");
    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            tabs.forEach((t) => t.classList.remove("active"));
            tab.classList.add("active");
            currentCategory = tab.dataset.category; // Đảm bảo tab.dataset.category trùng với slug trong DB (ví dụ: keyboard, audio...)
            filterAndRender();
        });
    });

    // Sự kiện Gõ Tìm Kiếm
    const searchInput = document.querySelector(".search-box input");
    if (searchInput) {
        searchInput.addEventListener("input", (e) => {
            searchQuery = e.target.value;
            filterAndRender();
        });
    }

    // Sự kiện Thay Đổi Bộ Sắp Xếp
    const sortSelect = document.querySelector(".sort-select");
    if (sortSelect) {
        sortSelect.addEventListener("change", (e) => {
            sortOrder = e.target.value;
            filterAndRender();
        });
    }

    // Đóng modal khi bấm phím Escape
    window.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            closeQuickView();
        }
    });

    // Đóng modal khi click ra ngoài vùng modal box
    window.addEventListener("click", (e) => {
        const modalOverlay = document.querySelector(".modal-overlay");
        if (e.target === modalOverlay) {
            closeQuickView();
        }
    });
});
