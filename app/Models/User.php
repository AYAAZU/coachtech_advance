<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*Reservationとのリレーション*/
    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }

    public function getReservations()
    {
        return 'ID' . $this->id . ':';
    }

    /*Favoriteとのリレーション*/
    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }

    /*Favoriteとのリレーション*/
    public function reviews()
    {
        return $this->hasManyThrough('App\Models\Review', 'App\Models\Reservation');
    }

    /*Shopとのリレーション*/
    public function shops()
    {
        /*optionalヘルパにより、お気に入りがない場合はエラーではなくnullを返す*/
        $favorites = optional($this->favorites);

        return optional($this->favorites);
    }
}
