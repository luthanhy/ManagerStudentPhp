<!DOCTYPE html>
<html>
<head>
    <title>Danh sách nhân viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            text-align: center;
            padding: 20px;
        }
        .table-container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .gender-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .pagination-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logout-container {
            text-align: right;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="logout-container">
            @if(Auth::check())
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Đăng xuất</button>
            </form>
            @endif
        </div>

        <h2 class="text-primary">Danh sách nhân viên</h2>
        <div class="table-container">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Mã Nhân Viên</th>
                        <th>Tên Nhân Viên</th>
                        <th>Giới tính</th>
                        <th>Nơi Sinh</th>
                        <th>Tên Phòng</th>
                        <th>Lương</th>
                        @if(Auth::check() && Auth::user()->role == 'admin')
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($nhanviens as $nhanvien)
                    <tr>
                        <td>{{ $nhanvien->Ma_NV }}</td>
                        <td>{{ $nhanvien->Ten_NV }}</td>
                        <td>
                            <img src="{{ asset($nhanvien->Phai == 'NU' ? 'images/woman.jpg' : 'images/man.jpg') }}" class="gender-img" alt="{{ $nhanvien->Phai }}">
                        </td>
                        <td>{{ $nhanvien->Noi_Sinh }}</td>
                        <td>{{ $nhanvien->phongBan->Ten_Phong ?? 'Chưa có phòng' }}</td>
                        <td>{{ number_format($nhanvien->Luong) }} VND</td>
                        @if(Auth::check() && Auth::user()->role == 'admin')
                            <td>
                                <a href="/nhanvien/edit/{{ $nhanvien->Ma_NV }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form method="POST" action="/nhanvien/delete/{{ $nhanvien->Ma_NV }}" style="display:inline;" onsubmit="return confirmDelete()">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-container">
                {{ $nhanviens->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Bạn có chắc chắn muốn xóa nhân viên này không?");
        }
    </script>
</body>
</html>
