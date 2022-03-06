<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['user_id','shop_id','number', 'start_datetime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function review()
    {
        return $this->hasone(Review::class);
    }

    public function getDatetime()
    {
        $date = $this->start_datetime;
        return date('Y-m-d H:i', strtotime($date));
    }
    public function getDate()
    {
        $date = $this->start_datetime;
        return date('Y-m-d', strtotime($date));
    }
    public function getTime()
    {
        $date = $this->start_datetime;
        return date('H:i', strtotime($date));
    }

    public function getName()
    {
        $user_id = $this->user_id;
        $name = User::find($user_id)->name;
        return $name;
    }

}
