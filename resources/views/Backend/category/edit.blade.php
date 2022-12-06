@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Quản lý danh mục<a href="{{ route('admin.category.index') }}" class="btn bg-purple btn-flat"><i class="fa fa-tasks"></i> Danh sách</a>
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
                        <form role="form" action="{{route('admin.category.update',['category' =>$data->id], ['parent_id' => $data->parent_id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Danh mục cha</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="0">-- Chọn --</option>
                                            @foreach($dataAll as $item)
                                                <option {{ $data ->parent_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục</label>
                                        <input value="{{ $data->name }}" type="text" class="form-control" id="name"
                                               name="name" placeholder="Nhập tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Change File</label>
                                        <input type="file" id="new_image" name="new_image"><br>
                                        @if ($data->image)
                                            <img src="{{asset($data->image)}}" width="200">
                                        @endif
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input {{ ($data->is_active) ? 'checked':'' }} type="checkbox" value="1" name="is_active"> Trạng thái
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input value="{{ $data->position }}" type="text" class="form-control" id="position"
                                               name="position" placeholder="Nhập tên vị trí">
                                    </div>
                                    <div class="form-group">
                                        <label>Loại</label>
                                        <select class="form-control" name="Type">
                                            <option value="1" {{ ($data->Type == 1) ? 'selected' : '' }} >Sản Phẩm</option>
                                            <option value="2" {{ ($data->Type == 2) ? 'selected' : '' }}>Tin Tức</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

