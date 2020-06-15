<?php

namespace App\Http\Resources;

use App\Bookable;
use Illuminate\Http\Resources\Json\JsonResource;

class BookablesShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /**
         * @var $this Bookable
         */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
