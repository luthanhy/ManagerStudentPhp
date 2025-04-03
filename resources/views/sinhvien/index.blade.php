@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Danh Sách Sinh Viên</h2>
        <a href="{{ route('sinhvien.create') }}" class="btn btn-success btn-custom">+ Thêm Sinh Viên</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Mã SV</th>
                    <th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th>Ngành Học</th>
                    <th>Hình</th> <!-- Cột hình ảnh -->
                    <th>Hành Động</th>
                    <th>Chi Tiết</th> <!-- Cột chi tiết -->
                </tr>
            </thead>
            <tbody>
                @foreach($sinhviens as $sinhvien)
                    <tr>
                        <td>{{ $sinhvien->MaSV }}</td>
                        <td>{{ $sinhvien->HoTen }}</td>
                        <td>{{ $sinhvien->GioiTinh }}</td>
                        <td>{{ $sinhvien->NgaySinh }}</td>
                        <td>{{ $sinhvien->nganhHoc->TenNganh }}</td>
                        <td>
                            <!-- Hiển thị hình ảnh -->
                            @if($sinhvien->Hinh)
                                <img src="{{ asset('storage/' . $sinhvien->Hinh) }}" alt="Hình ảnh sinh viên" style="width: 100px; height: auto;">
                            @else
                                <span>Chưa có hình</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('sinhvien.edit', $sinhvien->MaSV) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('sinhvien.destroy', $sinhvien->MaSV) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                        <td>
                            <!-- Liên kết đến trang chi tiết -->
                            <a href="{{ route('sinhvien.show', $sinhvien->MaSV) }}" class="btn btn-info">Xem Chi Tiết</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang -->
        {{ $sinhviens->links() }}
    </div>
@endsection
