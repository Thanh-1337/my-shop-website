// Key cho localStorage
const CART_KEY = "mystore_cart";
const THEME_KEY = "mystore_theme";

// Helper hiển thị thông báo Toast
function showToast(message, iconClass = "fa-check-circle") {
    let toastContainer = document.querySelector(".toast-container");
    if (!toastContainer) {
        toastContainer = document.createElement("div");
        toastContainer.className = "toast-container";
        document.body.appendChild(toastContainer);
    }

    const toast = document.createElement("div");
    toast.className = "toast";
    toast.innerHTML = `
    <i class="fas ${iconClass}"></i>
    <span>${message}</span>
  `;
    toastContainer.appendChild(toast);

    // Kích hoạt animation hiện ra
    setTimeout(() => toast.classList.add("show"), 10);

    // Ẩn và giải phóng phần tử sau 3s
    setTimeout(() => {
        toast.classList.remove("show");
        setTimeout(() => toast.remove(), 400);
    }, 3000);
}

// Lấy danh sách sản phẩm từ giỏ hàng
function getCart() {
    const cartData = localStorage.getItem(CART_KEY);
    return cartData ? JSON.parse(cartData) : [];
}

// Lưu trữ giỏ hàng và cập nhật giao diện
function saveCart(cart) {
    localStorage.setItem(CART_KEY, JSON.stringify(cart));
    updateCartUI();
}

// Thêm sản phẩm vào giỏ hàng
function addToCart(product) {
    let cart = getCart();
    const existingItem = cart.find((item) => item.id === product.id);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: product.id,
            name: product.name,
            price: product.price,
            image: product.image,
            quantity: 1,
        });
    }

    saveCart(cart);
    showToast(`Đã thêm "${product.name}" vào giỏ hàng!`);

    // Hiệu ứng nảy biểu tượng giỏ hàng trên thanh điều hướng
    const cartBtn = document.querySelector(".cart-icon-btn");
    if (cartBtn) {
        cartBtn.classList.add("bounce");
        setTimeout(() => cartBtn.classList.remove("bounce"), 300);
    }
}

// Xóa sản phẩm khỏi giỏ hàng
function removeFromCart(productId) {
    let cart = getCart();
    const product = cart.find((item) => item.id === productId);
    cart = cart.filter((item) => item.id !== productId);
    saveCart(cart);
    if (product) {
        showToast(`Đã xóa "${product.name}" khỏi giỏ hàng!`, "fa-trash-alt");
    }
}

// Cập nhật số lượng sản phẩm trong giỏ hàng
function updateQty(productId, delta) {
    let cart = getCart();
    const item = cart.find((item) => item.id === productId);
    if (item) {
        item.quantity += delta;
        if (item.quantity <= 0) {
            cart = cart.filter((i) => i.id !== productId);
            showToast(`Đã xóa "${item.name}" khỏi giỏ hàng!`, "fa-trash-alt");
        }
        saveCart(cart);
    }
}

// Định dạng giá tiền VND
function formatPrice(number) {
    return new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    }).format(number);
}

// Cập nhật giao diện giỏ hàng (Số lượng Nav & Drawer)
function updateCartUI() {
    const cart = getCart();

    // Cập nhật Badge trên Navbar
    const totalCount = cart.reduce((sum, item) => sum + item.quantity, 0);
    const badges = document.querySelectorAll(".cart-count");
    badges.forEach((badge) => {
        badge.textContent = totalCount;
    });

    // Cập nhật Danh sách tệp trong Drawer
    const itemsContainer = document.querySelector(".cart-items-list");
    const subtotalEl = document.querySelector(".cart-subtotal-val");

    if (itemsContainer) {
        if (cart.length === 0) {
            itemsContainer.innerHTML = `
        <div class="cart-empty-msg">
          <i class="fas fa-shopping-bag" style="font-size: 40px; margin-bottom: 15px; display: block; opacity: 0.5;"></i>
          Giỏ hàng trống
        </div>
      `;
            if (subtotalEl) subtotalEl.textContent = formatPrice(0);
        } else {
            let html = "";
            let subtotal = 0;

            cart.forEach((item) => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                html += `
          <div class="cart-item">
            <div class="cart-item-img">
              <img src="${item.image}" alt="${item.name}">
            </div>
            <div class="cart-item-details">
              <h4>${item.name}</h4>
              <p class="price">${formatPrice(item.price)}</p>
              <div class="cart-item-qty">
                <button class="qty-btn" onclick="updateQty(${item.id}, -1)"><i class="fas fa-minus"></i></button>
                <span>${item.quantity}</span>
                <button class="qty-btn" onclick="updateQty(${item.id}, 1)"><i class="fas fa-plus"></i></button>
                <button class="remove-item-btn" onclick="removeFromCart(${item.id})"><i class="fas fa-trash-alt"></i></button>
              </div>
            </div>
          </div>
        `;
            });

            itemsContainer.innerHTML = html;
            if (subtotalEl) subtotalEl.textContent = formatPrice(subtotal);
        }
    }
}

