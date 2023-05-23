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
            "instruction"=>$this->instruction,
            "change_battery"=>$this->change_battery,
            "inspect_damage"=>$this->inspect_damage,
            "find_place"=>$this->find_place,
            "start_small"=>$this->start_small,
        ];
    }
}
