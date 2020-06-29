<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Booking
 *
 * @property int $id
 * @property string $from
 * @property string $to
 * @property int $bookable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereBookableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Bookable $bookable
 * @property-read \App\Review|null $review
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking betweenDates($from, $to)
 */
class Booking extends Model
{
    protected $fillable = ['from', 'to'];

    public function bookable()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function scopeBetweenDates(Builder $query, $from, $to)
    {
        return $query->where('to', '>=', $from)->where('from', '<=', $to);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
