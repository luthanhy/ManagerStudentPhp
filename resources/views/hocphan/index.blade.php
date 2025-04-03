@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Danh Sách Học Phần</h2>
        <a href="{{ route('hocphan.create') }}" class="btn btn-success btn-custom">+ Thêm Học Phần</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Mã HP</th>
                    <th>Tên Học Phần</th>
                    <th>Mô Tả</th>
                    <th>Số Tín Chỉ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hocphans as $hocphan)
                    <tr>
                        <td>{{ $hocphan->MaHP }}</td>
                        <td>{{ $hocphan->TenHP }}</td>
                        <td>{{ $hocphan->MoTa }}</td>
                        <td>{{ $hocphan->SoTinChi }}</td>
                        <td>
                            <a href="{{ route('hocphan.show', $hocphan->id) }}" class="btn btn-info">Xem Chi Tiết</a>
                            <a href="{{ route('dangky.store', $hocphan->id) }}" class="btn btn-primary">Đăng Ký</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang -->
        {{ $hocphans->links() }}
    </div>
@endsection
