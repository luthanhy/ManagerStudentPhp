<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Nhân viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-primary">Chỉnh sửa Nhân viên</h2>
        <div class="card p-4">
            <form action="{{ url('/nhanvien/update/' . $nhanvien->Ma_NV) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Ten_NV" class="form-label">Tên Nhân Viên</label>
                    <input type="text" class="form-control" name="Ten_NV" value="{{ $nhanvien->Ten_NV }}" required>
                </div>
                <div class="mb-3">
                    <label for="Phai" class="form-label">Giới tính</label>
                    <select class="form-control" name="Phai">
                        <option value="NAM" {{ $nhanvien->Phai == 'NAM' ? 'selected' : '' }}>Nam</option>
                        <option value="NU" {{ $nhanvien->Phai == 'NU' ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Noi_Sinh" class="form-label">Nơi Sinh</label>
                    <input type="text" class="form-control" name="Noi_Sinh" value="{{ $nhanvien->Noi_Sinh }}" required>
                </div>
                <div class="mb-3">
                    <label for="Ten_Phong" class="form-label">Tên Phòng</label>
                    <input type="text" class="form-control" name="Ten_Phong" value="{{ $nhanvien->phongBan->Ten_Phong ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="Luong" class="form-label">Lương</label>
                    <input type="number" class="form-control" name="Luong" value="{{ $nhanvien->Luong }}" required>
                </div>
                <button type="submit" class="btn btn-success">Cập nhật</button>
                <a href="{{ url('/nhanvien') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</body>
</html>
