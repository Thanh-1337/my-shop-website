<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // -------------------------------------------------------------
        // BƯỚC 1: TẠO SẴN CÁC DANH MỤC TRONG DATABASE
        // -------------------------------------------------------------
        // Mảng này gồm 'slug' => 'tên hiển thị' dựa theo code JS cũ của bạn.
        $categoriesData = [
            'keyboard'  => 'Bàn phím & Chuột',
            'audio'     => 'Thiết bị âm thanh',
            'smartwear' => 'Đồng hồ thông minh',
            'lighting'  => 'Đèn trang trí',
        ];

        // Mảng này dùng để lưu trữ các Object Danh mục sau khi được tạo thành công vào DB
        $savedCategories = [];

        foreach ($categoriesData as $slug => $name) {
            // Lưu trực tiếp vào bảng categories và cất Object đó vào mảng $savedCategories
            $savedCategories[$slug] = Category::create([
                'slug' => $slug,
                'name' => $name
            ]);
        }

        // -------------------------------------------------------------
        // BƯỚC 2: KHAI BÁO MẢNG SẢN PHẨM MẪU (Thay 'category' bằng 'category_slug')
        // -------------------------------------------------------------
        $products = [
            [
                "name" => "Bàn Phím Cơ Nebula Custom RGB",
                "price" => 2500000,
                "category_slug" => "keyboard", // Dùng slug tạm để lát nữa tìm ID danh mục
                "image" => "images/keyboard.png",
                "rating" => 4.9,
                "reviews" => 124,
                "desc" => "Bàn phím cơ Nebula Custom với phối màu độc đáo, switch cơ học cao cấp cho độ bền 80 triệu lần nhấn và hệ thống LED RGB rực rỡ có thể lập trình, mang đến cảm giác gõ phím tuyệt đỉnh.",
                "specs" => [
                    "Thương hiệu" => "MyStore Nebula",
                    "Loại Switch" => "Linear Gateron Yellow",
                    "Chất liệu Keycap" => "PBT Double-Shot Cherry Profile",
                    "Kết nối" => "USB Type-C, Bluetooth 5.1, 2.4Ghz Wireless",
                ],
            ],
            [
                "name" => "Tai Nghe Không Dây SonicWave ANC",
                "price" => 1800000,
                "category_slug" => "audio",
                "image" => "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&q=80",
                "rating" => 4.8,
                "reviews" => 95,
                "desc" => "Trải nghiệm âm thanh hi-res đỉnh cao với tính năng chống ồn chủ động (ANC) SonicWave...",
                "specs" => [
                    "Thương hiệu" => "SonicWave",
                    "Driver" => "40mm Dynamic",
                ],
            ],
            [
                "name" => "Đồng Hồ Thông Minh ChronoFit S2",
                "price" => 3200000,
                "category_slug" => "smartwear",
                "image" => "https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500&q=80",
                "rating" => 4.7,
                "reviews" => 64,
                "desc" => "Đồng hồ thông minh ChronoFit S2 sở hữu màn hình AMOLED sắc nét...",
                "specs" => [
                    "Thương hiệu" => "ChronoFit",
                    "Màn hình" => "1.43 inch AMOLED Touchscreen",
                ],
            ],
            [
                "name" => "Loa Bluetooth AuraSound Ambient",
                "price" => 1200000,
                "category_slug" => "audio",
                "image" => "https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=500&q=80",
                "rating" => 4.6,
                "reviews" => 82,
                "desc" => "Hòa mình vào không gian âm nhạc sống động 360 độ với loa AuraSound...",
                "specs" => [
                    "Thương hiệu" => "AuraSound",
                    "Công suất" => "20W RMS",
                ],
            ],
            [
                "name" => "Chuột Gaming ApexMouse Wireless",
                "price" => 950000,
                "category_slug" => "keyboard",
                "image" => "https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?w=500&q=80",
                "rating" => 4.8,
                "reviews" => 142,
                "desc" => "Tốc độ phản hồi cực nhanh với kết nối không dây trễ bằng 0...",
                "specs" => [
                    "Thương hiệu" => "ApexMouse",
                    "Cảm biến" => "Focus Pro 30K Optical Sensor",
                ],
            ],
            [
                "name" => "Đèn LED Thông Minh RGB Ambient Light",
                "price" => 450000,
                "category_slug" => "lighting",
                "image" => "https://images.unsplash.com/photo-1563245372-f21724e3856d?w=500&q=80",
                "rating" => 4.5,
                "reviews" => 58,
                "desc" => "Nâng tầm không gian làm việc của bạn với dải đèn LED Ambient Light thông minh...",
                "specs" => [
                    "Thương hiệu" => "AmbientLight",
                    "Chiều dài" => "1.5 mét (Dải LED)",
                ],
            ],
        ];

        // -------------------------------------------------------------
        // BƯỚC 3: LIÊN KẾT VÀ LƯU SẢN PHẨM VÀO DATABASE
        // -------------------------------------------------------------
        foreach ($products as $pData) {
            // Lấy ra Object danh mục tương ứng dựa vào slug (ví dụ: 'keyboard')
            $category = $savedCategories[$pData['category_slug']];

            // Loại bỏ trường tạm 'category_slug' ra khỏi mảng vì bảng Product không có cột này
            unset($pData['category_slug']);

            // Lấy ID thật của danh mục vừa tạo trong DB để gán vào cột khóa ngoại 'category_id'
            $pData['category_id'] = $category->id;

            // Tiến hành lưu sản phẩm vào MySQL
            Product::create($pData);
        }
    }
}
?>
