<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'url' => $this->url,
            'name' => $this->name,
            'photo' => $this->photo,
            'start' => $this->start ? substr($this->start, 0, 10) : null,
            'end' => $this->end ? substr($this->end, 0, 10) : null,
            'highlights' => $this->highlights
        ];
    }
}
