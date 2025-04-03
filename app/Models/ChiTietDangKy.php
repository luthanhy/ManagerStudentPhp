<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ChiTietDangKy extends Model {
    protected $table = 'ChiTietDangKy';
    protected $primaryKey = ['MaDK', 'MaHP'];
    public $incrementing = false;
    protected $fillable = ['MaDK', 'MaHP'];
}
?>