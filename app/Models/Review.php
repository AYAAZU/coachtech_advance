<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'reservation_id',
        'stars',
        'comment',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function created_at()
    {

        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
}
