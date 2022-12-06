@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Thêm bài viết <a href="{{route('admin.article.index')}}" class="btn btn-primary">Danh sách </a>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý bài viết</li>
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
                            <h3 class="card-title">Thêm bài viết</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.article.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tiêu đề</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tiêu đề">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh</label>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tóm tắt</label>
                                        <input type="text" class="form-control" id="summary" name="summary" placeholder="Nhập tóm tắt bài viết">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả</label>
                                        <textarea  id="description" name="description" class="form-control" rows="3"
                                                   placeholder="Nhập mô tả bài viết"></textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">loại bài viết</label>
                                        <select class="form-control w-50" name="type">
                                            <option value="0">-- chọn --</option>
                                            <option value="1"> Tin tức </option>
                                            <option value="2"> Tin khuyến mại </option>
                                            <option value="3"> Tin nổi bật </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position" value="0">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active"> Trạng thái hiển thị
                                        </label>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tạo</button>
                                </div>
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
