<?php
    // app/Http/Controllers/DangKyHocPhanController.php
namespace App\Http\Controllers;
use App\Models\HocPhan;
use App\Models\DangKy;
use App\Models\ChiTietDangKy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DangKyHocPhanController extends Controller {
    public function index() {
        $hocPhan = HocPhan::all();
        return view('dangky.index', compact('hocPhan'));
    }

    public function cart() {
        $dangKy = DangKy::where('MaSV', Auth::user()->MaSV)->latest()->first();
        $chiTiet = $dangKy ? ChiTietDangKy::where('MaDK', $dangKy->MaDK)->with('hocPhan')->get() : [];
        return view('dangky.cart', compact('chiTiet', 'dangKy'));
    }

    public function store(Request $request) {
        $dangKy = DangKy::create([
            'NgayDK' => now(),
            'MaSV' => Auth::user()->MaSV
        ]);

        foreach ($request->hocPhan as $maHP) {
            $hocPhan = HocPhan::find($maHP);
            if ($hocPhan->SoLuongDuKien > 0) {
                ChiTietDangKy::create(['MaDK' => $dangKy->MaDK, 'MaHP' => $maHP]);
                $hocPhan->SoLuongDuKien--;
                $hocPhan->save();
            }
        }
        return redirect()->route('dangky.cart')->with('success', 'Đăng ký thành công');
    }

    public function destroy($maHP) {
        $dangKy = DangKy::where('MaSV', Auth::user()->MaSV)->latest()->first();
        ChiTietDangKy::where('MaDK', $dangKy->MaDK)->where('MaHP', $maHP)->delete();
        $hocPhan = HocPhan::find($maHP);
        $hocPhan->SoLuongDuKien++;
        $hocPhan->save();
        return redirect()->back()->with('success', 'Xóa học phần thành công');
    }

    public function destroyAll() {
        $dangKy = DangKy::where('MaSV', Auth::user()->MaSV)->latest()->first();
        $chiTiet = ChiTietDangKy::where('MaDK', $dangKy->MaDK)->get();
        foreach ($chiTiet as $item) {
            $hocPhan = HocPhan::find($item->MaHP);
            $hocPhan->SoLuongDuKien++;
            $hocPhan->save();
        }
        $dangKy->delete();
        return redirect()->back()->with('success', 'Xóa toàn bộ đăng ký thành công');
    }
}
?>