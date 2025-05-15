<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'school' => $this->school,
            'photo' => $this->photo,
            'start' => $this->start ? substr($this->start, 0, 10) : null,
            'end' => $this->end ? substr($this->end, 0, 10) : null,
            'address' => $this->address,
            'highlights' => $this->highlights
        ];
    }
}
