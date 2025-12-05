<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Auth\Passwords\CanResetPassword; // ← 确保有这行
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'activated',             // ← 必须加上！
        'activation_token',      // ← 必须加上！
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activation_token', // 可选：避免 API 暴露 token
    ];
    protected static function booted(): void
        {
            static::creating(function (User $user) {
                $user->activation_token = Str::random(32); // 更长更安全
            });
        }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'activated' => 'boolean', // ← 强烈建议加上，确保 true/false 类型正确
        ];
    }

    /**
     * 获取用户的 Gravatar 头像 URL（使用 V2EX CDN 加速）
     */
    public function gravatar($size = 100): string
    {
        $hash = md5(strtolower(trim($this->email)));
        return "https://cdn.v2ex.com/gravatar/{$hash}?s={$size}";
    }


}