// Khởi chạy các sự kiện sau khi tải trang
document.addEventListener("DOMContentLoaded", () => {
    // 1. Hiệu ứng làm mờ header khi cuộn
    const header = document.querySelector("header");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 20) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });

    // 2. Xử lý Chế độ sáng/tối
    const themeToggle = document.querySelector(".theme-toggle");
    if (themeToggle) {
        const savedTheme = localStorage.getItem(THEME_KEY);

        // Áp dụng chủ đề từ cấu hình đã lưu
        if (savedTheme === "light") {
            document.body.classList.add("light-theme");
            const icon = themeToggle.querySelector("i");
            if (icon) {
                icon.className = "fas fa-moon";
            }
        }

        themeToggle.addEventListener("click", () => {
            document.body.classList.toggle("light-theme");
            const isLight = document.body.classList.contains("light-theme");
            localStorage.setItem(THEME_KEY, isLight ? "light" : "dark");

            const icon = themeToggle.querySelector("i");
            if (icon) {
                icon.className = isLight ? "fas fa-moon" : "fas fa-sun";
            }

            showToast(
                isLight
                    ? "Đã chuyển sang giao diện Sáng!"
                    : "Đã chuyển sang giao diện Tối!",
                isLight ? "fa-sun" : "fa-moon",
            );
        });
    }

    // 3. Quản lý Đóng/Mở Cart Drawer
    const cartIconBtns = document.querySelectorAll(".cart-icon-btn");
    const closeCartBtn = document.querySelector(".close-cart-btn");
    const cartOverlay = document.querySelector(".cart-drawer-overlay");
    const cartDrawer = document.querySelector(".cart-drawer");

    cartIconBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            if (cartOverlay && cartDrawer) {
                cartOverlay.classList.add("open");
                cartDrawer.classList.add("open");
                document.body.style.overflow = "hidden"; // Khóa cuộn trang chính
            }
        });
    });

    const closeDrawer = () => {
        if (cartOverlay && cartDrawer) {
            cartOverlay.classList.remove("open");
            cartDrawer.classList.remove("open");
            document.body.style.overflow = ""; // Mở lại cuộn trang chính
        }
    };

    if (closeCartBtn) closeCartBtn.addEventListener("click", closeDrawer);
    if (cartOverlay) cartOverlay.addEventListener("click", closeDrawer);

    // 4. Giả lập tính năng thanh toán đơn hàng
    const checkoutBtn = document.querySelector(".cart-checkout-btn");
    if (checkoutBtn) {
        checkoutBtn.addEventListener("click", () => {
            const cart = getCart();
            if (cart.length === 0) {
                showToast(
                    "Giỏ hàng trống! Hãy lựa chọn sản phẩm trước.",
                    "fa-exclamation-triangle",
                );
                return;
            }

            // Tạo sự kiện đặt hàng thành công
            closeDrawer();
            showToast(
                "Đặt hàng thành công! Đơn hàng đang được xử lý.",
                "fa-check-circle",
            );
            saveCart([]); // Xóa giỏ hàng
        });
    }

    // Cập nhật giao diện giỏ hàng lần đầu
    updateCartUI();
});
