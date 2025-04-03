<?php
// app/Models/SinhVien.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model {
    protected $table = 'SinhVien';
    protected $primaryKey = 'MaSV';
    public $incrementing = false;
    protected $fillable = ['MaSV', 'HoTen', 'GioiTinh', 'NgaySinh', 'Hinh', 'MaNganh'];
    
    // Tắt tính năng timestamps
    public $timestamps = false;
    
    public function nganhHoc() {
        return $this->belongsTo(NganhHoc::class, 'MaNganh', 'MaNganh');
    }
}

?>