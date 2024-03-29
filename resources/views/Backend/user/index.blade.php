@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        QL Người dùng <a href="{{ route('admin.user.create') }}" class="btn bg-purple btn-flat"><i class="fa fa-plus"></i> Thêm</a>
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách người dùng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">TT</th>
                        <th>Avatar</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th>Ngày cấp</th>
                        <th>Trạng thái</th>
                        <th style="width: 40px">Hành động</th>
                    </tr>
                    @foreach($data as $key => $item)
                        <tr class="item-{{ $item->id }}">
                            <td>{{ $key + 1 }}</td>
                            <td><img src="{{ asset($item->avatar) }}" width="100"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role_id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->is_active == 1 ? 'Hiển thị' : 'ẩn' }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.user.edit',['user'=> $item->id], ['id' => $item->id]) }}" class="btn btn-flat bg-purple"> <i class="fas fa-edit"></i></a>
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
                    url: '/admin/user/'+id,
                    type: 'DELETE', // phương truyền tải dữ liệu
                    data: {
                        // dữ liệu truyền sang nếu có
                        name : 'dung'
                    },
                    dataType: "json", // kiểu dữ liệu muốn nhận về
                    success: function (res) {
                        //  PHP : $user->name
                        //  JS: res.name

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
