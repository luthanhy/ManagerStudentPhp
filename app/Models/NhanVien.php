<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'NHANVIEN';
    protected $primaryKey = 'Ma_NV';
    public $incrementing = false;
    protected $fillable = ['Ma_NV', 'Ten_NV', 'Phai', 'Noi_Sinh', 'Ma_Phong', 'Luong'];

    public function phongBan()
    {
        return $this->belongsTo(PhongBan::class, 'Ma_Phong', 'Ma_Phong');
    }
}
?>