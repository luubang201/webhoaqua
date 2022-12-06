@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Quản lý sản phẩm <a href="{{ route('admin.product.create') }}" class="btn bg-purple btn-flat"><i class="fa fa-plus"></i> Thêm</a>
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>TT</th>
                        <th style="max-with:200px">Tên SP</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá KM</th>
                        <th>Giá Gốc</th>
                        <th>Sản phẩm Hot</th>
                        <th>Trạng thái</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                    @foreach($data as $key => $item)
                        <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                            <td>{{ $key }}</td>
                            <td>{{ substr($item->name, 0, 50) }}</td>
                            <td>
                                @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                <img src="{{asset($item->image)}}" width="50" height="50">
                                @endif
                            </td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->sale }}</td>
                            <td>{{ ($item->is_hot == 1) ? 'Có' : 'Không' }}</td>
                            <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.product.edit',['product'=> $item->id], ['id' => $item->id]) }}" class="btn btn-flat bg-purple"> <i class="fas fa-edit"></i></a>
                                <button data-id="{{ $item->id }}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </thead>
                </table>

            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $data->links() }}
            </div>
        </div>
    </section>
@endsection
@section('code_js')
    <script type="text/javascript">
        $(document).ready(function() {
            // Thiết lập csrf => chổng giả mạo
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            $('.btn-delete').on('click',function () {

                let id = $(this).data('id');

                let result = confirm("Bạn có chắc chắn muốn xóa ?");

                if (result) { // neu nhấn == ok , sẽ send request ajax

                    $.ajax({
                        url: '/admin/product/'+id,
                        type: 'DELETE', // phương truyền tải dữ liệu
                        data: {
                            // dữ liệu truyền sang nếu có
                            name : 'dung'
                        },
                        dataType: "json", // kiểu dữ liệu muốn nhận về
                        success: function (res) {

                            if (res.success != 'undefined' && res.success == 1) { // xóa thành công
                                $('.item-'+id).remove();
                            }
                        },
                        error: function (e) { // lỗi nếu có
                            console.log(e);
                        }
                    });
                }

            });

            $( ".btn-delete" ).click(function() {
                alert( "Handler for .click() called." );
            });

        });
    </script>
@endsection
