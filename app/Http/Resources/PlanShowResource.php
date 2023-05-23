<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'pesticide_type'=>$this->pesticide_type,
            'seed_type'=>$this->seed_type,
            'weight'=>$this->weight,
            'height'=>$this->height,
            'shape'=>$this->shape,
            'date'=>$this->date,
            "plans"=>PlanResource::collection($this->plans),
            
        ];
    }
}
