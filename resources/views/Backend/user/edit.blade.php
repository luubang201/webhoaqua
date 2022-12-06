@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Quản lý Danh mục<a href="{{ route('admin.user.index') }}" class="btn bg-purple btn-flat"><i class="fa fa-tasks"></i> Danh sách</a>

                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý nhà người dùng</li>
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
                            <h3 class="card-title">Sửa thông người dùng</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.user.update', ['user' =>$data->id], ['parent_id' => $data->parent_id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phân quyền</label>
                                        <select class="form-control" name="role_id" id="role_id">
                                            <option>--Chọn--</option>
                                            <option value="1" {{ ($data->role_id == 1) ? 'selected' : '' }} >Admin</option>
                                            <option value="2" {{ ($data->role_id == 2) ? 'selected' : '' }}>Manager</option>
                                            <option value="3" {{ ($data->role_id == 3) ? 'selected' : '' }}>Member</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputSupplier">Họ tên</label>
                                        <input value="{{$data->name}}" type="text" class="form-control" id="name" name="name" placeholder="vui lòng nhập họ tên">
                                        @if ($errors->has('name'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email </label>
                                        <input value="{{$data->email}}" type="email" class="form-control" id="email" name="email" placeholder="vui lòng nhập email">
                                        @if ($errors->has('email'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('email') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="color: red">** Mật khẩu Mới</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">New Avatar</label>
                                        <br>
                                        <input type="file" id="avatar" name="avatar">
                                        <br>
                                        <img src="{{ asset($data->avatar) }}" alt="" width="100" style="margin-top: 10px;">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input {{ ($data->is_active == 1) ? 'checked' : '' }} type="checkbox" value="1" name="is_active"> Kích hoạt tài khoản
                                        </label>
                                    </div>
                                </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Lưu</button>
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
