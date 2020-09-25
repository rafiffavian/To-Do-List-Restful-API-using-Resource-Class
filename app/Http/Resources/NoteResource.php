<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
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
            'id'            => $this->id,
            'note'          => $this->note,
            'date'          => \Carbon\Carbon::parse($this->date)->format('D, d M Y'),
            'time'          => $this->time,
            'created_at'    => $this->created_at->diffForHumans(),
            'user'          => new UserResource($this->user),
        ];
    }
}
