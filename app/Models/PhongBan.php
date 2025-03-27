<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    use HasFactory;
    protected $table = 'PHONGBAN';
    protected $primaryKey = 'Ma_Phong';
    public $incrementing = false;
    protected $fillable = ['Ma_Phong', 'Ten_Phong'];
}
?>
