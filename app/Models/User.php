<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'first_name',
        'last_name',
        'email',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = uniqid("", true);
        });
    }

    public function scopeWhereLike($query, $column, $string)
    {
        return $query->where($column, 'LIKE', '%' . $string . '%');
    }

    public function scopeOrWhereLike($query, $column, $string)
    {
        return $query->orWhere($column, 'LIKE',  '%' . $string . '%');
    }
}
