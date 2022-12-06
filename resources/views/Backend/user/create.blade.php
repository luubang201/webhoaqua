@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Thêm Người dùng <a href="{{route('admin.user.index')}}" class="btn btn-primary">Danh sách </a>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý người dùng</li>
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
                            <h3 class="card-title">Thêm thông người dùng</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phân quyền</label>
                                        <select class="form-control" name="role_id" id="role_id">
                                            <option>--Chọn--</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Manager</option>
                                            <option value="3">Member</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputSupplier">Họ tên</label>
                                        <input  type="text" class="form-control" id="name" name="name" placeholder="vui lòng nhập họ tên">
                                        @if ($errors->has('name'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email </label>
                                        <input  type="email" class="form-control" id="email" name="email" placeholder="vui lòng nhập email">
                                        @if ($errors->has('email'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('email') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPhone">Mật khẩu</label>
                                        <input  type="password" class="form-control" id="password" name="password" placeholder="vui lòng nhập mật khẩu">
                                        @if ($errors->has('password'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('password') }}</label>
                                        @endif
                                    </div>
                                            <div class="input-group-append">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Ảnh</label>
                                                    @if ($errors->has('avatar'))
                                                        <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('avatar') }}</label>
                                                    @endif
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
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
