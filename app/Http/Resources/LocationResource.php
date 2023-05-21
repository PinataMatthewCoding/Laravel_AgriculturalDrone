<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'lattitude'=>$this->lattitude,
            'lngtiude'=>$this->lngtiude,
            "map_id"=>$this->map,
            "province_id"=>$this->province,

        ];
    }
}
