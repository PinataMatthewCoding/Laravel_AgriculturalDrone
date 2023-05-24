<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "brand"=>$this->brand,
            "type"=>$this->type,
            "max_flight_time"=>$this->max_flight_time,
            "description"=>$this->description,
            "instruction"=>$this->instruction,
        ];
    }
}
