@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Thêm Người dùng <a href="{{route('admin.banner.index')}}" class="btn btn-primary">Danh sách </a>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý banner</li>
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
                            <h3 class="card-title">Thêm thông banner</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputSupplier">Tiêu đề</label>
                                        <input  type="text" class="form-control" id="title" name="title" placeholder="vui lòng nhập tiêu đề">
                                        @if ($errors->has('title'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('title') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh banner</label>
                                        <input type="file" id="image" name="image">
                                        @if ($errors->has('image'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('image') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Kiểu hiển thị</label>
                                        <select class="form-control" name="target" id="target">
                                            <option value>--chọn--</option>
                                            <option value="1">_blank</option>
                                            <option value="2">_self</option>
                                            <option value="3">_parent</option>
                                            <option value="4">_top</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kiểu Banner</label>
                                        <input type="number" class="form-control" id="type" name="type"
                                               value="1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPhone">mô tả</label>
                                        <textarea id="editor2" name="description" class="form-control" rows="3"
                                                  placeholder="Enter ..."></textarea>
                                        @if ($errors->has('description'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('password') }}</label>
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Điều hướng Url</label>
                                            <input type="text" class="form-control" id="url" name="url">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea id="editor2" name="description" class="form-control" rows="3"
                                                      placeholder="Enter ..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vị trí</label>
                                            <input type="number" class="form-control" id="position" name="position"
                                                   value="1">
                                        </div>
                                    <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active"> Trạng thái hiển thị
                                        </label>
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
