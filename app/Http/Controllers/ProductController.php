<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // 1. Lấy sản phẩm từ MySQL kèm theo thông tin bảng Category liên kết
        $query = Product::with('category');

        // 2. Thực thi câu lệnh SQL lấy dữ liệu ra
        $products = $query->get()->map(function ($product) {
            // Tối ưu đường dẫn ảnh: Nếu là ảnh nội bộ thì tự động thêm domain đầy đủ vào
            if (!filter_var($product->image, FILTER_VALIDATE_URL)) {
                $product->image = asset($product->image);
            }
            return $product;
        });

        // 3. Trả về định dạng JSON cho JavaScript nhận
        return response()->json($products);
    }
}?>
