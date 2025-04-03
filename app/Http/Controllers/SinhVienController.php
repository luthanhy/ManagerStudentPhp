<?php
// app/Http/Controllers/SinhVienController.php
namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\NganhHoc;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function index()
    {
        // Lấy danh sách sinh viên với phân trang, 10 sinh viên mỗi trang
        $sinhviens = SinhVien::paginate(10);
        return view('sinhvien.index', compact('sinhviens')); // Pass 'sinhviens' instead of 'sinhvien'
    }

    // Xóa hàm data() vì không cần nữa
    // public function data() { ... }

    public function create()
    {
        $nganhHoc = NganhHoc::all();
        return view('sinhvien.create', compact('nganhHoc'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaSV' => 'required|unique:SinhVien',
            'HoTen' => 'required',
            'GioiTinh' => 'required',
            'NgaySinh' => 'required|date',
            'Hinh' => 'nullable|image',
            'MaNganh' => 'required'
        ]);

        $data = $request->all();
        if ($request->hasFile('Hinh')) {
            $data['Hinh'] = $request->file('Hinh')->store('images', 'public');
        }
        SinhVien::create($data);
        return redirect()->route('sinhvien.index')->with('success', 'Thêm sinh viên thành công');
    }
    public function edit($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        $nganhHoc = NganhHoc::all();
        return view('sinhvien.edit', compact('sinhvien', 'nganhHoc'));
    }
    

    public function update(Request $request, $id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('Hinh')) {
            $data['Hinh'] = $request->file('Hinh')->store('images', 'public');
        }
        $sinhvien->update($data);
        return redirect()->route('sinhvien.index')->with('success', 'Cập nhật thành công');
    }

    public function show($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        return view('sinhvien.show', compact('sinhvien'));
    }

    public function destroy($id)
    {
        SinhVien::findOrFail($id)->delete();
        return redirect()->route('sinhvien.index')->with('success', 'Xóa thành công');
    }
}