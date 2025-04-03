@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fw-bold">Chi Tiết Sinh Viên</h2>
        <div class="card mt-4">
            <div class="card-header">
                <h5>{{ $sinhvien->HoTen }}</h5>
                <p><strong>Mã Sinh Viên:</strong> {{ $sinhvien->MaSV }}</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Hình Ảnh</h5>
                        <!-- Hiển thị hình ảnh -->
                        <img src="{{ asset('storage/' . $sinhvien->Hinh) }}" alt="Hình ảnh sinh viên" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h5>Thông Tin Sinh Viên</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Giới Tính:</strong> {{ $sinhvien->GioiTinh }}</li>
                            <li class="list-group-item"><strong>Ngày Sinh:</strong> {{ \Carbon\Carbon::parse($sinhvien->NgaySinh)->format('d/m/Y') }}</li>
                            <li class="list-group-item"><strong>Ngành Học:</strong> {{ $sinhvien->nganhHoc->TenNganh }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('sinhvien.index') }}" class="btn btn-primary mt-4">Trở lại danh sách sinh viên</a>
    </div>
@endsection
