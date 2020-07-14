<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
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
 * @property string $review_key
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Booking whereReviewKey($value)
 */
	class Booking extends \Eloquent {}
}

namespace App{
/**
 * App\Review
 *
 * @property string $id
 * @property int $rating
 * @property string $content
 * @property int $bookable_id
 * @property int|null $booking_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Bookable $bookable
 * @property-read \App\Booking|null $booking
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereBookableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Review extends \Eloquent {}
}

namespace App{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Review[] $reviews
 * @property-read int|null $reviews_count
 */
	class Bookable extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

