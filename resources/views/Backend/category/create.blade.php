@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Thêm nhà cung cấp <a href="{{route('admin.category.index')}}" class="btn btn-primary">Danh sách </a>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý danh mục</li>
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
                            <h3 class="card-title">Thêm thông tin nhà cung cấp</h3>
                        </div>
                        <form role="form" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Danh mục cha</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="0">-- chọn --</option>
                                            {!! $htmlOption !!}
{{--                                            {!! $menu !!}--}}
{{--                                            @foreach($data as $item)--}}
{{--                                                <option value="{{ $item -> id }}">{{ $item -> name }}</option>--}}
{{--                                            @endforeach--}}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh</label>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active"> Trạng thái
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position" min="0" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Loại</label>
                                        <select class="form-control" name="Type">
                                            <option value="1">Sản Phẩm</option>
                                            <option value="2">Tin Tức</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tạo</button>
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
