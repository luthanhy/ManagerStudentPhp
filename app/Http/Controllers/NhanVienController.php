<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use App\Models\PhongBan;

class NhanVienController extends Controller
{
    public function index()
    {
        $nhanviens = NhanVien::with('phongBan')->paginate(5);
        return view('nhanvien.index', compact('nhanviens'));
    }
}
?>