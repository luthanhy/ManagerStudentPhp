<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    
    class HocPhan extends Model {
        protected $table = 'HocPhan';
        protected $primaryKey = 'MaHP';
        public $incrementing = false;
        protected $fillable = ['MaHP', 'TenHP', 'SoTinChi', 'SoLuongDuKien'];
    }
?>