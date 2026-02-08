<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentHomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'section' => $this->section,
            'type' => $this->type,

            'title' => $this->translation?->title,
            'subtitle' => $this->translation?->subtitle,
            'description' => $this->translation?->description,
            'address' => $this->translation?->address,
            'date' => $this->translation?->date,

            'file_path' => $this->file_path,
            'file_type' => $this->file_type,
            'order' => $this->order,

            'children' => ContentHomeResource::collection(
                $this->childrenRecursive()->with('translation')->take($this->items_count)->get()
            ),
        ];
    }
}
