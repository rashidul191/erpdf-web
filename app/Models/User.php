<?php

namespace App\Models;

use App\Casts\ImageField;
use App\Enums\UserStatus;;
use App\Traits\DeletesImage;
use BenSampo\Enum\Traits\QueriesFlaggedEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use HasFactory, LaratrustUserTrait, Notifiable, DeletesImage, QueriesFlaggedEnums;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'phone',
        'email',
        'address',
        'avatar',
        'status',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'avatar' => ImageField::class . ':avatar,images/avatar.png',
        'email_verified_at' => 'datetime',
        'status' => UserStatus::class,

    ];

    public function isActive()
    {
        return $this->status->is(UserStatus::Active());
    }
}
