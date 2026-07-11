@extends('layouts.main')

@section('noidung')
    <main class="error-page">
        <section class="error-content" aria-labelledby="error-title">
            <h1 id="error-title">Không tìm thấy trang</h1>
            <p class="error-code" aria-hidden="true">404</p>
            <h2>Trang này đã lạc mất.</h2>
            <p class="error-message">Đường dẫn bạn truy cập không tồn tại hoặc đã được di chuyển. Hãy quay lại trang chủ để tiếp tục khám phá MyStore.</p>
            <div class="error-actions">
                <a href="{{ url('/') }}" class="btn btn-primary">Về trang chủ</a>
                <a href="{{ url('/products.php') }}" class="btn btn-secondary">Xem sản phẩm</a>
            </div>
        </section>
    </main>
@endsection
