@extends('layouts.app')
@section('content')
    <h2 class="fw-bold mb-4">Thêm Sinh Viên Mới</h2>
    <form action="{{ route('sinhvien.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="MaSV" class="form-label">Mã Sinh Viên</label>
                <input type="text" class="form-control" id="MaSV" name="MaSV" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="HoTen" class="form-label">Họ Tên</label>
                <input type="text" class="form-control" id="HoTen" name="HoTen" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="GioiTinh" class="form-label">Giới Tính</label>
                <select class="form-select" id="GioiTinh" name="GioiTinh" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="NgaySinh" class="form-label">Ngày Sinh</label>
                <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Hinh" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="Hinh" name="Hinh">
            </div>
            <div class="col-md-6 mb-3">
                <label for="MaNganh" class="form-label">Ngành Học</label>
                <select class="form-select" id="MaNganh" name="MaNganh" required>
                    @foreach($nganhHoc as $nganh)
                        <option value="{{ $nganh->MaNganh }}">{{ $nganh->TenNganh }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('sinhvien.index') }}" class="btn btn-secondary btn-custom me-2">Hủy</a>
            <button type="submit" class="btn btn-primary btn-custom">Lưu</button>
        </div>
    </form>
@endsection