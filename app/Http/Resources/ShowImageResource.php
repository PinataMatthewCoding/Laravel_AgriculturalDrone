<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowImageResource extends JsonResource
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
            "typeImage"=>$this->typeImage,
            "drone_id"=>$this->drone_id,
            "province_id"=>$this->province_id,
            "map_id"=>$this->map_id,
        ];
    }
}
