<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('Frontend.shop')}}">Vegefoods</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('Frontend.shop')}}" class="nav-link">Trang chủ</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cửa hàng</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route('Frontend.product')}}">Sản phẩm</a>
                        <a class="dropdown-item" href="{{route('Frontend.wishlist')}}">Danh sách yêu thích</a>
                        <a class="dropdown-item" href="{{route('Frontend.product_single')}}">chi tiết sản phẩm</a>
                        <a class="dropdown-item" href="{{route('Frontend.cart')}}">Giỏ hàng</a>
                        <a class="dropdown-item" href="{{route('Frontend.checkout')}}">Thanh toán</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{route('Frontend.about')}}" class="nav-link">Giới thiệu</a></li>
                <li class="nav-item"><a href="{{route('Frontend.blog')}}" class="nav-link">Tin tức</a></li>
                <li class="nav-item"><a href="{{route('Frontend.contact')}}" class="nav-link">Liên hệ</a></li>
                <li class="nav-item cta cta-colored"><a href="{{route('Frontend.cart')}}" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

            </ul>
        </div>
    </div>
</nav>
