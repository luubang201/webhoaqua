@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Quản lý nhà cung cấp<a href="{{ route('admin.vendor.index') }}" class="btn bg-purple btn-flat"><i class="fa fa-tasks"></i> Danh sách</a>

                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý nhà cung cấp</li>
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
                            <h3 class="card-title">Sửa thông nhà cung cấp</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route ('admin.vendor.update', ['vendor' =>$data->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên nhà cung cấp</label>
                                        <input value="{{ $data->name }}" type="text" class="form-control" id="name" name="name" placeholder="Nhập tên ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input value="{{ $data->email }}" type="text" class="form-control" id="email" name="email" placeholder="Nhập email ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số Điện Thoại</label>
                                        <input value="{{ $data->phone }}" type="text" class="form-control" id="phone" name="phone" placeholder="Nhập Số điện thoại ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh</label>
                                        <input type="file" id="image" name="image">
                                        <br>
                                        <img src="{{ asset($data->image) }}" alt="" width="100" style="margin-top: 10px;">
                                        @if ($errors->has('image'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('image') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tùy chỉnh WebSite</label>
                                        <input value="{{ $data->website }}" type="text" class="form-control" id="website" name="website" placeholder="website">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ nhà cung cấp</label>
                                        <input value="{{ $data->address }}" type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ ">
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleInputEmail1">Vị trí</label>--}}
{{--                                        <input type="number" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="{{ $data->position }}">--}}
{{--                                    </div>--}}
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active" {{ ($data->is_active == 1) ? 'checked' : '' }} > Trạng thái hiển thị
                                        </label>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
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
