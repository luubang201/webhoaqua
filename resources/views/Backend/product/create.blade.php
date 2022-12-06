@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Thêm bài viết <a href="{{route('admin.product.index')}}" class="btn btn-primary">Danh sách </a>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh sản phẩm</label>
                                        <input type="file" class="" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Số lượng</label>
                                        <input type="number" class="form-control w-50" id="stock" name="stock" value="0" min="0">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Giá gốc (vnđ)</label>
                                                <input type="number" class="form-control" id="price" name="price" value="0" min="0">
                                            </div>
                                        </div>
                                        <!-- /.col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Giá khuyến mại (vnđ)</label>
                                                <input type="number" class="form-control" id="sale" name="sale" value="0" min="0">
                                            </div>
                                        </div>
                                        <!-- /.col-lg-6 -->
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục sản phẩm</label>
                                        <select class="form-control w-50" name="category_id">
                                            <option value="0">-- chọn Danh Mục --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label>Thương hiệu</label>--}}
{{--                                        <select class="form-control w-50" name="brand_id">--}}
{{--                                            <option value="0">-- chọn Thương Hiệu--</option>--}}
{{--                                            @foreach($brands as $brand)--}}
{{--                                                <option value="{{ $brand -> id }}">{{ $brand -> name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label>Nhà cung cấp</label>
                                        <select class="form-control w-50" name="vendor_id">
                                            <option value="0">-- chọn NCC --</option>
                                            @foreach($vendors as $vendor)
                                                <option value="{{ $vendor -> id }}">{{ $vendor -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleInputEmail1">Mã hàng (SKU)</label>--}}
{{--                                        <input type="text" class="form-control w-50" id="sku" name="sku" placeholder="">--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input type="number" class="form-control w-50" id="position" name="position" value="0">
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="1" name="is_active"> <b>Trạng thái</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="1" name="is_hot"> <b>Sản phẩm Hot</b>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Liên kết (url) tùy chỉnh</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Tóm tắt</label>
                                        <textarea id="editor2" name="summary" class="form-control" rows="10" ></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea id="editor1" name="description" class="form-control" rows="10" ></textarea>
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleInputEmail1">Meta Title</label>--}}
{{--                                        <input type="text" class="form-control" id="meta_title" name="meta_title" >--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Meta Description</label>--}}
{{--                                        <textarea name="meta_description" class="form-control" rows="3" ></textarea>--}}
{{--                                    </div>--}}
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tạo</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('ckeditor_js')
    <script type="text/javascript">
        $(function () {
            $(function () {
                var _ckeditor2 = CKEDITOR.replace('description');
                _ckeditor2.config.height = 250;
            })
        })
    </script>
@endsection
