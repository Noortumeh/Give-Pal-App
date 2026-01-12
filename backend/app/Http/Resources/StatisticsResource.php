<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticsResource extends JsonResource
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
            'projects_number' => $this->projects_number,
            'beneficiaries_of_cultural_program' => $this->beneficiaries_of_cultural_program,
            'beneficiaries_of_relief_program' => $this->beneficiaries_of_relief_program,
            'articles_number' => $this->articles_number,
        ];
    }
}
