<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "pesticide_type"=>$this->pesticide_type,
            "seed_type"=>$this->seed_type,
            "weight"=>$this->weight,
            "height"=>$this->height,
            "shape"=>$this->shape,
            "start_time"=>$this->start_time,
            "end_time"=>$this->end_time,
            //===================
            "drones"=>$this->drone,
            "instruction_id"=>$this->instruction_id
        ];
    }
}
