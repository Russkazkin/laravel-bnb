<?php

namespace App\Http\Resources;

use App\Bookable;
use Illuminate\Http\Resources\Json\JsonResource;

class BookablesIndexResource extends JsonResource
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

        ];
    }
}
