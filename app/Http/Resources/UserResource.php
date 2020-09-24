<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'email'          => $this->email,
            'address'        => $this->alamat,
            'date_of_birth'  => \Carbon\Carbon::parse($this->date_of_birth)->format('D, d M Y'),
            'joined'         => $this->created_at->diffForHumans(),
        ];
    }
}
