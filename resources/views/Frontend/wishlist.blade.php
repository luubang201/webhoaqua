@extends('Frontend.layouts.main')
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('Frontend/images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{route('Frontend.shop')}}">Trang chủ</a></span> <span>Wishlist</span></p>
                <h1 class="mb-0 bread">My Wishlist</h1>
            </div>
        </div>
    </div>
</div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>Danh sách sản phẩm</th>
                                <th>&nbsp;</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                        <tr class="text-center">
                            <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                            <td class="image-prod"><div class="img" style="background-image:url(Frontend/images/product-1.jpg);"></div></td>

                            <td class="product-name">
                                <h3>Bell Pepper</h3>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                            </td>

                            <td class="price">$4.90</td>

                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                </div>
                            </td>

                            <td class="total">$4.90</td>
                        </tr><!-- END TR-->

                        <tr class="text-center">
                            <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                            <td class="image-prod"><div class="img" style="background-image:url(Frontend/images/product-2.jpg);"></div></td>

                            <td class="product-name">
                                <h3>Bell Pepper</h3>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                            </td>

                            <td class="price">$15.70</td>

                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                </div>
                            </td>

                            <td class="total">$15.70</td>
                        </tr><!-- END TR-->

                        <tr class="text-center">
                            <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                            <td class="image-prod"><div class="img" style="background-image:url(Frontend/images/product-3.jpg);"></div></td>

                            <td class="product-name">
                                <h3>Bell Pepper</h3>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                            </td>

                            <td class="price">$15.70</td>

                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                </div>
                            </td>

                            <td class="total">$15.70</td>
                        </tr><!-- END TR-->

                        <tr class="text-center">
                            <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                            <td class="image-prod"><div class="img" style="background-image:url(Frontend/images/product-4.jpg);"></div></td>

                            <td class="product-name">
                                <h3>Bell Pepper</h3>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                            </td>

                            <td class="price">$15.70</td>

                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                </div>
                            </td>

                            <td class="total">$15.70</td>
                        </tr><!-- END TR-->

                        <tr class="text-center">
                            <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                            <td class="image-prod"><div class="img" style="background-image:url(Frontend/images/product-5.jpg);"></div></td>

                            <td class="product-name">
                                <h3>Bell Pepper</h3>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                            </td>

                            <td class="price">$15.70</td>

                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                </div>
                            </td>

                            <td class="total">$15.70</td>
                        </tr><!-- END TR-->

                        <tr class="text-center">
                            <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                            <td class="image-prod"><div class="img" style="background-image:url(Frontend/images/product-6.jpg);"></div></td>

                            <td class="product-name">
                                <h3>Bell Pepper</h3>
                                <p>Far far away, behind the word mountains, far from the countries</p>
                            </td>

                            <td class="price">$15.70</td>

                            <td class="quantity">
                                <div class="input-group mb-3">
                                    <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                                </div>
                            </td>

                            <td class="total">$15.70</td>
                        </tr><!-- END TR-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Đăng ký nhận bản tin của chúng tôi</h2>
                <span>Nhận e-mail cập nhật về các cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="Nhập địa chỉ Email">
                        <input type="submit" value="Đăng ký" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection


