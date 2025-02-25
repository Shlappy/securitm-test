<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id ID
 * @property string $email Почта
 * @property string $password Пароль
 * @property string|null $name Имя
 * @property string|null $ip IP
 * @property string|null $comment Комментарий
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ip',
        'comment',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
}
