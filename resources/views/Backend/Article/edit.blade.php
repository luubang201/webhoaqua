@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Quản lý bài viết<a href="{{ route('admin.article.index') }}" class="btn bg-purple btn-flat"><i class="fa fa-tasks"></i> Danh sách</a>
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
                            <h3 class="card-title">Sửa bài viết</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route ('admin.article.update', ['article' =>$data->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tiêu đề</label>
                                        <input value="{{$data->title}}" type="text" class="form-control" id="title" name="title" placeholder="Nhập tiêu đề">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh</label>
                                        <input type="file" id="image" name="image">
                                        <br>
                                        <img src="{{asset($data->image)}}" width="150" alt="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tóm tắt</label>
                                        <input value="{{$data->summary}}" type="text" class="form-control" id="summary" name="summary" placeholder="Nhập tóm tắt bài viết">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả</label>
                                        <textarea  id="description" name="description" class="form-control" rows="3"
                                                   placeholder="Nhập mô tả bài viết">{{$data->description}}</textarea>
                                 </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">loại bài viết</label>
                                        <select class="form-control w-50" name="type">
                                            <option {{ ($data->type == 1 ? 'selected':'') }} value="1" >- Tin tức</option>
                                            <option {{ ($data->type == 2 ? 'selected':'') }} value="2">- Tin khuyến mại</option>
                                            <option {{ ($data->type == 3 ? 'selected':'') }} value="3">- Tin nổi bật</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input value="{{ $data->position }}" type="number" class="form-control w-50" id="position" name="position">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input {{ ($data->is_active == 1 ? 'checked':'') }} type="checkbox" value="1" name="is_active"> <b>Hiển thị</b>
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
