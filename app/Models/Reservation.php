<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['user_id','shop_id','number', 'start_datetime'];

    /**モデルのリレーション　不要？？     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
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

}
