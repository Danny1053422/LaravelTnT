<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookable extends Model
{
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function availablefor($from, $to): bool
    {
        return 0 == $this->bookings()->BetweenDates($from, $to)->count();
    }
}
