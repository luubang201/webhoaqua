@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Quản lý banner<a href="{{ route('admin.banner.index') }}" class="btn bg-purple btn-flat"><i class="fa fa-tasks"></i> Danh sách</a>

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
                            <h3 class="card-title">Danh sách banner</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.banner.update', ['banner' =>$data->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputSupplier">Tiêu đề</label>
                                        <input value="{{$data->title}}" type="text" class="form-control" id="title" name="title" placeholder="vui lòng nhập tiêu đề">
                                        @if ($errors->has('title'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('title') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh banner</label>
                                        <input type="file" id="image" name="image">
                                        <img src="{{ asset($data->image) }}" alt="" width="100" style="margin-top: 10px;">
                                        @if ($errors->has('image'))
                                            <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('image') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Kiểu hiển thị</label>
                                        <select class="form-control" name="target" id="target">
                                            <option value>--chọn--</option>
                                            <option value="1" {{ ($data->target == 1) ? 'selected' : '' }}>_blank</option>
                                            <option value="2" {{ ($data->target == 2) ? 'selected' : '' }}>_self</option>
                                            <option value="3" {{ ($data->target == 3) ? 'selected' : '' }}>_parent</option>
                                            <option value="4" {{ ($data->target == 4) ? 'selected' : '' }}>_top</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kiểu Banner</label>
                                        <input value="{{$data->type}}" type="number" class="form-control" id="type" name="type"
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
                                            <input value="{{$data->url}}" type="text" class="form-control" id="url" name="url">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea id="editor2" name="description" class="form-control" rows="3">{{$data->description}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vị trí</label>
                                            <input value="{{$data->position}}" type="number" class="form-control" id="position" name="position"
                                                   value="1">
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" {{($data->is_active == 1) ? 'checked' : '' }} name="is_active"><b>Trạng thái hiển thị</b>
                                                </label>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                            </div>
                                        </div>
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
