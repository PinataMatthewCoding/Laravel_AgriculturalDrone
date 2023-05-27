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
            "is_action"=>$this->is_action,
            "description"=>$this->description,
            "instruction"=>$this->instruction,
            "plan_id"=>$this->plan_id,
            "drones"=>$this->drone,
        ];
    }
}
