<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class NganhHoc extends Model {
    protected $table = 'NganhHoc';
    protected $primaryKey = 'MaNganh';
    public $incrementing = false;
    protected $fillable = ['MaNganh', 'TenNganh'];
}
?>