<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificationResource extends JsonResource
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
            'photo' => $this->photo,
            'year' => $this->start ? substr($this->start, 0, 10) : null,
            'school' => $this->school,
            'highlights' => $this->highlights
        ];
    }
}
