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
        'created_at',
        'updated_at',
    ];



    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function getArea()
    {
        return optional($this->area)->name;
    }

    public function getGenre()
    {
        return optional($this->genre)->name;
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function getShopName()
    {
        return $this->name;
    }

}
