<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    // 可选：定义允许批量赋值的字段（安全起见）
    protected $fillable = ['content'];

    // 关联：一条微博属于一个用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
