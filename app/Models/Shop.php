<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'kana',
        'area_id',
        'genre_id',
        'info',
        'image',
        'start_time',
        'end_time',
        'admin_user_id',
        'created_at',
        'updated_at',
    ];
    /*Areaとのリレーション*/
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
    /*Optionalヘルパ関数（中でnewしてるだけ）を使うのでnullチェック不要*/
    public function getArea()
    {
        return optional($this->area)->name;
    }

    /*Genreとのリレーション*/
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
    public function getGenre()
    {
        return optional($this->genre)->name;
    }
    public function getShopName()
    {
        return $this->name;
    }

    /*Reservationとのリレーション*/
    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }
    /*Favoriteとのリレーション*/
    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }

    /*Reviewとのリレーション*/
    public function reviews()
    {
        return $this->hasManyThrough('App\Models\Review', 'App\Models\Reservation');
    }

    public function stars()
    {
        $stars = round($this->reviews->avg('stars'),1, PHP_ROUND_HALF_UP);
        return $stars;
    }

    /*（未使用）Favoriteからuser_idを取得*/
    public function getUserIdFromFavorites()
    {
        return optional($this->favorites);
    }

}
