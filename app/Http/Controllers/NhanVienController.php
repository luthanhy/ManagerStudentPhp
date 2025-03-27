<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use App\Models\PhongBan;
use Illuminate\Support\Facades\Auth;

class NhanVienController extends Controller
{
    public function index()
    {
        $nhanviens = NhanVien::with('phongBan')->paginate(5);
        return view('nhanvien.index', compact('nhanviens'));
    }

    public function create()
    {
        return view('nhanvien.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/nhanvien')->withErrors(['Bạn không có quyền thực hiện thao tác này.']);
        }
        NhanVien::create($request->all());
        return redirect('/nhanvien');
    }

    public function edit($id)
    {
        $nhanvien = NhanVien::findOrFail($id);
        return view('nhanvien.edit', compact('nhanvien'));
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/nhanvien')->withErrors(['Bạn không có quyền thực hiện thao tác này.']);
        }
        NhanVien::findOrFail($id)->update($request->all());
        return redirect('/nhanvien');
    }

    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/nhanvien')->withErrors(['Bạn không có quyền thực hiện thao tác này.']);
        }
        NhanVien::destroy($id);
        return redirect('/nhanvien');
    }
}
?>
