<!doctype html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang Chủ - MyStore Tech Shop</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
  </head>
  <body>
@include('partials.top')
@yield('noidung')
@include('partials.bot')
   <script src="{{ asset('/js/main.js') }}"></script>
  </body>
</html>
