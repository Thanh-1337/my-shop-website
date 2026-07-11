// Cơ sở dữ liệu sản phẩm mẫu của MyStore
const PRODUCTS = [
    {
        id: 1,
        name: "Bàn Phím Cơ Nebula Custom RGB",
        price: 2500000,
        category: "keyboard",
        image: "images/keyboard.png", // Sử dụng ảnh đã được AI generate
        rating: 4.9,
        reviews: 124,
        desc: "Bàn phím cơ Nebula Custom với phối màu độc đáo, switch cơ học cao cấp cho độ bền 80 triệu lần nhấn và hệ thống LED RGB rực rỡ có thể lập trình, mang đến cảm giác gõ phím tuyệt đỉnh.",
        specs: {
            "Thương hiệu": "MyStore Nebula",
            "Loại Switch": "Linear Gateron Yellow",
            "Chất liệu Keycap": "PBT Double-Shot Cherry Profile",
            "Kết nối": "USB Type-C, Bluetooth 5.1, 2.4Ghz Wireless",
        },
    },
    {
        id: 2,
        name: "Tai Nghe Không Dây SonicWave ANC",
        price: 1800000,
        category: "audio",
        image: "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&q=80",
        rating: 4.8,
        reviews: 95,
        desc: "Trải nghiệm âm thanh hi-res đỉnh cao với tính năng chống ồn chủ động (ANC) SonicWave. Đệm tai bằng da protein siêu mềm và thời lượng pin lên đến 40 giờ liên tục giúp bạn thoải mái cả ngày.",
        specs: {
            "Thương hiệu": "SonicWave",
            Driver: "40mm Dynamic",
            "Chống ồn": "ANC kép lên tới 35dB",
            "Thời lượng Pin": "Lên đến 40 giờ (khi tắt ANC)",
        },
    },
    {
        id: 3,
        name: "Đồng Hồ Thông Minh ChronoFit S2",
        price: 3200000,
        category: "smartwear",
        image: "https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&q=80",
        rating: 4.7,
        reviews: 64,
        desc: "Đồng hồ thông minh ChronoFit S2 sở hữu màn hình AMOLED sắc nét, tích hợp cảm biến đo nhịp tim thế hệ mới, nồng độ oxy trong máu SpO2 và hơn 100 chế độ tập luyện thể thao chuyên nghiệp.",
        specs: {
            "Thương hiệu": "ChronoFit",
            "Màn hình": "1.43 inch AMOLED Touchscreen",
            "Thời lượng Pin": "Lên đến 12 ngày sử dụng cơ bản",
            "Kháng nước": "5ATM (Chịu độ sâu 50 mét)",
        },
    },
    {
        id: 4,
        name: "Loa Bluetooth AuraSound Ambient",
        price: 1200000,
        category: "audio",
        image: "https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=500&q=80",
        rating: 4.6,
        reviews: 82,
        desc: "Hòa mình vào không gian âm nhạc sống động 360 độ với loa AuraSound. Loa được tích hợp dải đèn LED RGB đổi màu nhịp nhàng theo giai điệu nhạc và chuẩn chống nước IPX7 mạnh mẽ.",
        specs: {
            "Thương hiệu": "AuraSound",
            "Công suất": "20W RMS",
            "Thời lượng Pin": "Lên đến 15 giờ liên tục",
            "Chống nước": "IPX7 Waterproof",
        },
    },
    {
        id: 5,
        name: "Chuột Gaming ApexMouse Wireless",
        price: 950000,
        category: "keyboard",
        image: "https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?w=500&q=80",
        rating: 4.8,
        reviews: 142,
        desc: "Tốc độ phản hồi cực nhanh với kết nối không dây trễ bằng 0 và mắt đọc quang học 26.000 DPI. Thiết kế công thái học siêu nhẹ chỉ 63g giúp các game thủ làm chủ cuộc chơi dễ dàng.",
        specs: {
            "Thương hiệu": "ApexMouse",
            "Cảm biến": "Focus Pro 30K Optical Sensor",
            "Trọng lượng": "63 gram siêu nhẹ",
            "Thời lượng Pin": "Lên đến 80 giờ liên tục",
        },
    },
    {
        id: 6,
        name: "Đèn LED Thông Minh RGB Ambient Light",
        price: 450000,
        category: "lighting",
        image: "https://images.unsplash.com/photo-1563245372-f21724e3856d?w=500&q=80",
        rating: 4.5,
        reviews: 58,
        desc: "Nâng tầm không gian làm việc của bạn với dải đèn LED Ambient Light thông minh. Tự động đồng bộ màu sắc với hình ảnh hiển thị trên màn hình máy tính và hỗ trợ điều khiển qua điện thoại di động.",
        specs: {
            "Thương hiệu": "AmbientLight",
            "Chiều dài": "1.5 mét (Dải LED)",
            "Hỗ trợ màu": "16 triệu màu RGB",
            "Kết nối": "Wi-Fi 2.4Ghz, Bluetooth",
        },
    },
];

