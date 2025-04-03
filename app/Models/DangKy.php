<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    class DangKy extends Model {
        protected $table = 'DangKy';
        protected $primaryKey = 'MaDK';
        protected $fillable = ['NgayDK', 'MaSV'];
    }
?>