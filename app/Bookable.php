<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Bookable
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property float $price
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bookable whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Booking[] $bookings
 * @property-read int|null $bookings_count
 */
class Bookable extends Model
{
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * @param $from
     * @param $to
     * @return bool
     */
    public function checkAvailabilityFor($from, $to) : bool
    {
        return 0 === $this->bookings()->betweenDates($from, $to)->count();
    }
}
