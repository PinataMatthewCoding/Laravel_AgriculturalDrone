<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowPlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name"=>$this->name,
            "pesticide_type"=>$this->pesticide_type,
            "seed_type"=>$this->seed_type,
            "width"=>$this->weight,
            "height"=>$this->height,
            "shape"=>$this->shape,
            "start_time"=>$this->start_time,
            "end_time"=>$this->end_time,
            "drones"=>$this->drone,
        ];
    }
}
