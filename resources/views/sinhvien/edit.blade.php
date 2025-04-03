@extends('layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">Sửa Thông Tin Sinh Viên</h2>

    <!-- Form to update student information -->
    <form action="{{ route('sinhvien.update', $sinhvien->MaSV) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Student ID (readonly) -->
            <div class="col-md-6 mb-3">
                <label for="MaSV" class="form-label">Mã Sinh Viên</label>
                <input type="text" class="form-control" id="MaSV" name="MaSV" value="{{ $sinhvien->MaSV }}" readonly>
            </div>

            <!-- Full Name -->
            <div class="col-md-6 mb-3">
                <label for="HoTen" class="form-label">Họ Tên</label>
                <input type="text" class="form-control" id="HoTen" name="HoTen" value="{{ $sinhvien->HoTen }}" required>
            </div>

            <!-- Gender -->
            <div class="col-md-6 mb-3">
                <label for="GioiTinh" class="form-label">Giới Tính</label>
                <select class="form-select" id="GioiTinh" name="GioiTinh" required>
                    <option value="Nam" {{ $sinhvien->GioiTinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                    <option value="Nữ" {{ $sinhvien->GioiTinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                </select>
            </div>

            <!-- Date of Birth -->
            <div class="col-md-6 mb-3">
                <label for="NgaySinh" class="form-label">Ngày Sinh</label>
                <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" value="{{ $sinhvien->NgaySinh }}" required>
            </div>

            <!-- Profile Picture (optional) -->
            <div class="col-md-6 mb-3">
                <label for="Hinh" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="Hinh" name="Hinh">
                @if($sinhvien->Hinh)
                    <img src="{{ asset('storage/' . $sinhvien->Hinh) }}" alt="Hình" class="img-thumbnail mt-2" style="max-width: 100px;">
                @endif
            </div>

            <!-- Major -->
            <div class="col-md-6 mb-3">
                <label for="MaNganh" class="form-label">Ngành Học</label>
                <select class="form-select" id="MaNganh" name="MaNganh" required>
                    @foreach($nganhHoc as $nganh)
                        <option value="{{ $nganh->MaNganh }}" {{ $sinhvien->MaNganh == $nganh->MaNganh ? 'selected' : '' }}>
                            {{ $nganh->TenNganh }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-end">
            <a href="{{ route('sinhvien.index') }}" class="btn btn-secondary btn-custom me-2">Hủy</a>
            <button type="submit" class="btn btn-primary btn-custom">Cập Nhật</button>
        </div>
    </form>
@endsection
