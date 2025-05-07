<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'type',
        'password',
        'status',
        'code',
    ];
    protected $hidden = [
        'password',
        'code',
        'remember_token',
    ];
    protected function casts(): array{
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