// Helper lấy tên hiển thị của danh mục
function getCategoryName(cat) {
    switch (cat) {
        case "keyboard":
            return "Bàn phím & Chuột";
        case "audio":
            return "Thiết bị âm thanh";
        case "smartwear":
            return "Đồng hồ thông minh";
        case "lighting":
            return "Đèn trang trí";
        default:
            return "Khác";
    }
}

// Tạo cấu trúc HTML cho một thẻ sản phẩm
function createProductCardHTML(product) {
    return `
    <div class="product-card">
      ${product.id === 1 ? '<span class="badge-sale">Bán chạy</span>' : ""}
      <div class="product-img-wrapper" onclick="openQuickView(${product.id})">
        <img src="${product.image}" alt="${product.name}">
      </div>
      <div class="product-info">
        <span class="product-cat">${getCategoryName(product.category)}</span>
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

// Bắt đầu thêm giỏ hàng từ nút sản phẩm
function triggerAddToCart(productId) {
    const product = PRODUCTS.find((p) => p.id === productId);
    if (product) {
        addToCart(product);
    }
}

// Mở Modal Xem Nhanh Sản Phẩm
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
          <span class="product-cat">${getCategoryName(product.category)}</span>
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

// Đóng Modal Xem Nhanh
function closeQuickView() {
    const modalOverlay = document.querySelector(".modal-overlay");
    if (modalOverlay) {
        modalOverlay.classList.remove("open");
        document.body.style.overflow = "";
    }
}

// Lắng nghe sự kiện của trang
document.addEventListener("DOMContentLoaded", () => {
    // 1. Hiển thị sản phẩm nổi bật trên Trang Chủ (Featured Grid)
    const featuredGrid = document.querySelector(".featured-grid");
    if (featuredGrid) {
        // Lấy 3 sản phẩm đầu tiên hiển thị trên trang chủ
        const featuredProds = PRODUCTS.slice(0, 3);
        featuredGrid.innerHTML = featuredProds
            .map(createProductCardHTML)
            .join("");
    }

    // 2. Xử lý logic và hiển thị cho trang danh sách Sản Phẩm (products.html)
    const productsGrid = document.querySelector(".products-page-grid");
    if (productsGrid) {
        let currentCategory = "all";
        let searchQuery = "";
        let sortOrder = "default";

        function filterAndRender() {
            let filtered = PRODUCTS.filter((p) => {
                const matchesCategory =
                    currentCategory === "all" || p.category === currentCategory;
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

            // Hiển thị kết quả ra giao diện
            if (filtered.length === 0) {
                productsGrid.innerHTML = `
          <div style="grid-column: 1/-1; text-align: center; color: var(--text-muted); padding: 50px 0;">
            <i class="fas fa-search" style="font-size: 40px; margin-bottom: 15px; display: block; opacity: 0.5;"></i>
            Không tìm thấy sản phẩm nào phù hợp
          </div>
        `;
            } else {
                productsGrid.innerHTML = filtered
                    .map(createProductCardHTML)
                    .join("");
            }
        }

        // Đăng ký sự kiện Click cho Tabs Danh mục
        const tabs = document.querySelectorAll(".category-tab");
        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                tabs.forEach((t) => t.classList.remove("active"));
                tab.classList.add("active");
                currentCategory = tab.dataset.category;
                filterAndRender();
            });
        });

        // Đăng ký sự kiện Gõ Tìm Kiếm
        const searchInput = document.querySelector(".search-box input");
        if (searchInput) {
            searchInput.addEventListener("input", (e) => {
                searchQuery = e.target.value;
                filterAndRender();
            });
        }

        // Đăng ký sự kiện Thay Đổi Bộ Sắp Xếp
        const sortSelect = document.querySelector(".sort-select");
        if (sortSelect) {
            sortSelect.addEventListener("change", (e) => {
                sortOrder = e.target.value;
                filterAndRender();
            });
        }

        // Chạy render mặc định khi mở trang
        filterAndRender();
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
